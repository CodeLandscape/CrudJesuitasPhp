<?php

class Crud{

    
    private $conexion;

  
    public function conectar()
    {
        // Conexión a la base de datos
        $this->conexion = new mysqli("localhost", "root", "", "jesuitis");
    }

    public function agregarJesuita($id, $nombre, $firma)
    {
        $this->conectar();
        $sql = "INSERT INTO jesuita (idJesuita, nombre,firma) VALUES ('$id', '$nombre','$firma')";
        return $this->conexion->query($sql);
    }

    public function borrarJesuita($id)
    {
        $this->conectar();
        $sql = "DELETE FROM jesuita WHERE idJesuita = '$id'";
        return $this->conexion->query($sql);
    }

    public function modificarJesuita($id, $nuevoNombre,$nuevaFirma)
    {
        $this->conectar();
        $sql = "UPDATE jesuita SET nombre = '$nuevoNombre' , firma= '$nuevaFirma' WHERE idJesuita = '$id'";
        return $this->conexion->query($sql);
    }

    public function mostarVisitas()
    {
        //////mostrar con un echo todas las visitas realizadas
    }

}
