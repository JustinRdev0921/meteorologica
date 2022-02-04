<?php
    class Client
    {
        protected $Radiacion;
        protected $crud;
        protected $select;
        protected $selectPrediccion;

        public function __construct(Radiacion $Radiacion)
        {
            $this -> Radiacion = $Radiacion;

            $this -> select = new SelectCommand($this->Radiacion);
            $this -> selectPrediccion = new SelectPrediccionCommand($this->Radiacion);

            $this -> crud = new Crud( $this->select, $this -> selectPrediccion);
        }

        public function operate(string $action)
            {
                switch ($action) {
                    case 'select':
                        return $this->crud->select();
                        break;
                    case 'selectPrediccion':
                        return $this->crud->selectPrediccion();
                        break;
                    default:
                        throw new Exception("Error Processing Request", 1);
                        break;
                }
            }

        
    }
    
?>