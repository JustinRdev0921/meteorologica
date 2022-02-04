<?php
    include "autoload_class.php";
    require '../validate_session.php';

    $usuario = new Usuarios(new Conexion);
    $usuario -> setIdAdmin($_POST['id']);
    $usuario -> setNombreAdmin($_POST['nombreAdministrador']);
    $usuario->  setEmailAdmin($_POST['correoAdministrador']);
    $usuario -> setUsernameAdmin($_POST['usuarioAdministrador']);

    $cliente = new Client($usuario);
    if($cliente->operate('update')>0){
        header("location:../../dashboard/dashboardAdmins.php?message=Se actualizó correctamente el usuario&type=SuccessMessage");
        exit();
    }
    header("location:../../dashboard/dashboardAdmins.php?message=Error al actualizar el usuario&type=WarningMessage");
    exit();
?>