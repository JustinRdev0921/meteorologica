<?php
    class SelectCommand implements iCommand
    {
      protected $usuario;
    
      public function __construct(Usuario $usuario)
      {
        $this->usuario = $usuario;
      }
    
      public function exec(): mysqli_result
      {
        return $this->usuario->select();
      }
    }
    
?>