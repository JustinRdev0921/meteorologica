<?php 
    $session = new Session();
    if (! $session->validateSession('email')) {
        header('location: ../../../login.php?message=Debes iniciar sesión&type=WarningMessage');
    }
?>