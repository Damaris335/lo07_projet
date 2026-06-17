<!-- ----- début viewInsertError -->
<?php require ($root . '/app/view/fragment/fragmentBlablacarHeader.html'); ?>
<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
    include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
    ?>
    <div class="alert alert-danger">
        <h3>Solde insuffisant</h3>
        <p>Vous n'avez pas assez de fonds pour réserver ce trajet.</p>
    </div>
  </div>
  <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body>
<!-- ----- fin viewInsertError -->