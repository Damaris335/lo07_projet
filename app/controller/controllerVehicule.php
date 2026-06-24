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

    public static function vehiculeCreate($args) {
        include 'config.php';
        $conducteurs = ModelUtilisateur::getAllConducteurs();
        $vue = $root . '/app/view/vehicule/viewInsert.php';
        require($vue);
    }

    public static function vehiculeCreated($args) {
        include 'config.php';
        $id = ModelVehicule::insert(
            htmlspecialchars($_GET['marque']),
            htmlspecialchars($_GET['modele']),
            htmlspecialchars($_GET['annee']),
            htmlspecialchars($_GET['immatriculation']),
            htmlspecialchars($_GET['proprietaire_id'])
        );
        $results = ModelVehicule::getById($id);
        $vue = $root . '/app/view/vehicule/viewInserted.php';
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