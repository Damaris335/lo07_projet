<!-- ----- debut ModelVille -->
<?php
require_once 'model.php';

class ModelVille {

    private $id, $nom;

    public function __construct($id = NULL, $nom = NULL) {
        if (!is_null($id)) {
            $this->id  = $id;
            $this->nom = $nom;
        }
    }

    // --- Getters
    function getId()  { return $this->id; }
    function getNom() { return $this->nom; }

    // --- A6 : Liste de toutes les villes
    public static function getAll() {
        try {
            $database  = Model::getInstance();
            $query     = "SELECT * FROM ville ORDER BY nom";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelVille");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // --- A7 : Insertion d'une ville
    public static function insert($nom) {
        try {
            $database  = Model::getInstance();

            $query     = "SELECT MAX(id) FROM ville";
            $statement = $database->query($query);
            $tuple     = $statement->fetch();
            $id        = $tuple[0] + 1;

            $query     = "INSERT INTO ville VALUES (:id, :nom)";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id, 'nom' => $nom]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

}
?>
<!-- ----- fin ModelVille -->