<!-- ----- debut ControllerVehicule -->
<?php
require_once '../model/modelReservation.php';

class ControllerReservation {

    public static function reservationMesReservations() {
        include 'config.php';
        $passager_id = $_SESSION['login_id'];
        $results = ModelReservation::getMesReservations($passager_id);
        $vue = $root . '/app/view/reservation/viewPassagerReservations.php';
        require($vue);
    }

    public static function reservationCreate() {
        include 'config.php';
        $results = ModelReservation::getTrajetsActifs();
        $vue = $root . '/app/view/reservation/viewInsert.php';
        require($vue);
    }

    public static function reservationCreated() {
        include 'config.php';
        $trajet_id = $_GET['trajet_id'];
        $passager_id = $_SESSION['login_id'];
        $idReservation = ModelReservation::insert($trajet_id, $passager_id);
        
        $results = ModelReservation::getTrajetReserve($trajet_id);

        $vue = $root . '/app/view/reservation/viewInserted.php';
        require($vue);
    }
}
?>
<!-- ----- fin ControllerVehicule -->