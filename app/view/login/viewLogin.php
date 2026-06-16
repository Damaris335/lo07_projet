<!-- ----- début viewLogin -->
<?php require($root . '../app/view/fragment/fragmentHeader.html'); ?>

<body>
  <div class="container">
    <?php include $root . '../app/view/fragment/fragmentMenu.html'; ?>

    <div class="row justify-content-center mt-5">
      <div class="col-md-4">

        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Connexion</h4>
          </div>
          <div class="card-body">

            <?php if (isset($erreur) && $erreur): ?>
              <div class="alert alert-danger">
                <?php echo $erreur; ?>
              </div>
            <?php endif; ?>

            <form method="get" action="router2.php">
              <input type="hidden" name="action" value="authLoginPost">

              <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login"
                       placeholder="Votre login" autofocus required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Votre mot de passe" required>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Se connecter</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>

  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
<!-- ----- fin viewLogin -->