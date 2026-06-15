
<!-- ----- début fragmentBlablacarMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router2.php?action=CaveAccueil">BARBOT & VERSCHELDE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrateur</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=producteurReadAll">Liste des utilisateurs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=producteurReadId&target=producteurReadOne">Ajout d'un conducteur</a></li>
            <li><a class="dropdown-item" href="router2.php?action=producteurCreate">Ajout d'un passager</a></li> 
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=producteurReadRegion">Liste des véhicules</a></li>
            <li><a class="dropdown-item" href="router2.php?action=producteurByRegion">Ajout d'un véhicule</a></li> 
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=producteurReadId&target=producteurDeleted">Liste des villes</a></li> 
            <li><a class="dropdown-item" href="router2.php?action=producteurReadId&target=producteurDeleted">Ajout d'une ville</a></li> 
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conducteur</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=producteurReadAll">Liste de mes véhicules</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=producteurReadId&target=producteurReadOne">Liste de tous mes trajets (actifs et passifs)</a></li>
            <li><a class="dropdown-item" href="router2.php?action=producteurCreate">Ajout d'un trajet</a></li> 
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="router2.php?action=producteurReadRegion">Liste des passagers de l'un de mes trajets actifs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=producteurByRegion">Clôturer l'un de mes trajets actifs</a></li> 
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Passager</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=recolteReadAll">Liste de mes réservations</a></li>
            <li><a class="dropdown-item" href="router2.php?action=recolteCreate">Réservation d'un trajet actif</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">DOCUMENTATION</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=caveProposition1">Proposition d'amélioration 1</a></li>
            <li><a class="dropdown-item" href="router2.php?action=caveProposition2">Proposition d'amélioration 2</a></li>

          </ul>
        </li>
        
        
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentBlablacarMenu -->



