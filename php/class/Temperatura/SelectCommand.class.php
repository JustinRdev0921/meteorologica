<?php
    class SelectCommand implements iCommand
    {
      protected $temperatura;
    
      public function __construct(Temperatura $temperatura)
      {
        $this->temperatura = $temperatura;
      }
    
      public function exec(): mysqli_result
      {
        return $this->temperatura->select();
      }
    }
    
?>