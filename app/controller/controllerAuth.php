<!-- ----- debut ControllerAuth -->
<?php
require_once '../model/modelUtilisateur.php';

class ControllerAuth {
 
    // --- Page d'accueil (publique)
    public static function accueil($args = null) {
        include 'config.php';
        $vue = $root . '/app/view/viewBlablacarAccueil.php';
        if (DEBUG) echo ("ControllerAuth : accueil : vue = $vue");
        require($vue);
    }

    // --- Affiche le formulaire de connexion
    public static function authLogin($args = null) {
        include 'config.php';
        $erreur = null;
        $vue = $root . 'app/view/login/viewLogin.php';
        if (DEBUG) echo ("controllerAuth : authLogin : vue = $vue");
        require($vue);
    }

    // --- Traite le formulaire de connexion
        public static function authLoginPost($args = null) {
        include 'config.php';
 
        $login    = isset($_GET['login'])    ? htmlspecialchars(trim($_GET['login']))    : '';
        $password = isset($_GET['password']) ? htmlspecialchars(trim($_GET['password'])) : '';
 
        // Validation basique
        if (empty($login) || empty($password)) {
            $erreur = "Veuillez remplir tous les champs.";
            $vue = $root . '/app/view/login/viewLogin.php';
            require($vue);
            return;
        }
 
        // Vérification en base via ModelUtilisateur
        $utilisateur = ModelUtilisateur::getByLoginPassword($login, $password);
 
        if ($utilisateur === NULL) {
            // Mauvais identifiants → on réaffiche le formulaire avec erreur
            $erreur = "Login ou mot de passe incorrect.";
            $vue = $root . '/app/view/login/viewLogin.php';
            require($vue);
            return;
        }
 
        // Connexion réussie → on remplit la session
        $_SESSION['login_id'] = $utilisateur->getId();
        $_SESSION['nom']      = $utilisateur->getNom();
        $_SESSION['prenom']   = $utilisateur->getPrenom();
        $_SESSION['role']     = $utilisateur->getRole();
        $_SESSION['solde']    = $utilisateur->getSolde();
 
        // On redirige vers l'accueil
        // Le menu se met à jour automatiquement car il lit $_SESSION
        header('Location: router2.php?action=accueil');
        exit;
    }


    // --- Déconnexion : login_id repassé à -1 (convention du sujet)
    public static function authLogout($args = null) {
        $_SESSION['login_id'] = -1;
        session_unset();
        session_destroy();
        header('Location: router2.php?action=accueil');
        exit;
    }

}
?>
<!-- ----- fin ControllerAuth -->