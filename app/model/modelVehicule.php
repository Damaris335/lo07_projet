<!-- ----- debut ModelVehicule -->
<?php
require_once 'model.php';

class ModelVehicule {

    private $id, $marque, $modele, $annee, $immatriculation, $proprietaire_id;
    // Ces deux propriétés sont remplies uniquement par getAll() via le JOIN
    private $nom, $prenom;

    public function __construct(
        $id = NULL, $marque = NULL, $modele = NULL,
        $annee = NULL, $immatriculation = NULL, $proprietaire_id = NULL
    ) {
        if (!is_null($id)) {
            $this->id              = $id;
            $this->marque          = $marque;
            $this->modele          = $modele;
            $this->annee           = $annee;
            $this->immatriculation = $immatriculation;
            $this->proprietaire_id = $proprietaire_id;
        }
    }

    // --- Getters
    function getId()              { return $this->id; }
    function getMarque()          { return $this->marque; }
    function getModele()          { return $this->modele; }
    function getAnnee()           { return $this->annee; }
    function getImmatriculation() { return $this->immatriculation; }
    function getProprietaireId()  { return $this->proprietaire_id; }
    function getNom()             { return $this->nom; }
    function getPrenom()          { return $this->prenom; }

    // --- A4 : Tous les véhicules avec prénom+nom du propriétaire (JOIN)
    public static function getAll() {
        try {
            $database  = Model::getInstance();
            $query     = "SELECT v.id, v.marque, v.modele, v.annee, v.immatriculation,
                                 v.proprietaire_id, u.prenom, u.nom
                          FROM vehicule v
                          JOIN utilisateur u ON v.proprietaire_id = u.id
                          ORDER BY u.nom, u.prenom";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelVehicule");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // --- C1 : Véhicules d'un conducteur connecté
    public static function getMesVehicules($conducteur_id) {
        try {
            $database  = Model::getInstance();
            $query     = "SELECT * FROM vehicule WHERE proprietaire_id = :id ORDER BY marque";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $conducteur_id]);
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelVehicule");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // --- Véhicules d'un conducteur pour un select (formulaire ajout trajet)
    public static function getVehiculesConducteur($conducteur_id) {
        try {
            $database  = Model::getInstance();
            $query     = "SELECT * FROM vehicule WHERE proprietaire_id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $conducteur_id]);
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelVehicule");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($marque, $modele, $annee, $immatriculation, $proprietaire_id) {
        try {
            $database = Model::getInstance();
            $query    = "SELECT MAX(id) FROM vehicule";
            $statement = $database->query($query);
            $tuple    = $statement->fetch();
            $id       = $tuple[0] + 1;

            $query = "INSERT INTO vehicule VALUES (:id, :marque, :modele, :annee, :immatriculation, :proprietaire_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id'              => $id,
                'marque'          => $marque,
                'modele'          => $modele,
                'annee'           => $annee,
                'immatriculation' => $immatriculation,
                'proprietaire_id' => $proprietaire_id
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
            $query = "select * from vehicule where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVehicule");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    
    }

    public static function getAllConducteurs() {
        try {
            $database  = Model::getInstance();
            $query     = "SELECT * FROM utilisateur WHERE role = 'conducteur'";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
?>
<!-- ----- fin ModelVehicule -->