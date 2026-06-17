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
      <h2>Formulaire d'ajout d'une nouvelle ville</h2>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name="action" value="villeCreated">   
        <label class='w-25' for="id">Nom : </label><input type="text" name='nom' size='75'> <br/>                          <br/>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>

<!-- ----- fin viewInsert -->



