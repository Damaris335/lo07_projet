<!-- ----- debut modelFonctionnalite -->
<?php
require_once 'model.php';

class ModelFonctionnalite {
    
    // --- S'il y a égalité, c'est le plus petit id qui l'emporte - nous favorisons les plus anciens BlaBlaVoyageurs
    public static function conducteurMaxTrajets() {
        $database = Model::getInstance();

        $query = "
            SELECT u.nom, u.prenom, COUNT(*) AS nb
            FROM trajet t
            JOIN utilisateur u ON t.conducteur_id = u.id
            GROUP BY u.id
            ORDER BY nb DESC, u.id ASC
            LIMIT 3
        ";

        $statement = $database->query($query);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    // --- Passager ayant le plus de réservations
    public static function passagerMaxResa() {
        $database = Model::getInstance();

        $query = "
            SELECT u.nom, u.prenom, COUNT(*) AS nb
            FROM reservation r
            JOIN utilisateur u ON r.passager_id = u.id
            GROUP BY u.id
            ORDER BY nb DESC, u.id ASC
            LIMIT 3
        ";

        $statement = $database->query($query);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    // --- Trajet le plus utilisé
    public static function trajetPopulaire() {
        $database = Model::getInstance();

        $query = "
            SELECT
                vd.nom AS depart,
                va.nom AS arrivee,
                COUNT(*) AS nb
            FROM trajet t
            JOIN ville vd ON t.ville_depart = vd.id
            JOIN ville va ON t.ville_arrivee = va.id
            GROUP BY t.ville_depart, t.ville_arrivee
            ORDER BY nb DESC, vd.id ASC
            LIMIT 3
        ";

        $statement = $database->query($query);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    // --- Maque du plus grand nombre de voitures
    public static function marquePreferee() {
        $database = Model::getInstance();

        $query = "
            SELECT
                v.marque,
                COUNT(*) AS nb
            FROM trajet t
            JOIN vehicule v ON t.vehicule_id = v.id
            GROUP BY v.marque
            ORDER BY nb DESC, v.id ASC
            LIMIT 3
        ";

        $statement = $database->query($query);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

}
?>
<!-- ----- fin modelFonctionnalite -->