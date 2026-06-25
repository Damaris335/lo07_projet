<!-- ----- debut Router2 -->
<?php
session_start(); 
require ('../controller/controllerAuth.php');
require ('../controller/controllerVille.php');
require ('../controller/controllerTrajet.php');
require ('../controller/controllerReservation.php');
require ('../controller/controllerVehicule.php');
require ('../controller/controllerUtilisateur.php');
require ('../controller/controllerExaminateur.php');
require ('../controller/controllerFonctionnalite.php');


parse_str($_SERVER['QUERY_STRING'], $param);
$action = isset($param['action']) ? htmlspecialchars($param['action']) : 'accueil';
unset($param['action']);
$args = $param;

switch ($action) {
    
    // === AUTH ===
    case 'authLogin':
    case 'authLoginPost':
    case 'authLogout':
        ControllerAuth::$action($args);
        break;

    // === TRAJETS ===
    case 'trajetReadAll':
    case 'trajetReadOne':
    case 'trajetCreate':
    case 'trajetCreated':
    case 'trajetDelete':
    case 'trajetDeleted':
    case 'trajetMesTrajets':
    case 'trajetPassagers':
    case 'trajetPassagersActif':
    case 'trajetCloturables':
    case 'trajetCloturer':
        ControllerTrajet::$action($args);
        break;
    
    // === VÉHICULE ===
    case 'vehiculeReadAll':
    case 'vehiculeMesVehicules':
    case 'vehiculeCreate':
    case 'vehiculeCreated':
        ControllerVehicule::$action($args);
        break;
    
    // === RESERVATION ===
    case 'reservationMesReservations':
    case 'reservationCreate':
    case 'reservationCreated':
    case 'reservationDelete':
    case 'reservationDeleted':
        ControllerReservation::$action($args);
        break;
    
    // === VILLE ===
    case 'villeReadAll':
    case 'villeCreate':
    case 'villeCreated':
        ControllerVille::$action($args);
        break;


    // === UTILISATEUR ===
    case 'utilisateurProfil':
    case 'utilisateurReadAll':
    case 'utilisateurCreate':
    case 'utilisateurCreated':
        ControllerUtilisateur::$action($args);
        break;
    
    // === EXAMINATEUR ===
    case 'examinateurSuperglobales':
    case 'examinateurReservations':
        ControllerExaminateur::$action($args);
        break;
    
    // === INNOVATION : FONCTIONNALITE ===
    case 'blablaDor':
    case 'innovationMVC':
        controllerFonctionnalite::$action($args);
        break;

    // === ACCUEIL ===
    default:
        $action = 'accueil';
        ControllerAuth::$action($args);
}
?>
<!-- ----- Fin Router2 -->

