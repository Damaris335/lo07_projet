<!-- ----- debut ControllerAuth -->
<?php
require_once '../model/ModelUtilisateur.php';

class ControllerAuth {

    // --- Page d'accueil (publique)
    public static function accueil() {
        include 'config.php';
        $vue = $root . '/app/view/auth/viewAccueil.php';
        if (DEBUG) echo ("ControllerAuth : accueil : vue = $vue");
        require($vue);
    }

    // --- Affiche le formulaire de connexion
    public static function authLogin($args = null) {
        include 'config.php';
        $erreur = null;
        $vue = $root . '/app/view/login/viewLogin.php';
        if (DEBUG) echo ("ControllerAuth : authLogin : vue = $vue");
        require($vue);
    }

    // --- Traite le formulaire de connexion
    public static function authLoginPost($args = null) {
        include 'config.php';

        $login    = isset($_GET['login'])    ? htmlspecialchars(trim($_GET['login']))    : '';
        $password = isset($_GET['password']) ? htmlspecialchars(trim($_GET['password'])) : '';

        if (DEBUG) echo ("ControllerAuth : authLoginPost : login = $login</br>");

        // --- Validation basique
        if (empty($login) || empty($password)) {
            $erreur = "Veuillez remplir tous les champs.";
            $vue = $root . '/app/view/login/viewLogin.php';
            require($vue);
            return;
        }

        // --- Vérification en base
        $utilisateur = ModelUtilisateur::getByLoginPassword($login, $password);

        if ($utilisateur === NULL) {
            $erreur = "Login ou mot de passe incorrect.";
            $vue = $root . '/app/view/login/viewLogin.php';
            require($vue);
            return;
        }

        // --- Connexion réussie : stockage en session
        // login_id = -1 signifie "non connecté" (convention du sujet)
        $_SESSION['login_id'] = $utilisateur->getId();
        $_SESSION['nom']      = $utilisateur->getNom();
        $_SESSION['prenom']   = $utilisateur->getPrenom();
        $_SESSION['role']     = $utilisateur->getRole();
        $_SESSION['solde']    = $utilisateur->getSolde();

        if (DEBUG) {
            echo("ControllerAuth : authLoginPost : connexion OK, role = " . $utilisateur->getRole() . "</br>");
        }

        // --- Redirection vers la liste des trajets
        header('Location: router.php?action=trajetReadAll');
        exit;
    }

    // --- Déconnexion : login_id repassé à -1 (convention du sujet)
    public static function authLogout($args = null) {
        $_SESSION['login_id'] = -1;
        session_unset();
        session_destroy();
        header('Location: router.php?action=authLogin');
        exit;
    }

}
?>
<!-- ----- fin ControllerAuth -->