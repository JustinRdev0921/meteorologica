<?php
    spl_autoload_register(function($class) {
        include '../../class/'.$class.'/'.$class.'.class.php';
    });

    require "../../class/Conexion/Conexion.class.php";


    if(isset($_POST["email"])&&isset($_POST["password"])){
        $email = $_POST["email"];
        $pass = $_POST["password"];
        if($email==""||$pass==""){
            header('location: ../../../login.php?message=Debe introducir un id de admin y una contraseña&type=WarningMessage');
        }
    }
    

    $login = new Login(new Conexion);
    $login->setEmail($email);
    $login->setPassword($pass);
    /* echo $login->getPassword(); */
    $row = $login->signIn();
    if($row){
        $nombreCompleto = $row['nombre'] + " ";
        $nombreCompleto .= $row['apellido'];
        $session = new Session();
        $session -> addValue('email',$row['correo']);
        $session -> addValue('nombre',$nombreCompleto);
        //$session -> addValue('rol',$row['rol_admin']);
        header('location: ../../../index.php?message=Inicio de sesión exitoso&type=SuccessMessage');
    }
?>