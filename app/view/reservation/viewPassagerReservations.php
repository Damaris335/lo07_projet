
<!-- ----- début viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
        include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
        ?>
        <h2>Liste de mes réservations sur des trajets actifs</h2>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>date_depart</th>
                    <th>heure_depart</th>
                    <th>depart</th>
                    <th>destination</th>
                    <th>conducteur</th>
                    <th>vehicule</th>
                    <th>immatriculation</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($results as $element) {
                    printf(
                            "<tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
            </tr>",
                            $element->getDateDepart(),
                            $element->getHeureDepart(),
                            $element->getDepart(),
                            $element->getDestination(),
                            $element->getConducteur(),
                            $element->getVehicule(),
                            $element->getImmatriculation()
                    );
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>
<!-- ----- fin viewAll -->


