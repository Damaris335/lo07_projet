<!-- ----- debut ModelUtilisateur -->
<?php
require_once 'model.php';

class ModelUtilisateur {

    private $id, $nom, $prenom, $role, $login, $password, $solde;

    public function __construct(
            $id = NULL, $nom = NULL, $prenom = NULL,
            $role = NULL, $login = NULL, $password = NULL, $solde = NULL
    ) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->role = $role;
            $this->login = $login;
            $this->password = $password;
            $this->solde = $solde;
        }
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getRole() {
        return $this->role;
    }

    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function getSolde() {
        return $this->solde;
    }

    // --- Récupère un utilisateur par login + password
    public static function getByLoginPassword($login, $password) {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM utilisateur WHERE login = :login AND password = :password";
            $statement = $database->prepare($query);
            $statement->execute(['login' => $login, 'password' => $password]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
            if (count($results) === 1)
                return $results[0];
            return NULL;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // --- Récupère tous les utilisateurs 
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM utilisateur ORDER BY role, nom";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // --- Récupère uniquement les conducteurs
    public static function getAllConducteurs() {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM utilisateur WHERE role = 'conducteur' ORDER BY nom";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    
    
    // --- Insère un nouvel utilisateur (conducteur ou passager) 
    public static function insert($nom, $prenom, $role, $solde) {
        try {
            $database = Model::getInstance();

            $query = "SELECT MAX(id) FROM utilisateur";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple[0] + 1;

            $login = strtolower(str_replace(' ', '', $prenom . $nom));
            $password = 'secret';

            $query = "INSERT INTO utilisateur VALUES (:id, :nom, :prenom, :role, :login, :password, :solde)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'role' => $role,
                'login' => $login,
                'password' => $password,
                'solde' => $solde
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // --- Met à jour le solde d'un utilisateur
    public static function updateSolde($id, $nouveauSolde) {
        try {
            $database = Model::getInstance();
            $query = "UPDATE utilisateur SET solde = :solde WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['solde' => $nouveauSolde, 'id' => $id]);
            return true;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return false;
        }
    }

    // --- Récupère un utilisateur par son id
    public static function getById($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from utilisateur where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
}
?>
<!-- ----- fin ModelUtilisateur -->