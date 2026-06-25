<!-- ----- début viewMVC -->
<?php
require ($root . '/app/view/fragment/fragmentBlablacarHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentBlablacarMenu.php';
        include $root . '/app/view/fragment/fragmentBlablacarJumbotron.html';
        ?> 

        <h2>Amélioration du code MVC</h2>
        <p>Notre solution consiste à stocker $root en session.</p>
        <br>
        <hr>
        <br>
        <h3>Explication de l'amélioration</h3>
        <p>Avant, chaque méthode de nos contrôleurs avaient une ligne "include 'config.php'". 
            Par conséquent, config.php était rechargé beaucoup de fois (nombre de  contrôleurs * nombre de méthodes) et ce inutilement.
            Notre solution proposée consiste à stocker $root dans $_SESSION une seule fois dans le routeur. Ainsi, 
            tous les contrôleurs y accèdent ensuite directement via $_SESSION['root'] sans recharger config.php.</p>

        <br>
        <hr>
        <br>
        <h3>Avantages</h3>
        <p>Cette solution présente plusieurs avantages. Tout d'abord, config.php n'est plus rechargé inutilement. 
            Ensuite, le code est plus propre et cohérent avec l'utilisation des sessions.</p>

        <br>
        <hr> 
        <br>

        <h3>Implémentation</h3>
        <p>Il faut d'abord ajouter la ligne suivante dans le routeur : <br> $_SESSION['root'] = dirname(dirname(__DIR__)) . "/"; <br>
            Ensuite, dans chaque contrôleur, on remplace les include 'config.php' par <br> $root = $_SESSION['root']; <br> 
            Enfin, si on supprime l'include, nous n'avons plus accès à DEBUG donc il faut le redéfinir dans le routeur : <br>
            if (!defined('DEBUG')) {
            define('DEBUG', FALSE);
            }
            <br>
        </p>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentBlablacarFooter.html'; ?>
</body> 
</html>
<!-- ----- fin viewMVC -->