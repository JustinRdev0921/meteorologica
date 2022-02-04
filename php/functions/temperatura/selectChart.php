<?php
    require 'autoload_class.php';
    
    function getTemperatura()
    {
      $temperatura = new Temperatura(new Conexion);
      $num = $_POST['num'];
      $cliente = new Client($temperatura);
      
      $res = $cliente->operate('selectPrediccion');
      for($i=0;$i<$num;$i++){
        $result_array = $res->fetch_array(MYSQLI_ASSOC);
      }
      echo json_encode($result_array);
    }

    getTemperatura();
?>
