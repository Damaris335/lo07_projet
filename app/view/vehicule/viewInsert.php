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
        <h2>Formulaire de création d'un nouveau véhicule</h2>
        <?php if (isset($erreur) && $erreur): ?>
              <div class="alert alert-danger">
                <?php echo $erreur; ?>
              </div>
            <?php endif; ?>
        <form role="form" method='get' action='router2.php'>
            <div class="form-group">
                <input type="hidden" name="action" value="vehiculeCreated">   
                <label class='w-25' for="id">Marque : </label><br><input type="text" name='marque' size='75' pattern="[A-Za-zÀ-ÿ\s]+" title="lettres uniquement" required> <br><br>                      
                <label class='w-25' for="id">Modèle : </label><br><input type="text" name='modele' size='75' pattern="^[A-Za-z0-9 ]+$" title="lettres et/ou chiffres" required> <br><br> 
                <label class='w-25' for="id">Année : </label><br><input type="number" name='annee' size='75' min="0" step="1" title="un entier > 0" required><br><br>    
                <label class='w-25' for="id">Immatriculation : </label><br><input type="text" name='immatriculation' size='75' pattern="[A-Z]{2}-[0-9]{3}-[A-Z]{2}" title="AA-123-AA" required> <br><br> 
                <label class='w-25' for="id">Propriétaire : </label><br><select name="proprietaire_id" required>
                    <option value="" selected disabled>Sélectionnez un propriétaire</option>
                    <?php
                    foreach ($conducteurs as $conducteur) {
                        echo "<option value='{$conducteur->getId()}'>"
                        . $conducteur->getNom() . " "
                        . $conducteur->getPrenom() . " "
                        . "</option>";
                    }
                    ?>
                </select><br/>
                <br/>
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Ajouter</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>

    <!-- ----- fin viewInsert -->



