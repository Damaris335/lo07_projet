<!-- ----- début fragmentBlablacarMenu -->
<?php
// Récupération des infos de session
$loginId = $_SESSION['login_id'] ?? -1;
$nom     = $_SESSION['nom']      ?? '';
$prenom  = $_SESSION['prenom']   ?? '';
$solde   = $_SESSION['solde']    ?? '';
$role    = $_SESSION['role']     ?? '';
?>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">

    <!-- Marque : noms étudiants | utilisateur connecté | solde -->
    <span class="navbar-brand text-white fw-bold">
      <a class="navbar-brand text-white" href="router2.php?action=accueil">BARBOT et VERSCHELDE</a>
      <?php if ($loginId != -1): ?>
        | <?php echo htmlspecialchars($nom . ' ' . $prenom); ?>
        | <?php echo number_format($solde, 2, '.', ''); ?> €
      <?php endif; ?>
    </span>

    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarBlablacar"
            aria-controls="navbarBlablacar" aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarBlablacar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- ===== MENU ADMINISTRATEUR ===== -->
        <?php if ($role === 'administrateur'): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">Administrateur</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=utilisateurReadAll">Liste des utilisateurs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=utilisateurCreate&target=conducteur">Ajout d'un conducteur</a></li>
            <li><a class="dropdown-item" href="router2.php?action=utilisateurCreate&target=passager">Ajout d'un passager</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=vehiculeReadAll">Liste des véhicules</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vehiculeCreate">Ajout d'un véhicule</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=villeReadAll">Liste des villes</a></li>
            <li><a class="dropdown-item" href="router2.php?action=villeCreate">Ajout d'une ville</a></li>
          </ul>
        </li>

        <!-- ===== MENU CONDUCTEUR ===== -->
        <?php elseif ($role === 'conducteur'): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">Conducteur</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=vehiculeMesVehicules">Liste de mes véhicules</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=trajetMesTrajets">Liste de tous mes trajets (actifs et passifs)</a></li>
            <li><a class="dropdown-item" href="router2.php?action=trajetCreate">Ajout d'un trajet</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=trajetPassagersActif">Liste des passagers de l'un de mes trajets actifs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=trajetCloturer">Cloturer l'un de mes trajets actifs</a></li>
          </ul>
        </li>

        <!-- ===== MENU PASSAGER ===== -->
        <?php elseif ($role === 'passager'): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">Passager</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=reservationMesReservations">Liste de mes réservations</a></li>
            <li><a class="dropdown-item" href="router2.php?action=reservationCreate">Réservation d'un trajet actif</a></li>
          </ul>
        </li>
        <?php endif; ?>

        <!-- ===== MENU INNOVATIONS (toujours visible) ===== -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=innovationData">Proposez une fonctionnalité originale</a></li>
            <li><a class="dropdown-item" href="router2.php?action=innovationMVC">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>

        <!-- ===== MENU EXAMINATEUR (toujours visible) ===== -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">Examinateur</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=examinateurSuperglobales">SuperGlobales (Cookies et Session)</a></li>
            <li><a class="dropdown-item" href="router2.php?action=examinateurReservations">Ajout de 10 réservations aléatoires</a></li>
          </ul>
        </li>

        <!-- ===== MENU SE CONNECTER (toujours visible) ===== -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=authLogin">Connexion</a></li>
            <li><a class="dropdown-item" href="router2.php?action=authLogout">Déconnexion</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- ----- fin fragmentBlablacarMenu -->