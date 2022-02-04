<?php
    include "autoload_class.php";
    require '../validate_session.php';


    if($_POST['newPass'] == $_POST['confirmPass'] && !$_POST['newPass']=='' && !$_POST['confirmPass']==''){
        $pass = $_POST['confirmPass'];
    }else{
        header('Location: ../../dashboard/user.php?message=Las contraseñas no coinciden o están vacías');
    }

    $email = $session -> getValue('email');

    $login = new Login(new Conexion);

    $login -> setEmail($email);
    $login -> setPassword($_POST['oldPass']);

    $row = $login -> obtenerQueryArray();

    if($login -> verificarContrasenia($row['password_admin'])){
        $usuario = new Usuarios(new Conexion);
        $usuario -> setEmailAdmin($email);
        $usuario -> setPasswordHash($pass);
        
        $cliente = new Client($usuario);
        
        if($cliente->operate('updatePassword') > 0){
            header('location: ../../dashboard/dashboard.php?message=Contraseña actualizada con éxito&type=SuccessMessage');
        }else{
            header('location: ../../dashboard/dashboard.php?message=Error al actualizar la contraseña&type=WarningMessage');
        }
    }else{
        header('location: ../../dashboard/user.php?message=El campo de antigua contraseña es incorrecto...&type=WarningMessage');
    }
?>