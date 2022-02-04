<?php
    Class DeleteCommand implements iCommand
    {
      protected $usuario;
    
      public function __construct(Usuario $usuario)
      {
        $this->usuario = $usuario;
      }
    
      public function exec(): int
      {
        return $this->usuario->delete();
      }
    }
?>