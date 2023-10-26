<?php

    require_once("configdb.php");
    class CrudVisitas{

        private $conexion;


        public function conectar()
        {
            // Conexión a la base de datos
            $this->conexion = new mysqli(BBDD, USER, PASSWORD, NOMBRE_BBDD);
        }
        
        //metodo para listar las visitas realizadas PENDIENTE DE IMPLEMENTAR
        public function mostrarVisitas($id)
        {
            $sql="SELECT * FROM visita WHERE idJesuita=$id";
            return $this->conexion->query($sql);
        }

        
    }


?>