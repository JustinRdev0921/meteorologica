<?php
    spl_autoload_register(function($class) {
        include '../../class/'.$class.'/'.$class.'.class.php';
    });

    $session = new Session();
    if(!$session->validateSession('email')){
        header('location: ../../../login.php?message=Primero debes iniciar sesión para acceder a esta página&type=WarningMessage');
        exit();
    }

    if($session->validateSession('email')){
        $session->destroySession();
        header('location: ../../../login.php');
        exit();
    }
    
?>