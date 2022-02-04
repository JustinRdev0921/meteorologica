<?php
    include "autoload_class.php";


    $usuario = new Usuario(new Conexion);
    $usuario -> setNombre($_POST['nombreUsuario']);
    $usuario -> setApellido($_POST['apellidoUsuario']);
    $usuario -> setCorreo($_POST['correoUsuario']);
    $usuario -> setPasswordHash($_POST['passwordUsuario']);
    $usuario -> setOrganizacion($_POST['organizacionUsuario']);
    $usuario -> setTelefono($_POST['telefonoUsuario']);
    $cliente = new Client($usuario);
    if($cliente->operate('insert')>0){
        header("location:../../../registrate.php?message=Cuenta creada satisfactoriamente&type=SuccessMessage");
        exit();
    }
    header("location:../../../registrate.php?message=Error al crear tu cuenta&type=WarningMessage");
    exit();
?>