<?php
    class Client
    {
        protected $usuario;
        protected $crud;
        protected $insert;
        protected $select;
        protected $update;
        protected $delete;

        public function __construct(Usuario $usuario)
        {
            $this -> usuario = $usuario;

            $this ->insert = new InsertCommand($this->usuario);
            $this ->update = new UpdateCommand($this->usuario);
            $this ->select = new SelectCommand($this->usuario);
            $this ->delete = new DeleteCommand($this->usuario);
            $this -> crud = new Crud($this->insert, $this->select, $this->update, $this->delete);
        }

        public function operate(string $action)
            {
                switch ($action) {
                case 'insert':
                    return $this->crud->insert();
                    break;
                case 'select':
                    return $this->crud->select();
                    break;
                case 'update':
                    return $this->crud->update();
                    break;
                case 'delete':
                    return $this->crud->delete();
                    break;
                default:
                    throw new Exception("Error Processing Request", 1);
                    break;
                }
            }

        
    }
    
?>