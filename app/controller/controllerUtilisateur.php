<!-- ----- debut ControllerUtilisateur -->
<?php
require_once '../model/modelUtilisateur.php';

class ControllerUtilisateur {

    // --- A1 : Liste de tous les utilisateurs (admin seulement)
    public static function utilisateurReadAll($args = null) {
        include 'config.php';
        $results = ModelUtilisateur::getAll();
        $vue = $root . '/app/view/utilisateur/viewAll.php';
        if (DEBUG) echo ("ControllerUtilisateur : utilisateurReadAll : vue = $vue");
        require($vue);
    }

    // --- A2 : Formulaire ajout conducteur
    public static function utilisateurCreateConducteur($args = null) {
        include 'config.php';
        $role = 'conducteur';
        $vue = $root . '/app/view/utilisateur/viewInsert.php';
        if (DEBUG) echo ("ControllerUtilisateur : utilisateurCreateConducteur : vue = $vue");
        require($vue);
    }

    // --- A3 : Formulaire ajout passager
    public static function utilisateurCreatePassager($args = null) {
        include 'config.php';
        $role = 'passager';
        $vue = $root . '/app/view/utilisateur/viewInsert.php';
        if (DEBUG) echo ("ControllerUtilisateur : utilisateurCreatePassager : vue = $vue");
        require($vue);
    }

    // --- Traitement du formulaire d'ajout (conducteur ou passager)
    public static function utilisateurCreated($args = null) {
        include 'config.php';

        $nom    = htmlspecialchars(trim($_GET['nom']));
        $prenom = htmlspecialchars(trim($_GET['prenom']));
        $role   = htmlspecialchars(trim($_GET['role']));  // passé en champ hidden
        $solde  = htmlspecialchars(trim($_GET['solde']));

        $results = ModelUtilisateur::insert($nom, $prenom, $role, $solde);

        $vue = $root . '/app/view/utilisateur/viewInserted.php';
        if (DEBUG) echo ("ControllerUtilisateur : utilisateurCreated : vue = $vue");
        require($vue);
    }

}
?>
<!-- ----- fin ControllerUtilisateur -->