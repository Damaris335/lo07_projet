<!-- ----- début viewMesTrajets -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
        include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
        ?>

        <h2> Liste de tous les trajets du conducteur <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?></h2>
        <table class = "table table-striped téable-bordered">
            <thead>
                <tr>

                    <th scope = "col">ville_depart</th>
                    <th scope = "col">ville_arrivee</th>
                    <th scope = "col">date_depart</th>
                    <th scope = "col">heure_depart</th>
                    <th scope = "col">statut</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des vins est dans une variable $results            
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getVilleDepart(),
                            $element->getVilleArrivee(), $element->getDateDepart(), $element->getHeureDepart(), $element->getStatut());
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>
<!-- ----- fin viewMesTrajets -->