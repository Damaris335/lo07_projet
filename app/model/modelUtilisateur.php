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
            $this->id       = $id;
            $this->nom      = $nom;
            $this->prenom   = $prenom;
            $this->role     = $role;
            $this->login    = $login;
            $this->password = $password;
            $this->solde    = $solde;
        }
    }

    // --- Getters
    function getId()       { return $this->id; }
    function getNom()      { return $this->nom; }
    function getPrenom()   { return $this->prenom; }
    function getRole()     { return $this->role; }
    function getLogin()    { return $this->login; }
    function getSolde()    { return $this->solde; }

    // --- Récupère un utilisateur par login + password
    // Retourne un objet ModelUtilisateur ou NULL si introuvable
    public static function getByLoginPassword($login, $password) {
        try {
            $database = Model::getInstance();
            $query    = "SELECT * FROM utilisateur WHERE login = :login AND password = :password";
            $statement = $database->prepare($query);
            $statement->execute([
                'login'    => $login,
                'password' => $password
            ]);
            // fetchObject instancie directement la classe
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "modelUtilisateur");

            if (count($results) === 1) {
                return $results[0];
            }
            return NULL;

        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // --- Récupère tous les utilisateurs (usage admin)
    public static function getAll() {
        try {
            $database  = Model::getInstance();
            $query     = "SELECT * FROM utilisateur ORDER BY role, nom";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS, "modelUtilisateur");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
?>
<!-- ----- fin ModelUtilisateur -->