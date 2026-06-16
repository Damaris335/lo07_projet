
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
        <h2> Liste de utilisateurs</h2>

        <table class = "table table-striped table-bordered">
            <thead>
                <tr>

                    <th scope = "col">nom</th>
                    <th scope = "col">prenom</th>
                    <th scope = "col">role</th>
                    <th scope = "col">login</th>
                    <th scope = "col">password</th>
                    <th scope = "col">solde</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des vins est dans une variable $results             
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getNom(),
                            $element->getPrenom(), $element->getRole(), $element->getLogin(), $element->getPassword(), $element->getSolde());
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>
<!-- ----- fin viewAll -->


