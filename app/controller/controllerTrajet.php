<!-- ----- debut ControllerTrajet  -->
<?php
require_once '../model/modelTrajet.php';
require_once '../model/modelVille.php';
require_once '../model/modelVehicule.php';

class ControllerTrajet {
    public static function trajetMesTrajets($args = null) {
        include 'config.php';
        $conducteur_id = $_SESSION['login_id'];
        $results = ModelTrajet::getMesTrajets($conducteur_id);
        $vue = $root . '/app/view/trajet/viewMesTrajets.php';
        if (DEBUG) echo ("ControllerTrajet : trajetMesTrajets : vue = $vue");
        require($vue);
    }
    
    public static function trajetCreate($args) {
        include 'config.php';
        $villes = ModelVille::getAll();      
        $conducteur_id = $_SESSION['login_id'];
        $vehicules = ModelVehicule::getVehiculesConducteur($conducteur_id);
        $vue = $root . '/app/view/trajet/viewInsert.php';
        if (DEBUG)
            echo ("ControllerTrajet : trajetCreate : vue = $vue");
        require($vue);
    }

    public static function trajetCreated($args) {
        include 'config.php';
        $conducteur_id = $_SESSION['login_id'];
        $id = ModelTrajet::insert(
                htmlspecialchars($_GET['ville_depart']),
                htmlspecialchars($_GET['ville_arrivee']),
                $conducteur_id,
                htmlspecialchars($_GET['vehicule_id']),
                htmlspecialchars($_GET['prix']),
                htmlspecialchars($_GET['date_depart']),
                htmlspecialchars($_GET['heure_depart'])
        );

        $results = ModelTrajet::getById($id);

        $vue = $root . '/app/view/trajet/viewInserted.php';
        require($vue);
    }
    
}
?>
<!-- ----- fin ControllerTrajet-->