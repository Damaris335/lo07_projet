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
        <label class='w-25' for="id">immatriculation : </label><input type="text" name='immatriculation' size='75'> <br/> 
        <label class='w-25' for="id">propriétaireé : </label>
        <select name="proprietaire_id">
          <?php foreach ($conducteurs as $c): ?>
            <option value="<?php echo $c->id; ?>">
              <?php echo $c->prenom . ' ' . $c->nom; ?>
            </option>
          <?php endforeach; ?>
        </select><br/>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>

<!-- ----- fin viewInsert -->



