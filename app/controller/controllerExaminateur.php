<!-- ----- debut ControllerExaminateur -->
<?php

class ControllerExam {

    public static function examinateurSuperglobales() {
        include 'config.php';
        $vue = $root . 'app/view/examinateur/viewSuperglobales.php';
        if (DEBUG) echo ("ControllerExaminateur : superglobales : vue = $vue");
        require($vue);
    }

    
    

}
?>
<!-- ----- fin ControllerExaminateur -->