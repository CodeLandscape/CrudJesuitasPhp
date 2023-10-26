<?php

    require_once("configdb.php");
    class CrudLugares{

        private $conexion;

  
        public function __construct()
        {
            $this->conexion = new mysqli(BBDD, USER, PASSWORD, NOMBRE_BBDD);
        }

        public function nuevoLugar($ip,$lugar,$descripcion)
        {
            $sql = "INSERT INTO lugar (ip, lugar,descripcion) VALUES ('$ip', '$lugar','$descripcion')";
    
            return $this->conexion->query($sql);
        }
            
        public function borrarLugar($ip)
        {
            $sql = "DELETE FROM lugar WHERE ip = '$ip' ";
    
            return $this->conexion->query($sql);
        }

        public function modificarLugar($ip, $nuevoLugar,$nuevaDescripcion)
        {
            $sql = "UPDATE lugar SET ip = '$ip' , lugar= '$nuevoLugar' , descripcion= '$nuevaDescripcion' WHERE ip = '$ip'";
            return $this->conexion->query($sql);
        }

        // public function listarLugares()
        // {
        //     $sql = "SELECT lugar FROM lugar";
        //     $result = $this->conexion->query($sql);
            
          
        //     $lugares = array();
        //     while ($row = $result->fetch_assoc()) {
        //         echo $row['lugar'] . "<br>";
        //     }
            
        //     return $lugares;
        // }

        public function listarLugares()
        {
            $sql = "SELECT lugar FROM lugar";
            $resultado = $this->conexion->query($sql);
            
            if ($resultado === false) {
                // Manejar cualquier error de consulta aquí si es necesario
                return false;
            }
            echo '<h1>Listado de lugares</h1>';
            echo '<select>';
            while ($fila = $resultado->fetch_assoc()) {
                echo '<option>' . $fila['lugar'] . '</option>';
            }
            echo '</select>';
        }
    }


?>


