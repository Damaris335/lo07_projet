<!-- ----- début viewInserted -->
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

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Départ</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Date</th>
                    <th scope="col">Heure</th>
                    <th scope="col">Conducteur</th>
                    <th scope="col">Véhicule</th>
                    <th scope="col">Immatriculation</th>
                    <th scope="col">Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $element = $results[0];
                printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s €</td></tr>",
                        $element->getDepart(),
                        $element->getDestination(),
                        $element->getDateDepart(),
                        $element->getHeureDepart(),
                        $element->getConducteur(),
                        $element->getVehicule(),
                        $element->getImmatriculation(),
                        $element->getPrix()
                );
                ?>
            </tbody>
        </table>

    </div>

    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>
<!-- ----- fin viewInserted -->