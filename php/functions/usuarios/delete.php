<?php
    include "autoload_class.php";

    $usuario = new Usuarios(new Conexion);
    $usuario -> setIdAdmin($_GET['id']);
    $cliente = new Client($usuario);
    if($cliente->operate('delete')>0){
        header("location:../../dashboard/dashboardAdmins.php?message=Usuario eliminado exitosamente&type=SuccessMessagea");
        exit();
    }
    header("location:../../dashboard/dashboardAdmins.php?message=Error al eliminar el usuario&type=WarningMessage");
    exit();
?>