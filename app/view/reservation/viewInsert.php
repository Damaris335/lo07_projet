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
        <h2>Sélectionnez un trajet actif :</h2>
        <form role="form" method='get' action='router2.php'>
            <div class="form-group">
                <input type="hidden" name="action" value="reservationCreated">   
                <select class="form-control" name="trajet_id" id="trajet_id">

                    <?php
                    foreach ($results as $trajet) {
                        printf(
                                "<option value='%s'> %s --> %s le %s à %s à %s €</option>",
                                $trajet->depart,
                                $trajet->destination,
                                $trajet->date_depart,
                                $trajet->heure_depart,
                                $trajet->prix
                        );
                    }
                    ?>

                </select><br/>
            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Ajouter</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>
<!-- ----- fin viewInsert -->



