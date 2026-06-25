<!-- ----- debut ControllerAuth -->
<?php
require_once '../model/modelUtilisateur.php';

class ControllerAuth {
 
    // --- Page d'accueil
    public static function accueil($args = null) {
        include 'config.php';
        $vue = $root . '/app/view/viewBlablacarAccueil.php';
        if (DEBUG) echo ("ControllerAuth : accueil : vue = $vue");
        require($vue);
    }

    // --- Afficher le formulaire de connexion
    public static function authLogin($args = null) {
        include 'config.php';
        $erreur = null;
        $vue = $root . '/app/view/login/viewLogin.php';
        if (DEBUG) echo ("controllerAuth : authLogin : vue = $vue");
        require($vue);
    }

    // --- Traiter le formulaire de connexion
        public static function authLoginPost($args = null) {
        include 'config.php';
 
        $login    = isset($_GET['login'])    ? htmlspecialchars(trim($_GET['login']))    : '';
        $password = isset($_GET['password']) ? htmlspecialchars(trim($_GET['password'])) : '';
 
        if (empty($login) || empty($password)) {
            $erreur = "Veuillez remplir tous les champs.";
            $vue = $root . '/app/view/login/viewLogin.php';
            require($vue);
            return;
        }
 
        $utilisateur = ModelUtilisateur::getByLoginPassword($login, $password);
 
        if ($utilisateur === NULL) {
            $erreur = "Login ou mot de passe incorrect.";
            $vue = $root . '/app/view/login/viewLogin.php';
            require($vue);
            return;
        }
 
        $_SESSION['login_id'] = $utilisateur->getId();
        $_SESSION['nom']      = $utilisateur->getNom();
        $_SESSION['prenom']   = $utilisateur->getPrenom();
        $_SESSION['role']     = $utilisateur->getRole();
        $_SESSION['solde']    = $utilisateur->getSolde();
 
        setcookie("remember_login", $utilisateur->getLogin(), time() + 604800); // 7 jours
        
        $vue = $root . '/app/view/viewBlablacarAccueil.php';
        if (DEBUG)
            echo ("ControllerAuth : authLogout : vue = $vue");
        require($vue);
    }


    // --- Déconnexion
    public static function authLogout($args = null) {
        include 'config.php';
        $_SESSION['login_id'] = -1;
        session_unset();
        session_destroy();
        
        $vue = $root . '/app/view/viewBlablacarAccueil.php';
        if (DEBUG)
            echo ("ControllerAuth : authLogout : vue = $vue");
        require($vue);
    }

}
?>
<!-- ----- fin ControllerAuth -->