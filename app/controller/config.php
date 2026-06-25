<!-- ----- debut config -->
<?php
// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.
if (!defined('DEBUG')) {
    define('DEBUG', FALSE);
}
// ===============
// Configuration de la base de données sur dev-isi
$dsn = 'mysql:dbname=barbotda;host=localhost;charset=utf8';
$username = 'barbotda';
$password = 'U6SngfE0';

if (!defined('LOCAL')) {
    define('LOCAL', FALSE);
}
if (LOCAL) {
    // Configuration de la base de données sur localhost
    $dsn = 'mysql:dbname=CAVE;host=localhost;charset=utf8';
    $username = 'root';
    $password = 'root';
}
?>
<!-- ----- fin config -->