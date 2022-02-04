<?php
    class SelectCommand implements iCommand
    {
      protected $presion;
    
      public function __construct(Presion $presion)
      {
        $this->presion = $presion;
      }
    
      public function exec(): mysqli_result
      {
        return $this->presion->select();
      }
    }
    
?>