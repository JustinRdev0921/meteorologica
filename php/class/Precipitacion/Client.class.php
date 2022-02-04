<?php
    class Client
    {
        protected $precipitacion;
        protected $crud;
        protected $select;
        protected $selectPrediccion;

        public function __construct(Precipitacion $precipitacion)
        {
            $this -> precipitacion = $precipitacion;
            $this ->select = new SelectCommand($this->precipitacion);
            $this->selectPrediccion = new SelectPrediccionCommand($this->precipitacion);
            $this -> crud = new Crud($this->select, $this->selectPrediccion);
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