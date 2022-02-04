<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/meteorologica/php/config/config.php';
    spl_autoload_register(function ($class) {
        if($class == 'Conexion' || $class == 'Session'){
            include '../../class/'.$class.'/'.$class.'.class.php';
        }elseif (strpos($class, 'Message') !== false) {
            require $_SERVER['DOCUMENT_ROOT'] . "/meteorologica/php/class/Message/$class.class.php";
        }else{
            include '../../class/Presion/'.$class.'.class.php';
        }
    });
?>