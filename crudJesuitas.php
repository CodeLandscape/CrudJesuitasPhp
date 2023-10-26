<?php

require_once("configdb.php");

class CrudJesuitas{

    
    private $conexion;

    ///definimos los valores de la conexion a bbdd mediante el constructor que coge los datos de acceso del archivo configdb.php
    public function __construct()
    {
        $this->conexion = new mysqli(BBDD, USER, PASSWORD, NOMBRE_BBDD);
    }
  
    //metodo para ejecutar la consulta insert en la tabla jeusita
    public function agregarJesuita($id, $nombre, $firma)
    {
        
        try{
            $sql = "INSERT INTO jesuita (idJesuita, nombre,firma) VALUES ('$id', '$nombre','$firma')";

        }catch (mysqli_sql_exception $excp) {
            return $excp->getMessage();
    }
        return $this->conexion->query($sql);
    }

    //metodo para borrar un jesuita mediante un id
    public function borrarJesuita($id)
    {
        
        $sql = "DELETE FROM jesuita WHERE idJesuita = '$id' ";
        return $this->conexion->query($sql);
    }

    //metodo para modificar toda la fila de la tabla jesuita segun el id introducido y los nuevos datos
    public function modificarJesuita($id, $nuevoNombre,$nuevaFirma)
    {
       
        $sql = "UPDATE jesuita SET nombre = '$nuevoNombre' , firma= '$nuevaFirma' WHERE idJesuita = '$id'";
        return $this->conexion->query($sql);
    }

}
