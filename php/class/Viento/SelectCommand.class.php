<?php
    class SelectCommand implements iCommand
    {
      protected $viento;
    
      public function __construct(Viento $viento)
      {
        $this->viento = $viento;
      }
    
      public function exec(): mysqli_result
      {
        return $this->viento->select();
      }
    }
    
?>