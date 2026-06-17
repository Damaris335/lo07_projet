<!-- ----- debut ControllerVille -->
<?php
require_once '../model/modelVille.php';

class ControllerVille {

    // --- A6 : Liste de toutes les villes
    public static function villeReadAll($args = null) {
        include 'config.php';
        $results = ModelVille::getAll();
        $vue = $root . '/app/view/ville/viewAll.php';
        if (DEBUG) echo ("ControllerVille : villeReadAll : vue = $vue");
        require($vue);
    }

    // --- A7 : Formulaire ajout ville
    public static function villeCreate($args = null) {
        include 'config.php';
        $vue = $root . '/app/view/ville/viewInsert.php';
        if (DEBUG) echo ("ControllerVille : villeCreate : vue = $vue");
        require($vue);
    }

    // --- A7 : Traitement formulaire ajout ville
    public static function villeCreated($args = null) {
        include 'config.php';
        $nom     = htmlspecialchars(trim($_GET['nom']));
        $id = ModelVille::insert($nom);
        $results = ModelVille::getById($id); 
        $vue     = $root . '/app/view/ville/viewInserted.php';
        if (DEBUG) echo ("ControllerVille : villeCreated : vue = $vue");
        require($vue);
    }

}
?>
<!-- ----- fin ControllerVille -->