<!-- ----- debut ControllerUtilisateur -->
<?php
require_once '../model/modelUtilisateur.php';

class ControllerUtilisateur {

    // --- Liste de tous les utilisateurs
    public static function utilisateurReadAll($args = null) {
        include 'config.php';
        $results = ModelUtilisateur::getAll();
        $vue = $root . '/app/view/utilisateur/viewAll.php';
        if (DEBUG)
            echo ("ControllerUtilisateur : utilisateurReadAll : vue = $vue");
        require($vue);
    }

    // --- Appel formulaire ajout conducteur / passager
    public static function utilisateurCreate($args) {
        include 'config.php';
        $target = isset($args['target']) ? $args['target'] : 'conducteur';
        $vue = $root . '/app/view/utilisateur/viewInsert.php';
        
        if (DEBUG)
            echo ("ControllerUtilisateur : utilisateurCreate : vue = $vue");
        require($vue);
    }

    // --- Ajout conducteur / passager et appel validation
    public static function utilisateurCreated($args) {
        include 'config.php';
        
        $nom = htmlspecialchars($_GET['nom']);
        $prenom = htmlspecialchars($_GET['prenom']);
        $role = htmlspecialchars($_GET['role']);
        $solde = htmlspecialchars($_GET['solde']);
        
        // Erreur champ non rempli
        if (empty($nom) || empty($prenom) || empty($solde)) {
            $target = $role;
            $erreur = "Veuillez remplir tous les champs.";
            $vue = $root . '/app/view/utilisateur/viewInsert.php';
            require($vue);
            return;
        }

        $id = ModelUtilisateur::insert($nom, $prenom, $role, $solde);
        $results = ModelUtilisateur::getById($id);
        $vue = $root . '/app/view/utilisateur/viewInserted.php';
        
        if (DEBUG)
            echo ("ControllerUtilisateur : utilisateurCreated : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerUtilisateur -->