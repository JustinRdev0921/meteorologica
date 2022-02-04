<?php
    class SelectPrediccionCommand implements iCommand
    {
      protected $Radiacion;
    
      public function __construct(Radiacion $Radiacion)
      {
        $this->Radiacion = $Radiacion;
      }
    
      public function exec(): mysqli_result
      {
        return $this->Radiacion->selectPrediccion();
      }
    }
    
?>