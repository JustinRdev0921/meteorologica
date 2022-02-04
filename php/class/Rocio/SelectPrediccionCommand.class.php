<?php
    class SelectPrediccionCommand implements iCommand
    {
      protected $rocio;
    
      public function __construct(Rocio $rocio)
      {
        $this->rocio = $rocio;
      }
    
      public function exec(): mysqli_result
      {
        return $this->rocio->selectPrediccion();
      }
    }
    
?>