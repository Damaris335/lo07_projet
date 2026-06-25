<!-- ----- debut controllerReservation  -->
<?php
require_once '../model/modelReservation.php';

class ControllerReservation {

    // --- Afficher les reservations d´un passager
    public static function reservationMesReservations() {
        include 'config.php';
        $passager_id = $_SESSION['login_id'];
        $results = ModelReservation::getMesReservations($passager_id);
        $vue = $root . '/app/view/reservation/viewPassagerReservations.php';
        if (DEBUG)
            echo ("ControllerReservation : reservationMesReservations : vue = $vue");
        require($vue);
    }

    // --- Appel formulaire ajout reservation
    public static function reservationCreate() {
        include 'config.php';
        $results = ModelReservation::getTrajetsActifs();
        $vue = $root . '/app/view/reservation/viewInsert.php';
        if (DEBUG)
            echo ("ControllerReservation : reservationCreate : vue = $vue");
        require($vue);
    }

    // --- Ajout reservation et appel validation
    public static function reservationCreated() {
        include 'config.php';
        $trajet_id = $_GET['trajet_id'];
        $passager_id = $_SESSION['login_id'];

        $idReservation = ModelReservation::insert($trajet_id, $passager_id);

        $results = ModelReservation::getTrajetReserve($trajet_id);
        $vue = $root . '/app/view/reservation/viewInserted.php';
        if (DEBUG)
            echo ("ControllerReservation : reservationCreated : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerReservation -->