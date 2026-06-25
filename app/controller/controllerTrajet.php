<!-- ----- debut ControllerTrajet  -->
<?php
require_once '../model/modelTrajet.php';
require_once '../model/modelVille.php';
require_once '../model/modelVehicule.php';
require_once '../model/modelUtilisateur.php';

class ControllerTrajet {

    // --- Liste des trajets d´un conducteur
    public static function trajetMesTrajets($args = null) {
        include 'config.php';
        $conducteur_id = $_SESSION['login_id'];
        $results = ModelTrajet::getMesTrajets($conducteur_id);
        $vue = $root . '/app/view/trajet/viewMesTrajets.php';
        if (DEBUG)
            echo ("ControllerTrajet : trajetMesTrajets : vue = $vue");
        require($vue);
    }

    // --- Appel formulaire ajout trajet
    public static function trajetCreate($args) {
        include 'config.php';
        $villes = ModelVille::getAll();
        $conducteur_id = $_SESSION['login_id'];
        $vehicules = ModelVehicule::getMesVehicules($conducteur_id);
        $vue = $root . '/app/view/trajet/viewInsert.php';
        if (DEBUG)
            echo ("ControllerTrajet : trajetCreate : vue = $vue");
        require($vue);
    }

    // --- Ajout trajet et appel validation
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
        if (DEBUG)
            echo ("ControllerTrajet : trajetCreated : vue = $vue");
        require($vue);
    }

    // -- Affiche liste des trajets actifs du conducteur
    public static function trajetPassagersActif($args = null) {
        include 'config.php';

        $conducteur_id = $_SESSION['login_id'];

        $trajets = ModelTrajet::getTrajetsActifs($conducteur_id);

        $vue = $root . '/app/view/trajet/viewTrajetsActifs.php';
        if (DEBUG)
            echo ("ControllerTrajet : trajetPassagerActifs: vue = $vue");
        require($vue);
    }

    // --- Affiche passagers du trajet sélectionné par le conducteur 
    public static function trajetPassagers($args = null) {
        include 'config.php';

        $trajet_id = $_GET['trajet_id'];

        $results = ModelTrajet::getPassagersTrajet($trajet_id);

        $vue = $root . '/app/view/trajet/viewPassagersActifs.php';
        if (DEBUG)
            echo ("ControllerTrajet : trajetPassagers : vue = $vue");
        require($vue);
    }

    // --- Liste trajets actifs d
    public static function trajetCloturables($args = null) {
        include 'config.php';

        $conducteur_id = $_SESSION['login_id'];

        $trajets = ModelTrajet::getTrajetsActifs($conducteur_id);

        $vue = $root . '/app/view/trajet/viewCloturerTrajet.php';
        if (DEBUG)
            echo ("ControllerTrajet : trajetCloturables : vue = $vue");
        require($vue);
    }

    // --- Cloture trajet actif sélectionné
    public static function trajetCloturer($args = null) {
        include 'config.php';

        $trajet_id = $_GET['trajet_id'];

        ModelTrajet::cloturerTrajet($trajet_id);

        $utilisateur = ModelUtilisateur::getById($_SESSION['login_id'])[0];

        $_SESSION['solde'] = $utilisateur->getSolde();
        
        $results = ModelTrajet::getById($trajet_id);

        $vue = $root . '/app/view/trajet/viewTrajetCloture.php';
        if (DEBUG)
            echo ("ControllerTrajet : trajetCloturer : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerTrajet-->