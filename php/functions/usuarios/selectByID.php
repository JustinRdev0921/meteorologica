<?php
    require 'autoload_class.php';
    require '../validate_session.php';
    
    function validateId($id)
    {
      return is_numeric($id) and $id > 0;
    }
    
    function getUsuarios(int $id)
    {
      $usuarios = new Usuarios(new Conexion);
      $usuarios->setIdAdmin($id);
      $cliente = new Client($usuarios);
      $res = $cliente->operate('select');
      $result_array = $res->fetch_array(MYSQLI_ASSOC);
      return json_encode($result_array);
    }
    
    $id = $_POST['id'];
    if(!validateId($id)){
      header("location:../../dashboard/dashboard.php?message=El cambio enviado no es un ID");
      exit();
    }else{
      echo getUsuarios($id);
    }
    
    
?>
