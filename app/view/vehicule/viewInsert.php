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
                <label class='w-25' for="id">Marque : </label><input type="text" name='marque' size='75'> <br/>                          
                <label class='w-25' for="id">Modèle : </label><input type="text" name='modele' size='75'> <br/> 
                <label class='w-25' for="id">Année : </label><input type="text" name='annee' size='75'> <br/>    
                <label class='w-25' for="id">Immatriculation : </label><input type="text" name='immatriculation' size='75'> <br/> 
                <label class='w-25' for="id">Propriétaire : </label><select name="proprietaire_id" required>
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



