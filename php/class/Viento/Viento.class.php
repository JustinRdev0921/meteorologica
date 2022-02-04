<?php
    class Viento
    {
      public $con;
    
      public function __construct(Conexion $con)
      {
        $this->con = $con;
      }
  
      public function select(): mysqli_result
      {
        $query = "SELECT * FROM `viento` ORDER BY `id` DESC LIMIT 1";
        return $this->con->query($query);
      }

      public function selectPrediccion(): mysqli_result
      {
        $query = "SELECT * FROM `prediccion`";
        return $this->con->query($query);
      }

    }
?>