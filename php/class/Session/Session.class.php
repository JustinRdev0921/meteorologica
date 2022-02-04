<?php
    class Session
    {
        public function __construct()
        {
            session_start();
        }

        //Crea sesiones
        public function addValue ($key, $value){
            $_SESSION[$key] = $value;
        }
        
        //Obtiene el valor guardado por la sesión a la que se apunta
        public function getValue($key)
        {
            if($this->issetValue($key)){
                return $_SESSION[$key];
            }else{
                return false;
            }
        }

        //Elimina sesiones
        public function removeValue($key){
            if($this->issetValue($key)){
                unset($_SESSION[$key]);
            }
        }
        
        //verifica que la sesión que se apunta exista
        public function issetValue($value)
        {
            return isset($_SESSION[$value]);
        }

        //Verifica que el usuario se encuentre logeado para acceder a distintas paginas
        public function validateSession($key){
            if(!$this->issetValue($key)){
                /* $this->destroySession(); */
                return false;
            }else{
                
                return true;
            }
        }

        //mata a todas las sesiones
        public function destroySession()
        {
            session_unset(); 
            session_destroy();
        }
    }
?>