<?php
    class SelectCommand implements iCommand
    {
      protected $humedad;
    
      public function __construct(Humedad $humedad)
      {
        $this->humedad = $humedad;
      }
    
      public function exec(): mysqli_result
      {
        return $this->humedad->select();
      }
    }
    
?>