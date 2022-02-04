<?php
    class SelectPrediccionCommand implements iCommand
    {
      protected $viento;
    
      public function __construct(Viento $viento)
      {
        $this->viento = $viento;
      }
    
      public function exec(): mysqli_result
      {
        return $this->viento->selectPrediccion();
      }
    }
    
?>