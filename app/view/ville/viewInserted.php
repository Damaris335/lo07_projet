<!-- ----- début ville/viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
        include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
        ?>

        <h2>Ville ajoutée avec succès</h2>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php
                printf("<tr><td>%s</td></tr>", $results[0]->getNom());
                ?>
            </tbody>
        </table>

        <?php
        include $root . '/app/view/fragment/fragmentBlablacarFooter.html';
        ?>
    </div>
</body>
</html>

<!-- ----- fin ville/viewInserted -->   