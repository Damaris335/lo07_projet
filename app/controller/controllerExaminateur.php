<!-- ----- debut ControllerExaminateur -->
<?php

class ControllerExaminateur {

    // --- Appel la vue des Superglobales
    public static function examinateurSuperglobales() {
        $root = $_SESSION['root'];
        $debug = $_SESSION['debug'];
        $vue = $root . 'app/view/examinateur/viewSuperglobales.php';
        if ($debug)
            echo ("ControllerExaminateur : superglobales : vue = $vue");
        require($vue);
    }

    // --- 10 reservations aléatoires et résultat
    public static function examinateurReservations() {
        $root = $_SESSION['root'];
        $debug = $_SESSION['debug'];
        $nbInserted = ModelReservation::insertRandom();
        $reservations = ModelReservation::getLastTen();
        $vue = $root . 'app/view/examinateur/viewRandomReservations.php';
        if ($debug)
            echo ("ControllerExaminateur : Reservations aleatoires : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerExaminateur -->