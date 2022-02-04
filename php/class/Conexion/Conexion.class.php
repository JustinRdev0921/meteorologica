<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/meteorologica/php/config/config.php';
    class Conexion extends Mysqli
    {
        private $host;
        private $user;
        private $pass;
        private $db;

        public function __construct()
        {   
            $this -> host = conf_db_host;
            $this -> user = conf_db_user;
            $this -> pass = conf_db_pass;
            $this -> db = conf_db_database;

            parent::__construct($this->host, $this->user, $this->pass, $this->db);
        }

        public function setCharset(){
            $this -> set_charset(conf_db_charset);
        }

    }

?>