<?php
    class Client
    {
        protected $viento;
        protected $crud;
        protected $select;
        protected $selectPrediccion;

        public function __construct(Viento $viento)
        {
            $this -> viento = $viento;

            $this -> select = new SelectCommand($this->viento);
            $this -> selectPrediccion = new SelectPrediccionCommand($this->viento);

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