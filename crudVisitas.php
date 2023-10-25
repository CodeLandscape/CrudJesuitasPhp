<?php

    class CrudVisitas{

        private $conexion;


        public function conectar()
        {
            // Conexión a la base de datos
            $this->conexion = new mysqli("localhost", "root", "", "jesuitis");
        }

        
    }


?>