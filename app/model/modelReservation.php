<!-- ----- debut ModelReservation -->
<?php
require_once 'model.php';

class ModelReservation {

    private $date_depart, $heure_depart, $depart, $destination, $conducteur, $vehicule, $immatriculation, $prix;

    function getDateDepart() {
        return $this->date_depart;
    }

    function getHeureDepart() {
        return $this->heure_depart;
    }

    function getDepart() {
        return $this->depart;
    }

    function getDestination() {
        return $this->destination;
    }

    function getConducteur() {
        return $this->conducteur;
    }

    function getVehicule() {
        return $this->vehicule;
    }

    function getImmatriculation() {
        return $this->immatriculation;
    }
    
    function getPrix() {
        return $this->prix;
    }

    // Récupère toutes les resrvation d´un passager
    public static function getMesReservations($passager_id) {
        try {
            $database = Model::getInstance();

            $query = "
        SELECT
            t.date_depart,
            t.heure_depart,
            vd.nom AS depart,
            va.nom AS destination,
            CONCAT(u.nom,' ',u.prenom) AS conducteur,
            CONCAT(v.marque,' ',v.modele) AS vehicule,
            v.immatriculation
        FROM reservation r
        JOIN trajet t ON r.trajet_id = t.id
        JOIN ville vd ON t.ville_depart = vd.id
        JOIN ville va ON t.ville_arrivee = va.id
        JOIN utilisateur u ON t.conducteur_id = u.id
        JOIN vehicule v ON t.vehicule_id = v.id
        WHERE r.passager_id = :id
        AND t.statut = 'actif'
        ";

            $statement = $database->prepare($query);
            $statement->execute(['id' => $passager_id]);

            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelReservation");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Recupere tout les trajet actif pour que le passager puisse sélectionner le trajet qu´il souhaite réserver
    public static function getTrajetsActifs() {
        try {
            $database = Model::getInstance();

            $query = "
                SELECT t.id,
                       vd.nom AS depart,
                       va.nom AS arrivee,
                       t.date_depart,
                       t.heure_depart,
                       t.prix
                FROM trajet t
                JOIN ville vd ON t.ville_depart = vd.id
                JOIN ville va ON t.ville_arrivee = va.id
                WHERE t.statut = 'actif'
                ORDER BY t.date_depart
            ";

            $statement = $database->query($query);

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    // permet de créer une nouvelle reservation
    public static function insert($trajet_id, $passager_id) {
        try {
            $database = Model::getInstance();

            // récupère le prix du trajet
            $query = "SELECT prix FROM trajet WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $trajet_id]);
            $trajet = $statement->fetch(PDO::FETCH_ASSOC);
            $prix = $trajet['prix'];

            // récupère le solde du passager
            $query = "SELECT solde FROM utilisateur WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $passager_id]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            $solde = $user['solde'];

            // vérifie si solde suffisant
            if ($solde < $prix) {
                return -2; // code solde insuffisant
            }

            // débite le passager
            $query = "UPDATE utilisateur SET solde = solde - :prix WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['prix' => $prix, 'id' => $passager_id]);

            // insère la réservation
            $query = "SELECT MAX(id) FROM reservation";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple[0] + 1;

            $query = "INSERT INTO reservation VALUES (:id, :trajet_id, :passager_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'trajet_id' => $trajet_id,
                'passager_id' => $passager_id
            ]);

            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    //Récupere le trajet que le passager vient de reserver
    public static function getTrajetReserve($trajet_id) {
        try {
            $database = Model::getInstance();

            $query = "
        SELECT
            t.date_depart,
            t.heure_depart,
            vd.nom AS depart,
            va.nom AS destination,
            CONCAT(u.prenom,' ',u.nom) AS conducteur,
            CONCAT(v.marque,' ',v.modele) AS vehicule,
            v.immatriculation,
            t.prix
        FROM trajet t
        JOIN ville vd ON t.ville_depart = vd.id
        JOIN ville va ON t.ville_arrivee = va.id
        JOIN utilisateur u ON t.conducteur_id = u.id
        JOIN vehicule v ON t.vehicule_id = v.id
        WHERE t.id = :id
        ";

            $statement = $database->prepare($query);
            $statement->execute(['id' => $trajet_id]);

            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelReservation");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // Récupére le solde actualsié après transaction pour mettre a jour $SESSION et donc la nav
    public static function getSolde($passager_id) {
    try {
        $database  = Model::getInstance();
        $query     = "SELECT solde FROM utilisateur WHERE id = :id";
        $statement = $database->prepare($query);
        $statement->execute(['id' => $passager_id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row['solde'];
    } catch (PDOException $e) {
        return NULL;
    }
}

}
?>
<!-- ----- fin ModelReservation -->