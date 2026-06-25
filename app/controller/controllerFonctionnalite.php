<!-- ----- debut controllerFonctionnalite -->
<?php

require_once '../model/modelFonctionnalite.php';

class ControllerFonctionnalite {
    
    public static function innovationMVC() {
        $root = $_SESSION['root'];
        $debug = $_SESSION['debug'];
        $vue = $root . '/app/view/innovations/viewMVC.php';
        if ($debug)
            echo ("ControllerFonctionnalite : innovationMVC : vue = $vue");
        require($vue);
    }

    // --- Fait le classement
    public static function blablaDor($args = null) {
        $root = $_SESSION['root'];
        $debug = $_SESSION['debug'];

        $conducteurs = ModelFonctionnalite::conducteurMaxTrajets();
        $passagers = ModelFonctionnalite::passagerMaxResa();
        $trajets = ModelFonctionnalite::trajetPopulaire();
        $marques = ModelFonctionnalite::marquePreferee();

        $vue = $root . '/app/view/innovations/viewBlaBlaDor.php';
        if ($debug)
            echo ("ControllerFonctionnalite : blablaDor : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin controllerFonctionnalite -->