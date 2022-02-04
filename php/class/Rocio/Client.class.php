<?php
    class Client
    {
        protected $rocio;
        protected $crud;
        protected $select;
        protected $selectPrediccion;

        public function __construct(Rocio $rocio)
        {
            $this -> rocio = $rocio;

            $this ->select = new SelectCommand($this->rocio);

            $this->selectPrediccion = new SelectPrediccionCommand($this->rocio);

            $this -> crud = new Crud( $this->select, $this->selectPrediccion);
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