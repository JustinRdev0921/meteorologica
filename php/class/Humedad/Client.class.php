<?php
    class Client
    {
        protected $humedad;
        protected $crud;
        protected $select;
        protected $selectPrediccion;

        public function __construct(Humedad $humedad)
        {
            $this -> humedad = $humedad;

            $this ->select = new SelectCommand($this->humedad);
            $this -> selectPrediccion = new SelectPrediccionCommand($this->humedad);

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