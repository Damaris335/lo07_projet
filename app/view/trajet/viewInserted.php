
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
    <!-- ===================================================== -->
    <h2>Trajet ajouté avec succès</h2>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>

                    <th scope = "col">ville_depart</th>
                    <th scope = "col">ville_arrivee</th>
                    <th scope = "col">vehicule</th>
                    <th scope = "col">prix</th>
                    <th scope = "col">date_depart</th>
                    <th scope = "col">heure_depart</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des vins est dans une variable $results             
                $element = $results[0];
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getVilleDepart(),
                            $element->getVilleArrivee(), $element->getVehicule(), $element->getPrix(), $element->getDateDepart(), $element->getHeureDepart());
                
                ?>
            </tbody>
        </table>
</body>
</div>
    <?php
    include $root . '/app/view/fragment/fragmentBlablacarFooter.html';
    ?>
    
    <!-- ----- fin viewInserted -->   