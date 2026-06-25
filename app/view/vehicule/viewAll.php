<!-- ----- début vehicule/viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
        include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
        ?>

        <h2> Liste de véhicules</h2>

        <table class = "table table-striped téable-bordered">

            <thead>
                <tr>
                    <th scope = "col">marque</th>
                    <th scope = "col">modele</th>
                    <th scope = "col">annee</th>
                    <th scope = "col">immatriculation</th>
                    <th scope = "col">propriétaire</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getMarque(),
                            $element->getModele(), $element->getAnnee(), $element->getImmatriculation(), $element->getPrenom() . ' ' . $element->getNom());
                }
                ?>
            </tbody>

        </table>

    </div>
    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>
</html>
<!-- ----- fin vehicule/viewAll -->