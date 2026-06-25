<!-- ----- début viewCloturerTrajet -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
        include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
        ?>

        <h2>Choisir un trajet à clôturer</h2>

        <form method="get" action="router2.php">

            <input type="hidden" name="action" value="trajetCloturer">

            <label>Trajets actifs :</label>
            <select name="trajet_id">
                <?php foreach ($trajets as $trajet): ?>
                    <option value="<?= $trajet['id'] ?>">
                        <?= $trajet['ville_depart'] ?> vers <?= $trajet['ville_arrivee'] ?>
                        le <?= $trajet['date_depart'] ?> à <?= $trajet['heure_depart'] ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <button class="btn btn-gris">Clôturer</button>

        </form>

    </div>
    <?php
    include $root . '/app/view/fragment/fragmentBlablacarFooter.html';
    ?>
</body>
</html>
<!-- ----- fin viewCloturerTrajet -->