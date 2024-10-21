<?php

    class Conexion {
        /*CONEXION EN AZURE
        private $host = "serverg5-db.mysql.database.azure.com";
        private $username = "dasto";
        private $password = "Chaufa123";
        private $base_datos = "proyecto_db";*/

        //CONEXION LOCAL
        private $host = "serverg5-db.mysql.database.azure.com";
        private $username = "dasto";
        private $password = "Chaufa123";
        private $base_datos = "tfinal";

        //$dsn = "mysql:host=$host;dbname=$base_datos;charset=utf8mb4";

        public function Conectar() {
            try {
                $cnx = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->base_datos, $this->username, $this->password);
                $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                echo "error en conexion " . $exception->getMessage();
            }
    
            return $cnx;
        }
    }

    //$dba = new DataBase();


?>