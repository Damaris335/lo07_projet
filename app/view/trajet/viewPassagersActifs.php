<!-- ----- début viewPassagersActifs -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
<div class="container">

<?php
include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
?>

<h2>Liste des passagers</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Login</th>
        </tr>
    </thead>

    <tbody>

    <?php
    foreach ($results as $passager) {
        printf(
            "<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
            $passager->nom,
            $passager->prenom,
            $passager->login
        );
    }
    ?>

    </tbody>
</table>


</div>

<?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>

<!-- ----- fin viewPassagersActifs -->
