<!-- ----- debut ControllerVille -->
<?php
require_once '../model/modelVille.php';

class ControllerVille {

    // --- Liste de toutes les villes
    public static function villeReadAll($args = null) {
        $root = $_SESSION['root'];
        $debug = $_SESSION['debug'];
        $results = ModelVille::getAll();
        $vue = $root . '/app/view/ville/viewAll.php';
        if ($debug) 
            echo ("ControllerVille : villeReadAll : vue = $vue");
        require($vue);
    }

    // --- Appel formulaire ajout ville
    public static function villeCreate($args = null) {
        $root = $_SESSION['root'];
        $debug = $_SESSION['debug'];
        $vue = $root . '/app/view/ville/viewInsert.php';
        if ($debug) 
            echo ("ControllerVille : villeCreate : vue = $vue");
        require($vue);
    }

    // --- Ajout ville et appel validation
    public static function villeCreated($args = null) {
        $root = $_SESSION['root'];
        $debug = $_SESSION['debug'];
        $nom     = htmlspecialchars(trim($_GET['nom']));
        
        if (empty($nom)) {
            $erreur = "Veuillez remplir tous les champs.";
            $vue = $root . '/app/view/ville/viewInsert.php';
            require($vue);
            return;
        }
        $id = ModelVille::insert($nom);
        $results = ModelVille::getById($id); 
        $vue     = $root . '/app/view/ville/viewInserted.php';
        if ($debug) 
            echo ("ControllerVille : villeCreated : vue = $vue");
        require($vue);
    }

}
?>
<!-- ----- fin ControllerVille -->