<?php

require_once("configdb.php");

class CrudJesuitas{

    
    private $conexion;

    
    public function __construct()
    {
        $this->conexion = new mysqli(BBDD, USER, PASSWORD, NOMBRE_BBDD);
    }
  
    public function agregarJesuita($id, $nombre, $firma)
    {
        
        try{
            $sql = "INSERT INTO jesuita (idJesuita, nombre,firma) VALUES ('$id', '$nombre','$firma')";

        }catch (mysqli_sql_exception $excp) {
            return $excp->getMessage();
    }
        return $this->conexion->query($sql);
    }

    public function borrarJesuita($id)
    {
        
        $sql = "DELETE FROM jesuita WHERE idJesuita = '$id' ";
        return $this->conexion->query($sql);
    }

    public function modificarJesuita($id, $nuevoNombre,$nuevaFirma)
    {
       
        $sql = "UPDATE jesuita SET nombre = '$nuevoNombre' , firma= '$nuevaFirma' WHERE idJesuita = '$id'";
        return $this->conexion->query($sql);
    }

    public function mostrarVisitas($id)
    {
        $sql="SELECT * FROM visita WHERE idJesuita=$id";
        return $this->conexion->query($sql);
    }

}
