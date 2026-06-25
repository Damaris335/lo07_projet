<!-- ----- debut ControllerExaminateur -->
<?php

class ControllerExaminateur {

    // --- Appel la vue des Superglobales
    public static function examinateurSuperglobales() {
        include 'config.php';
        $vue = $root . 'app/view/examinateur/viewSuperglobales.php';
        if (DEBUG)
            echo ("ControllerExaminateur : superglobales : vue = $vue");
        require($vue);
    }

    // --- 10 reservations aléatoires et résultat
    public static function examinateurReservations() {
        include 'config.php';
        $nbInserted = ModelReservation::insertRandom();
        $reservations = ModelReservation::getLastTen();
        $vue = $root . 'app/view/examinateur/viewRandomReservations.php';
        if (DEBUG)
            echo ("ControllerExaminateur : Reservations aleatoires : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerExaminateur -->