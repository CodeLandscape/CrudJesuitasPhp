<?php

    require_once("configdb.php");
    class CrudLugares{

        private $conexion;

        ///definimos los valores de la conexion a bbdd mediante el constructor que coge los datos de acceso del archivo configdb.php
        public function __construct()
        {
            $this->conexion = new mysqli(BBDD, USER, PASSWORD, NOMBRE_BBDD);
        }

        //metodo que añade una nueva fila a la tabla lugar
        public function nuevoLugar($ip,$lugar,$descripcion)
        {
            $sql = "INSERT INTO lugar (ip, lugar,descripcion) VALUES ('$ip', '$lugar','$descripcion')";
    
            return $this->conexion->query($sql);
        }
        //borrado de una ip de la tabla lugar, segun la ip que introduzca el usuario en el form
        public function borrarLugar($ip)
        {
            $sql = "DELETE FROM lugar WHERE ip = '$ip' ";
    
            return $this->conexion->query($sql);
        }
        //metodo para modificar una fila de la tanla lugar con los datos qaue añada el usuario en el form 
        public function modificarLugar($ip, $nuevoLugar,$nuevaDescripcion)
        {
            $sql = "UPDATE lugar SET ip = '$ip' , lugar= '$nuevoLugar' , descripcion= '$nuevaDescripcion' WHERE ip = '$ip'";
            return $this->conexion->query($sql);
        }
        //metodo para listar todos los lugares visitados
        public function listarLugares()
        {
            $sql = "SELECT lugar FROM lugar";
            return $resultado = $this->conexion->query($sql);
        }
    }


?>


