<?php


    class CrudLugares{

        private $conexion;

  
        public function conectar()
        {
            // Conexión a la base de datos
            $this->conexion = new mysqli("localhost", "root", "", "jesuitis");
        }

        public function nuevoLugar($ip,$lugar,$descripcion)
        {
            $this->conectar();
            
            
                $sql = "INSERT INTO lugar (ip, lugar,descripcion) VALUES ('$ip', '$lugar','$descripcion')";
    
                return $this->conexion->query($sql);
        }
            
        public function borrarLugar($ip)
        {
            $this->conectar();
            
            
            $sql = "DELETE FROM lugar WHERE ip = '$ip' ";
    
            return $this->conexion->query($sql);
        }

        public function modificarLugar($ip, $nuevoLugar,$nuevaDescripcion)
    {
        $this->conectar();
        $sql = "UPDATE lugar SET ip = '$ip' , lugar= '$nuevoLugar' , descripcion= '$nuevaDescripcion' WHERE ip = '$ip'";
        return $this->conexion->query($sql);
    }
    }


?>


