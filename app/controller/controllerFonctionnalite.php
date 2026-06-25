<!-- ----- debut controllerFonctionnalite -->
<?php

require_once '../model/modelFonctionnalite.php';

class ControllerFonctionnalite {

    // --- Fait le classement
    public static function blablaDor($args = null) {

        include 'config.php';

        $conducteurs = ModelFonctionnalite::conducteurMaxTrajets();
        $passagers = ModelFonctionnalite::passagerMaxResa();
        $trajets = ModelFonctionnalite::trajetPopulaire();
        $marques = ModelFonctionnalite::marquePreferee();

        $vue = $root . '/app/view/innovations/viewBlaBlaDor.php';
        require($vue);
    }
}
?>
<!-- ----- fin controllerFonctionnalite -->