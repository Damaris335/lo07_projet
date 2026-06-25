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
        <label class='w-25' for="id">Nom : </label><br><input type="text" name='nom' size='75' pattern="[A-Za-zÀ-ÿ\s]+" title="lettres uniquement" required> <br><br>    
        <label class='w-25' for="id">Prénom : </label><br><input type="text" name='prenom' size='75' pattern="[A-Za-zÀ-ÿ\s]+" title="lettres uniquement" required> <br><br>
        <label class='w-25' for="id">Solde : </label><br><input type="text" name='solde' size='75' step="0.01"  min="0" pattern="^\d+(\.\d{1,2})?$" title="2 décimales max avec un séparées de l'entier avec un point" required> <br><br>    
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>

<!-- ----- fin viewInsert -->



