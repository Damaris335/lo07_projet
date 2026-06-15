
<!-- ----- debut Router2 -->
<?php
require ('../controller/Controller***.php');
require ('../controller/Controller***.php');
require ('../controller/Controller***.php');
require ('../controller/Controller***.php');


// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Modification du routeur pour prenre en compte l'ensemble des paramètres
unset ($param['action']);

// --- On supprime l'élément action de la structure 
$args = $param;


// --- Liste des méthodes autorisées
switch ($action) {
 case "vinReadAll" :
 case "vinReadOne" :
 case "vinReadId" :
 case "vinCreate" :
 case "vinCreated" :
 case "vinDeleted" :
  Controller***::$action($args);
  break;

 // Tache par défaut
 default:
  $action = "caveAccueil";
  Controller***::$action($args);
}
?>
<!-- ----- Fin Router2 -->

