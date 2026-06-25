<!-- ----- début viewInsert -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
        include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
        ?> 
        <h2>Création d'un nouveau trajet</h2>
        <form role="form" method='get' action='router2.php'>
            <div class="form-group">
                <input type="hidden" name="action" value="trajetCreated">   
                <label class='w-25' for="id">Ville de départ : </label> <br>
                <select name="ville_depart" required>
                    <option value="" selected disabled>Sélectionnez une ville</option>
                    <?php
                    foreach ($villes as $ville) {
                        echo "<option value='{$ville->getId()}'>{$ville->getNom()}</option>";
                    }
                    ?>
                </select> <br><br>                          
                <label class='w-25' for="id">Ville d'arrivée : </label><br> <select name="ville_arrivee" required>
                    <option value="" selected disabled>Sélectionnez une ville</option>
                    <?php
                    foreach ($villes as $ville) {
                        echo "<option value='{$ville->getId()}'>{$ville->getNom()}</option>";
                    }
                    ?>
                </select> <br><br> 
                <label class='w-25' for="id">Sélection d'un véhicule : </label><br><select name="vehicule_id" required>
                    <option value="" selected disabled>Sélectionnez un véhicule</option>
                    <?php
                    foreach ($vehicules as $vehicule) {
                        echo "<option value='{$vehicule->getId()}'>"
                        . $vehicule->getMarque() . " "
                        . $vehicule->getModele()
                        . "</option>";
                    }
                    ?>
                </select><br><br>
                <label>Prix :</label><br>
                <input type="number" name="prix" min="0" step="0.01"title="nombre à 2 décimales séparées de l'entier par un point" required>
                <br><br>
                <label>Date de départ :</label><br>
                <input type="date" name="date_depart" required>
                <br><br>
                <label>Heure de départ :</label><br>
                <input type="time" name="heure_depart"required>
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Ajouter</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>

    <!-- ----- fin viewInsert -->



