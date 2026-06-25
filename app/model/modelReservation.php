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

    // --- Récupèrer toutes les reservations d´un passager
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

    // Récuperer tous les trajets actifs pour que le passager puisse sélectionner le trajet qu´il souhaite réserver
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

    // --- Permettre de créer une nouvelle reservation
    public static function insert($trajet_id, $passager_id) {
        try {
            $database = Model::getInstance();
      
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

    // --- Récuperer le trajet que le passager vient de reserver
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


    public static function insertRandom() {
        try {
            $database = Model::getInstance();

            $trajets = $database->query("SELECT id FROM trajet")->fetchAll(PDO::FETCH_COLUMN);
            $passagers = $database->query("SELECT id FROM utilisateur WHERE role = 'passager'")->fetchAll(PDO::FETCH_COLUMN);

            $inserted = 0;
            $tentatives = 0;

            while ($inserted < 10 && $tentatives < 50) {
                $trajet_id = $trajets[array_rand($trajets)];
                $passager_id = $passagers[array_rand($passagers)];

                // Vérifie que la combinaison n'existe pas déjà
                $check = $database->prepare("SELECT COUNT(*) FROM reservation WHERE trajet_id = :t AND passager_id = :p");
                $check->execute(['t' => $trajet_id, 'p' => $passager_id]);
                if ($check->fetchColumn() > 0) {
                    $tentatives++;
                    continue;
                }

                $result = self::insert($trajet_id, $passager_id);

                
                if ($result > 0)
                    $inserted++;
                $tentatives++;
            }

            return $inserted;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function getLastTen() {
        try {
            $database = Model::getInstance();
            $query = "
            SELECT vd.nom AS ville_depart, va.nom AS ville_arrivee,
                   u.nom, u.prenom
            FROM reservation r
            JOIN trajet t ON r.trajet_id = t.id
            JOIN ville vd ON t.ville_depart = vd.id
            JOIN ville va ON t.ville_arrivee = va.id
            JOIN utilisateur u ON r.passager_id = u.id
            ORDER BY r.id DESC
            LIMIT 10
        ";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>
<!-- ----- fin ModelReservation -->