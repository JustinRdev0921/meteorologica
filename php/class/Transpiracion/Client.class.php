<?php
    class Client
    {
        protected $transpiracion;
        protected $crud;
        protected $select;
        protected $selectPrediccion;

        public function __construct(Transpiracion $transpiracion)
        {
            $this ->transpiracion = $transpiracion;

            $this ->select = new SelectCommand($this->transpiracion);
            $this ->selectPrediccion = new SelectPrediccionCommand($this->transpiracion);

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