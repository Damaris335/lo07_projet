
<!-- ----- debut Router2 -->
<?php
require ('../controller/controllerAuth.php');
//require ('../controller/controllerTrajet.php');
//require ('../controller/controllerReservation.php');
require ('../controller/controllerUtilisateur.php');


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
        ControllerUtilisateur::$action($args);
        break;

    default:
        $action = 'accueil';
        ControllerAuth::$action($args);
}
?>
<!-- ----- Fin Router2 -->

