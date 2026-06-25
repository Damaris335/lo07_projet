<!-- ----- début ville/viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
        include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
        ?>

        <h2> Liste des villes</h2>

        <table class = "table table-striped téable-bordered">

            <thead>
                <tr>
                    <th scope = "col">nom</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($results as $element) {
                    printf("<tr><td>%s</td></tr>", $element->getNom());
                }
                ?>
            </tbody>

        </table>

    </div>
    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>
</html>
<!-- ----- fin ville/viewAll -->


