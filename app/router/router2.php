<!-- ----- debut Router2 -->
<?php
session_start(); 
require ('../controller/controllerAuth.php');
require ('../controller/controllerVille.php');
//require ('../controller/controllerTrajet.php');
//require ('../controller/controllerReservation.php');
require ('../controller/controllerVehicule.php');
require ('../controller/controllerUtilisateur.php');
require ('../controller/controllerExaminateur.php');


parse_str($_SERVER['QUERY_STRING'], $param);
$action = isset($param['action']) ? htmlspecialchars($param['action']) : 'accueil';
unset($param['action']);
$args = $param;

// --- Actions publiques (pas besoin d'être connecté)
// $actionsPubliques = ['accueil', 'authLogin', 'authLoginPost', 'trajetReadAll', 'trajetReadOne'];

// --- Vérification session pour les actions protégées
//if (!in_array($action, $actionsPubliques) && !isset($_SESSION['utilisateur'])) {
//    $action = 'authLogin';
//}



// --- Liste des méthodes autorisées
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
    case 'trajetCreate':       // conducteur seulement
    case 'trajetCreated':
    case 'trajetDelete':
    case 'trajetDeleted':
        ControllerTrajet::$action($args);
        break;
    
    // === VÉHICULE ===
    case 'vehiculeReadAll':
    case 'vehiculeCreate':
    case 'vehiculeCreated':
        ControllerVehicule::$action($args);
        break;
    
    // === VILLE ===
    case 'villeReadAll':
    case 'villeCreate':
    case 'villeCreated':
        ControllerVille::$action($args);
        break;

    // === RESERVATIONS ===
    case 'reservationCreate':
    case 'reservationCreated':
    case 'reservationDelete':
    case 'reservationDeleted':
    case 'reservationMes':
        ControllerReservation::$action($args);
        break;

    // === UTILISATEUR ===
    case 'utilisateurProfil':
    case 'utilisateurReadAll':  // admin seulement
    case 'utilisateurCreate':
    case 'utilisateurCreated':
        ControllerUtilisateur::$action($args);
        break;
    
    // === EXAMINATEUR ===
    case 'examinateurSuperglobales':
        ControllerExam::$action($args);
        break;

    // === ACCUEIL ===
    default:
        $action = 'accueil';
        ControllerAuth::$action($args);
}
?>
<!-- ----- Fin Router2 -->

