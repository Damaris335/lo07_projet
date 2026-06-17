<!-- ----- debut ControllerUtilisateur -->
<?php
require_once '../model/modelUtilisateur.php';

class ControllerUtilisateur {

    // --- A1 : Liste de tous les utilisateurs (admin seulement)
    public static function utilisateurReadAll($args = null) {
        include 'config.php';
        $results = ModelUtilisateur::getAll();
        $vue = $root . '/app/view/utilisateur/viewAll.php';
        if (DEBUG)
            echo ("ControllerUtilisateur : utilisateurReadAll : vue = $vue");
        require($vue);
    }

    // --- A2 : Formulaire ajout conducteur
    public static function utilisateurCreate($args) {
        include 'config.php';
        $target = isset($args['target']) ? $args['target'] : 'conducteur';
        if (DEBUG)
            echo ("ControllerProducteur:producteurReadId : target = $target</br>");

        $vue = $root . '/app/view/utilisateur/viewInsert.php';
        if (DEBUG)
            echo ("ControllerUtilisateur : utilisateurCreateConducteur : vue = $vue");
        require($vue);
    }

    // Affiche un producteur particulier (id)
    public static function utilisateurCreated($args) {
        include 'config.php';

        $id = ModelUtilisateur::insert(
                htmlspecialchars($_GET['nom']),
                htmlspecialchars($_GET['prenom']),
                htmlspecialchars($_GET['role']),
                htmlspecialchars($_GET['solde'])
        );

        $results = ModelUtilisateur::getById($id);

        $vue = $root . '/app/view/utilisateur/viewInserted.php';
        require($vue);
    }
}
?>
<!-- ----- fin ControllerUtilisateur -->