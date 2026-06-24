<!-- ----- début viewTrajetsActifs -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
<div class="container">

<?php
include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
?>

<h2>Sélectionner l'un de mes trajets actifs :</h2>

<form method="get" action="router2.php">

    <input type="hidden" name="action" value="trajetPassagers">

    <label>Trajets actifs :</label>

    <select name="trajet_id">

        <?php
        foreach ($trajets as $trajet) {
            printf(
                "<option value='%s'>%s vers %s le %s à %s</option>",
                $trajet['id'],
                $trajet['ville_depart'],
                $trajet['ville_arrivee'],
                $trajet['date_depart'],
                $trajet['heure_depart']
            );
        }
        ?>

    </select>

    <br><br>

    <button class="btn btn-primary" type="submit">
        Afficher les passagers
    </button>

</form>

</div>

<?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>

<!-- ----- fin viewTrajetsActifs -->
