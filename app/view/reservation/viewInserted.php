<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
    <div class="container">

        <?php
        include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
        include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
        ?>

        <h2>Réservation enregistrée</h2>

        <p class="text-success">
            Votre réservation a bien été prise en compte.
        </p>

        <?php
        $trajet = $results[0];
        ?>

        <table class="table table-bordered">

            <tr>
                <th>Départ</th>
                <td><?= $trajet->getDepart() ?></td>
            </tr>

            <tr>
                <th>Destination</th>
                <td><?= $trajet->getDestination() ?></td>
            </tr>

            <tr>
                <th>Date</th>
                <td><?= $trajet->getDateDepart() ?></td>
            </tr>

            <tr>
                <th>Heure</th>
                <td><?= $trajet->getHeureDepart() ?></td>
            </tr>

            <tr>
                <th>Conducteur</th>
                <td><?= $trajet->getConducteur() ?></td>
            </tr>

            <tr>
                <th>Véhicule</th>
                <td><?= $trajet->getVehicule() ?></td>
            </tr>

            <tr>
                <th>Immatriculation</th>
                <td><?= $trajet->getImmatriculation() ?></td>
            </tr>

            <tr>
                <th>Prix</th>
                <td><?= $trajet->getPrix() ?> €</td>
            </tr>

        </table>

    </div>

    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>

</body>