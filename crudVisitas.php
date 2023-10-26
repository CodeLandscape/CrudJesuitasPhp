<?php

    require_once("configdb.php");
    class CrudVisitas{

        private $conexion;


        public function conectar()
        {
            // Conexión a la base de datos
            $this->conexion = new mysqli(BBDD, USER, PASSWORD, NOMBRE_BBDD);
        }

        
    }


?>