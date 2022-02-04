<?php
    class Client
    {
        protected $presion;
        protected $crud;
        protected $select;
        protected $selectPrediccion;

        public function __construct(Presion $presion)
        {
            $this ->presion = $presion;

            $this -> select = new SelectCommand($this->presion);
            $this -> selectPrediccion = new SelectPrediccionCommand($this->presion);

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
