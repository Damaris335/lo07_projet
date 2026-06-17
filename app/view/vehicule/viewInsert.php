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
      <h2>Formulaire de création d´un nouveau véhicule</h2>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name="action" value="vehiculeCreated">   
        <label class='w-25' for="id">marque : </label><input type="text" name='marque' size='75'> <br/>                          
        <label class='w-25' for="id">modele : </label><input type="text" name='modele' size='75'> <br/> 
        <label class='w-25' for="id">année : </label><input type="text" name='annee' size='75'> <br/>    
        <label class='w-25' for="id">annee : </label><input type="text" name='modele' size='75'> <br/> 
        
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>

<!-- ----- fin viewInsert -->



