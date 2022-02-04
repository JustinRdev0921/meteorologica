<?php

    class Login
    {
        private $con;
        public $email;
        public $password;
        public $user;

        public function __construct(Conexion $con)
        {
            $this->con = $con;
        }

        public function setEmail(string $email)
        {
            //con->real_escape_string($parametro)  => evita que la validacion pueda ser burlada del lado del cliente
            $this->email = $this->con->real_escape_string($email);
        }

        public function setPassword(string $password)
        {
            /* $this->password = password_hash(($password), PASSWORD_DEFAULT); //Permite hashear la consulta */
            $this->password = $password;
        }

        //Permite obtener la contrasenia hasheada
        /* public function getPassword(){
            return $this->password;
        } */
        public function obtenerQueryArray()
        {
            $query = "SELECT * FROM `usuarios` WHERE `correo`='$this->email'";
            //Realizar la consulta y guardarla en una variable...
            $result = ($this->con->query($query)); 

            //echo $query;

            //devuelve la query en forma de array 
            return $result->fetch_array(MYSQLI_ASSOC);
        }

        public function existeLaColumna():bool
        {
            return ($this->con->affected_rows == 1);
        }

        public function verificarContrasenia($password):bool
        {
            return password_verify($this->password, $password);
        }

        public function signIn(){
            $row = $this->obtenerQueryArray();
            if($this->existeLaColumna()){
                //echo password_hash($this->password, PASSWORD_DEFAULT); //esto es para ver la contrasenia hasheada, debería eliminarse esta linea cuando se suba la pag
                if($this->verificarContrasenia($row['password'])){
                    return $row;
                }else{
                    header('location: ../../../login.php?message=Usuario o contraseña incorrectos&type=LoginMessage');
                }
            }else{ 
                header('location: ../../../login.php?message=Usuario o contraseña incorrectos&type=LoginMessage');
            }
            
        }

    }
    
?>