<?php
    class SelectCommand implements iCommand
    {
      protected $transpiracion;
    
      public function __construct(Transpiracion $transpiracion)
      {
        $this->transpiracion = $transpiracion;
      }
    
      public function exec(): mysqli_result
      {
        return $this->transpiracion->select();
      }
    }
    
?>