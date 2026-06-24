<!-- ----- début viewBlaBlaDor -->
    <?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>

<div class="container">

<?php
include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
?>

<div class="text-center d-flex justify-content-center align-items-center gap-3">

    <img src="../../public/image/VoitureG.png" width="120">

    <h1 class="m-0">
        Bienvenue à la remise des BlaBla d'Or !
    </h1>

    <img src="../../public/image/VoitureD.png" width="120">

</div>

<!-- S'il y a égalité, c'est le plus petit id qui l'emporte - nous favorisons les plus anciens BlaBlaVoyageurs --> 


<hr>

<h3>BlaBlaTeur : Conducteur de l'année</h3>
<p  style="color: #B8860B;">
    <img src="../../public/image/ConducteurOr.png" width="100">
    <?php echo $conducteurs[0]->prenom . " " . $conducteurs[0]->nom; ?>
    (<?php echo $conducteurs[0]->nb; ?> trajets)
</p>

<p style="color: #555555">
    <img src="../../public/image/ConducteurArgent.png" width="100">
    <?php echo $conducteurs[1]->prenom . " " . $conducteurs[1]->nom; ?>
    (<?php echo $conducteurs[1]->nb; ?> trajets)
</p>

<p style="color: #cd7f32">
    <img src="../../public/image/ConducteurBronze.png" width="100">
    <?php echo $conducteurs[2]->prenom . " " . $conducteurs[2]->nom; ?>
    (<?php echo $conducteurs[2]->nb; ?> trajets)
</p>

<hr>

<h3>BlaBlaGer : Passager de l'année</h3>
<p  style="color: #B8860B;">
    <img src="../../public/image/PassagerOr.png" width="100">
    <?php echo $passagers[0]->prenom . " " . $passagers[0]->nom; ?>
    (<?php echo $passagers[0]->nb; ?> réservations)
</p>

<p style="color: #555555">
    <img src="../../public/image/PassagerArgent.png" width="100">
    <?php echo $passagers[1]->prenom . " " . $passagers[1]->nom; ?>
    (<?php echo $passagers[1]->nb; ?> réservations)
</p>

<p style="color: #cd7f32">
    <img src="../../public/image/PassagerBronze.png" width="100">
    <?php echo $passagers[2]->prenom . " " . $passagers[2]->nom; ?>
    (<?php echo $passagers[2]->nb; ?> réservations)
</p>

<hr>

<h3>BlaBlaTra : Trajet le plus populaire</h3>
<p  style="color: #B8860B;">
    <img src="../../public/image/TrajetOr.png" width="100">
    <?php echo $trajets[0]->depart . " " . $trajets[0]->arrivee; ?>
    (<?php echo $trajets[0]->nb; ?> trajets)
</p>

<p style="color: #555555">
    <img src="../../public/image/TrajetArgent.png" width="100">
    <?php echo $trajets[1]->depart . " " . $trajets[1]->arrivee; ?>
    (<?php echo $trajets[1]->nb; ?> trajets)
</p>

<p style="color: #cd7f32">
    <img src="../../public/image/TrajetBronze.png" width="100">
    <?php echo $trajets[2]->depart . " " . $trajets[2]->arrivee; ?>
    (<?php echo $trajets[2]->nb; ?> trajets)
</p>

<hr>

<h3>BlaBlaRque : Marque de voiture préférée des BlaBlaVoyageurs</h3>
<p  style="color: #B8860B;">
    <img src="../../public/image/VoitureOr.png" width="100">
    <?php echo $marques[0]->marque; ?>
    (<?php echo $marques[0]->nb; ?> utilisations)
</p>

<p style="color: #555555">
    <img src="../../public/image/VoitureArgent.png" width="100">
     <?php echo $marques[1]->marque; ?>
    (<?php echo $marques[1]->nb; ?> utilisations)
</p>

<p style="color: #cd7f32">
    <img src="../../public/image/VoitureBronze.png" width="100">
     <?php echo $marques[2]->marque; ?>
    (<?php echo $marques[2]->nb; ?> utilisations)
</p>


</div>

<?php
include $root . '/app/view/fragment/fragmentBlablacarFooter.html';
?>

</body>
<!-- ----- fin viewBlaBlaDor -->