<!-- ----- debut ModelTrajet -->
<?php
require_once 'model.php';

class ModelTrajet {

    private $id, $ville_depart, $ville_arrivee, $conducteur_id, $vehicule, $prix, $date_depart, $heure_depart, $statut;

    public function __construct(
            $id = NULL,
            $ville_depart = NULL,
            $ville_arrivee = NULL,
            $conducteur_id = NULL,
            $vehicule_id = NULL,
            $prix = NULL,
            $date_depart = NULL,
            $heure_depart = NULL,
            $statut = NULL
    ) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->ville_depart = $ville_depart;
            $this->ville_arrivee = $ville_arrivee;
            $this->conducteur_id = $conducteur_id;
            $this->vehicule_id = $vehicule_id;
            $this->prix = $prix;
            $this->date_depart = $date_depart;
            $this->heure_depart = $heure_depart;
            $this->statut = $statut;
        }
    }

    function getId() {
        return $this->id;
    }

    function getVilleDepart() {
        return $this->ville_depart;
    }

    function getVilleArrivee() {
        return $this->ville_arrivee;
    }

    function getConducteurId() {
        return $this->conducteur_id;
    }

    function getPrix() {
        return $this->prix;
    }

    function getDateDepart() {
        return $this->date_depart;
    }

    function getHeureDepart() {
        return $this->heure_depart;
    }

    function getStatut() {
        return $this->statut;
    }

    function getVehicule() {
        return $this->vehicule;
    }

    public static function getMesTrajets($conducteur_id) {
        try {
            $database = Model::getInstance();

            $query = "
            SELECT
                vd.nom AS ville_depart,
                va.nom AS ville_arrivee,
                t.date_depart,
                t.heure_depart,
                t.statut
            FROM trajet t
            JOIN ville vd ON t.ville_depart = vd.id
            JOIN ville va ON t.ville_arrivee = va.id
            WHERE t.conducteur_id = :id
            ORDER BY t.date_depart, t.heure_depart
        ";

            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $conducteur_id
            ]);

            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelTrajet");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($ville_depart, $ville_arrivee, $conducteur_id, $vehicule_id, $prix, $date_depart, $heure_depart) {
        try {
            $database = Model::getInstance();

            $query = "SELECT MAX(id) FROM trajet";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple[0] + 1;

            $query = "
            INSERT INTO trajet
            VALUES (
                :id,
                :ville_depart,
                :ville_arrivee,
                :conducteur_id,
                :vehicule_id,
                :prix,
                :date_depart,
                :heure_depart,
                'actif'
            )
        ";

            $statement = $database->prepare($query);

            $statement->execute([
                'id' => $id,
                'ville_depart' => $ville_depart,
                'ville_arrivee' => $ville_arrivee,
                'conducteur_id' => $conducteur_id,
                'vehicule_id' => $vehicule_id,
                'prix' => $prix,
                'date_depart' => $date_depart,
                'heure_depart' => $heure_depart
            ]);

            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function getById($id) {
        try {
            $database = Model::getInstance();
            $query = "
                SELECT
                    t.id,
                    vd.nom AS ville_depart,
                    va.nom AS ville_arrivee,
                    CONCAT(v.marque,' ',v.modele) AS vehicule,
                    t.prix,
                    t.date_depart,
                    t.heure_depart,
                    t.statut
                FROM trajet t
                JOIN ville vd ON t.ville_depart = vd.id
                JOIN ville va ON t.ville_arrivee = va.id
                JOIN vehicule v ON t.vehicule_id = v.id
                WHERE t.id = :id
                ";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelTrajet");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getTrajetsActifs($conducteur_id) {
    try {
        $database = Model::getInstance();

        $query = "
            SELECT t.id,
                   vd.nom AS ville_depart,
                   va.nom AS ville_arrivee,
                   t.date_depart,
                   t.heure_depart
            FROM trajet t
            JOIN ville vd ON t.ville_depart = vd.id
            JOIN ville va ON t.ville_arrivee = va.id
            WHERE t.conducteur_id = :id
            AND t.statut = 'actif'
            ORDER BY t.date_depart
        ";

        $statement = $database->prepare($query);
        $statement->execute(['id' => $conducteur_id]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        return NULL;
    }
    }
    
    public static function getPassagersTrajet($trajet_id) {
        try {
            $database = Model::getInstance();

            $query = "
                SELECT u.nom,
                       u.prenom,
                       u.login
                FROM reservation r
                JOIN utilisateur u ON r.passager_id = u.id
                WHERE r.trajet_id = :id
                ORDER BY u.nom, u.prenom
            ";

            $statement = $database->prepare($query);
            $statement->execute(['id' => $trajet_id]);

            return $statement->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            return NULL;
        }
    }
    
    public static function cloturerTrajet($trajet_id) {
        try {
            $database = Model::getInstance();

            $query = "
                UPDATE trajet
                SET statut = 'passif'
                WHERE id = :id
            ";

            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $trajet_id
            ]);

            return true;

        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return false;
        }
    }

}
?>
<!-- ----- fin ModelTrajet -->