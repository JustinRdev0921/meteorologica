<?php
    class Usuario
    {
      public $con;
      public $nombre;
      public $apellido;
      public $correo;
      public $password;
      public $organizacion;
      public $telefono;
    
      public function __construct(Conexion $con)
      {
        $this->con = $con;
      }
    
      public function setNombre(string $nombre)
      {
        $this->nombre = $this->con->real_escape_string($nombre);
      }
    
      public function setApellido(string $apellido)
      {
        $this->apellido = $this->con->real_escape_string($apellido);
      }
    
      public function setCorreo(string $correo)
      {
        $this->correo = $this->con->real_escape_string($correo);
      }

      public function setPasswordHash(string $password)
      {
        $this->password = password_hash(($password), PASSWORD_DEFAULT); //Permite hashear la consulta */
      }

      public function setOrganizacion(string $organizacion)
      {
        $this->organizacion = $this->con->real_escape_string($organizacion);
      }
    
      public function setTelefono(int $telefono)
      {
        $this->telefono = $this->con->real_escape_string($telefono);
      }
    
      public function insert(): int
      {
        $query = "INSERT INTO `usuarios`(`nombre`, `apellido`, `correo`, `password`, `organizacion`, `telefono`) VALUES ('$this->nombre', '$this->apellido', '$this->correo', '$this->password', '$this->organizacion', '$this->telefono')";
        $this->con->query($query);
        return $this->con->affected_rows;
      }

      public function select(): mysqli_result
      {
        $query = "SELECT * FROM `usuarios`";
        /* if($this->article_id){
          $query .= "WHERE `articulo_id` = $this->article_id";
        }elseif ($this->index_id) {
          $query .= "WHERE `articulo_index` = 1 OR `articulo_index`= 2 OR `articulo_index`= 3";
        } */
        return $this->con->query($query);
      } 
    
      public function update(): int
      {
        /* if ($this->img) {
          $query = "UPDATE `articulo_xpert` SET `categoria_id`= $this->category_id, `titulo`= '$this->title', `contenido`= '$this->content', `img`='$this->img', `articulo_index`= NULL WHERE `articulo_id` = $this->article_id";
          if($this->index_id){
            $query = "UPDATE `articulo_xpert` SET `categoria_id`= $this->category_id, `titulo`= '$this->title', `contenido`= '$this->content', `img`='$this->img', `articulo_index`= $this->index_id WHERE `articulo_id` = $this->article_id";
          }
        } else{
          $query = "UPDATE `articulo_xpert` SET `categoria_id`= $this->category_id, `titulo`= '$this->title', `contenido`= '$this->content', `articulo_index`= NULL WHERE `articulo_id` = $this->article_id";
          if($this->index_id){
            $query = "UPDATE `articulo_xpert` SET `categoria_id`= $this->category_id, `titulo`= '$this->title', `contenido`= '$this->content', `articulo_index`= $this->index_id WHERE `articulo_id` = $this->article_id";
          }
        }
        $this->con->query($query);
        return $this->con->query($query); */
        return -1;
      }
    
      public function delete(): int
      {
        /* $query = "DELETE FROM `articulo_xpert` WHERE `articulo_id` = $this->article_id";
        $this->con->query($query);
        return $this->con->affected_rows; */
        return -1;
      }
    }
?>