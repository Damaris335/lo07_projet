<!-- ----- début viewInsert -->
<?php 
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
      include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
    ?> 
      <h2>Formulaire de création d'un nouveau <?php echo $target ;?></h2>
      <?php if (isset($erreur) && $erreur): ?>
              <div class="alert alert-danger">
                <?php echo $erreur; ?>
              </div>
            <?php endif; ?>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name="action" value="utilisateurCreated">
        
        <input type="hidden" name="role"   value="<?php echo $target; ?>">     
        <label class='w-25' for="id">Nom : </label><input type="text" name='nom' size='75'> <br/>                          
        <label class='w-25' for="id">Prénom : </label><input type="text" name='prenom' size='75'> <br/> 
        <label class='w-25' for="id">Solde : </label><input type="text" name='solde' size='75'> <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>

<!-- ----- fin viewInsert -->



