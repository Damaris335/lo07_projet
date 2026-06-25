<!-- ----- debut ControllerVehicule -->
<?php
require_once '../model/modelVehicule.php';
require_once '../model/modelUtilisateur.php';

class ControllerVehicule {

    // --- Liste de tous les véhicules
    public static function vehiculeReadAll($args = null) {
        include 'config.php';
        $results = ModelVehicule::getAll();
        $vue = $root . '/app/view/vehicule/viewAll.php';
        if (DEBUG)
            echo ("ControllerVehicule : vehiculeReadAll : vue = $vue");
        require($vue);
    }

    // --- Appel formulaire ajout vehicule
    public static function vehiculeCreate($args) {
        include 'config.php';
        $conducteurs = ModelUtilisateur::getAllConducteurs();
        $vue = $root . '/app/view/vehicule/viewInsert.php';
        if (DEBUG)
            echo ("ControllerVehicule : vehiculeCreate : vue = $vue");
        require($vue);
    }

    // --- Ajout vehicule et appel validation
    public static function vehiculeCreated($args) {
        include 'config.php';

        $marque = htmlspecialchars($_GET['marque']);
        $modele = htmlspecialchars($_GET['modele']);
        $annee = htmlspecialchars($_GET['annee']);
        $immatriculation = htmlspecialchars($_GET['immatriculation']);
        $proprietaire_id = htmlspecialchars($_GET['proprietaire_id']);

        // Erreur champ non rempli
        if (empty($marque) || empty($modele) || empty($annee) || empty($immatriculation) || empty($proprietaire_id)) {
            $erreur = "Veuillez remplir tous les champs.";
            $conducteurs = ModelUtilisateur::getAllConducteurs();
            $vue = $root . '/app/view/vehicule/viewInsert.php';
            require($vue);
            return;
        }

        $id = ModelVehicule::insert($marque, $modele, $annee, $immatriculation, $proprietaire_id);
        $results = ModelVehicule::getById($id);
        $vue = $root . '/app/view/vehicule/viewInserted.php';
        if (DEBUG)
            echo ("ControllerVehicule : vehiculeCreated : vue = $vue");
        require($vue);
    }

    // --- Liste des véhicules du conducteur connecté
    public static function vehiculeMesVehicules($args = null) {
        include 'config.php';
        $conducteur_id = $_SESSION['login_id'];
        $results = ModelVehicule::getMesVehicules($conducteur_id);
        $vue = $root . '/app/view/vehicule/viewMesVehicules.php';
        if (DEBUG)
            echo ("ControllerVehicule : vehiculeMesVehicules : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerVehicule -->