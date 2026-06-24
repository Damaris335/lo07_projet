<!-- ----- debut ControllerExaminateur -->
<?php

class ControllerExaminateur {

    public static function examinateurSuperglobales() {
        include 'config.php';
        $vue = $root . 'app/view/examinateur/viewSuperglobales.php';
        if (DEBUG)
            echo ("ControllerExaminateur : superglobales : vue = $vue");
        require($vue);
    }

    public static function examinateurReservations() {
        include 'config.php';
        $nbInserted = ModelReservation::insertRandom();
        $reservations = ModelReservation::getLastTen(); // corrigé
        $vue = $root . 'app/view/examinateur/viewRandomReservations.php';
        if (DEBUG)
            echo ("ControllerExaminateur : Reservations aleatoires : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerExaminateur -->