
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
    <h2>Vehicule ajouté avec succès</h2>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>

                    <th scope = "col">marque</th>
                    <th scope = "col">modele</th>
                    <th scope = "col">année</th>
                    <th scope = "col">immatriculation</th>
                    <th scope = "col">propriétaire</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des vins est dans une variable $results             
                $element = $results[0];
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getMarque(),
                            $element->getModele(), $element->getAnnee(), $element->getImmatriculation(), $element->getPrenom() . " " . $element->getNom());
                
                ?>
            </tbody>
        </table>
  </div>
</body>
    <?php
    include $root . '/app/view/fragment/fragmentBlablacarFooter.html';
    ?>
    
    <!-- ----- fin viewInserted -->   