<!-- ----- début viewTrajetCloture -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
        include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
        ?>
        <h2>Trajet clôturé avec succès</h2>

        <p>
            Le trajet suivant a été clôturé :

        </p>
 <?php
        $element = $results[0];

        printf(
        "<p>%s vers %s le %s à %s</p>",
        $element->getVilleDepart(),
        $element->getVilleArrivee(),
        $element->getDateDepart(),
        $element->getHeureDepart()
        );

?>
    </div>

    <?php
    include $root . '/app/view/fragment/fragmentBlablacarFooter.html';
    ?>

    <!-- ----- fin viewTrajetCloture -->