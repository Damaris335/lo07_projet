<!-- ----- début viewRandomReservations -->
<?php require($root . 'app/view/fragment/fragmentBlablacarHeader.html'); ?>

<body>
    <div class="container">
        <?php
        include $root . 'app/view/fragment/fragmentBlablacarMenu.php';
        include $root . 'app/view/fragment/fragmentBlablacarJumbotron.html';
        ?>

        <h2 style="color: red;">10 nouvelles réservations aléatoires</h2>

        <ol>
            <?php foreach ($reservations as $r): ?>
                <li>
                    Nouvelle réservation sur le trajet 
                    <strong><?= $r['ville_depart'] ?></strong> --> 
                    <strong><?= $r['ville_arrivee'] ?></strong> par 
                    <?= $r['prenom'] ?> <?= strtoupper($r['nom']) ?>
                </li>
            <?php endforeach; ?>
        </ol>

    </div>
    <?php include $root . 'app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>
</html>
<!-- ----- fin viewRandomReservations -->