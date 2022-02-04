<?php
    class SelectPrediccionCommand implements iCommand
    {
      protected $precipitacion;
    
      public function __construct(Precipitacion $precipitacion)
      {
        $this->precipitacion = $precipitacion;
      }

      public function exec(): mysqli_result
      {
        return $this->precipitacion->selectPrediccion();
      }
    }
    
?>