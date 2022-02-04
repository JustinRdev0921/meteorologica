<?php
    class Client
    {
        protected $temperatura;
        protected $crud;
        protected $select;
        protected $selectPrediccion;

        public function __construct(Temperatura $temperatura)
        {
            $this -> temperatura = $temperatura;

            $this -> select = new SelectCommand($this->temperatura);
            $this -> selectPrediccion = new SelectPrediccionCommand($this->temperatura);

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