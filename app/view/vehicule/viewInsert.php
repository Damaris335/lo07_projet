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
        <form role="form" method='get' action='router2.php'>
            <div class="form-group">
                <input type="hidden" name="action" value="vehiculeCreated">   
                <label class='w-25' for="id">Marque : </label><input type="text" name='marque' size='75'> <br/>                          
                <label class='w-25' for="id">Modèle : </label><input type="text" name='modele' size='75'> <br/> 
                <label class='w-25' for="id">Année : </label><input type="text" name='annee' size='75'> <br/>    
                <label class='w-25' for="id">Immatriculation : </label><input type="text" name='immatriculation' size='75'> <br/> 
                <label class='w-25' for="id">Propriétaire : </label>
                <select class="form-control" name="trajet_id">

                    <?php
                    foreach ($results as $trajet) {
                        printf(
                                "<option value='%s'>%s --> %s le %s à %s (%s €)</option>",
                                $trajet['id'],
                                $trajet['depart'],
                                $trajet['arrivee'],
                                $trajet['date_depart'],
                                $trajet['heure_depart'],
                                $trajet['prix']
                        );
                    }
                    ?>

                </select>

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



