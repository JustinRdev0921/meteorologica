<?php

    class CRUD
    {
        protected $select;
        protected $selectPrediccion;

        public function __construct(SelectCommand $selectC, SelectPrediccionCommand $selectPrediccionC)
        {
            $this->select = $selectC;
            $this->selectPrediccion = $selectPrediccionC;
        }

        public function select(): mysqli_result
        {
            return $this->select->exec();
        }

        public function selectPrediccion(): mysqli_result
        {
            return $this->selectPrediccion->exec();
        }
    }
    
?>