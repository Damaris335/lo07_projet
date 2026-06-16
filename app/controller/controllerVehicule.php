<!-- ----- debut ControllerVehicule -->
<?php
require_once '../model/modelVehicule.php';
require_once '../model/modelUtilisateur.php';

class ControllerVehicule {

    // --- A4 : Liste de tous les véhicules (admin)
    public static function vehiculeReadAll($args = null) {
        include 'config.php';
        $results = ModelVehicule::getAll();
        $vue = $root . '/app/view/vehicule/viewAll.php';
        if (DEBUG) echo ("ControllerVehicule : vehiculeReadAll : vue = $vue");
        require($vue);
    }

    // --- A5 : Formulaire ajout véhicule (admin)
    public static function vehiculeCreate($args = null) {
        include 'config.php';
        // On récupère les conducteurs pour le select du propriétaire
        $conducteurs = ModelUtilisateur::getAllConducteurs();
        $vue = $root . '/app/view/vehicule/viewInsert.php';
        if (DEBUG) echo ("ControllerVehicule : vehiculeCreate : vue = $vue");
        require($vue);
    }

    // --- A5 : Traitement formulaire ajout véhicule
    public static function vehiculeCreated($args = null) {
        include 'config.php';
        $marque          = htmlspecialchars(trim($_GET['marque']));
        $modele          = htmlspecialchars(trim($_GET['modele']));
        $annee           = htmlspecialchars(trim($_GET['annee']));
        $immatriculation = htmlspecialchars(trim($_GET['immatriculation']));
        $proprietaire_id = htmlspecialchars(trim($_GET['proprietaire_id']));

        $results = ModelVehicule::insert($marque, $modele, $annee, $immatriculation, $proprietaire_id);
        $vue = $root . '/app/view/vehicule/viewInserted.php';
        if (DEBUG) echo ("ControllerVehicule : vehiculeCreated : vue = $vue");
        require($vue);
    }

    // --- C1 : Liste des véhicules du conducteur connecté
    public static function vehiculeMesVehicules($args = null) {
        include 'config.php';
        $conducteur_id = $_SESSION['login_id'];
        $results = ModelVehicule::getMesVehicules($conducteur_id);
        $vue = $root . '/app/view/vehicule/viewMesVehicules.php';
        if (DEBUG) echo ("ControllerVehicule : vehiculeMesVehicules : vue = $vue");
        require($vue);
    }

}
?>
<!-- ----- fin ControllerVehicule -->