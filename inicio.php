<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<h1>Gestion Jesuitas</h1>
<body>
    <!-- añadir un jesuita -->
    <form action="inicio.php" method="POST">
        <label for="nombre">ID:</label>
        <input type="text" name="id" required>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="nombre">Firma:</label>
        <input type="text" name="firma" required>
        <input type="submit" name="agregar" value="agregar">
    </form>
    <br>

    <!-- borrar un jesuita -->
    <form action="inicio.php" method="POST">
        <label for="borrar_id">ID a borrar:</label>
        <input type="text" name="borrar_id" required>
        <input type="submit" name="borrar" value="Borrar Jesuita">
    </form>
    <br>

    <!-- modificado a traves de ID -->
    <form action="inicio.php" method="POST">
        <label for="modificar_id">ID a modificar:</label>
        <input type="text" name="modificar_id" required>
        <label for="nuevo_nombre">Nuevo nombre:</label>
        <input type="text" name="nuevo_nombre" required>
        <label for="nombre">Nueva Firma:</label>
        <input type="text" name="firma" required>
        <input type="submit" name="modificar" value="Modificar Jesuita">
    </form>

    <br>
    <form action="inicio.php">
        <label for="mostrardatos">Introduce el id a modificar</label>
        <input type="text" name= "mostrar">
        <input type="submit" name="mostrar" value="mostrarlistado">
    </form>
    <br>
    <a href="tablas.html">Volver a la seleccion de tablas de la BBD</a>
    <?php

    require_once("crudJesuitas.php");
    $jesuita = new Crud();

    if (isset($_POST["agregar"])) {
        $nombreJesuita = $_POST["nombre"];
        $idJesuita = $_POST["id"];
        $firma= $_POST["firma"];
        $resultado = $jesuita->agregarJesuita($idJesuita, $nombreJesuita,$firma);

        if ($resultado) {
            echo "Jesuita agregado con éxito.";
        } else {
            echo "Error al agregar el Jesuita.";
        }
    }

    if (isset($_POST["borrar"])) {
        $idBorrar = $_POST["borrar_id"];
        $resultadoBorrar = $jesuita->borrarJesuita($idBorrar);

        if ($resultadoBorrar) {
            echo "Jesuita con ID $idBorrar ha sido borrado con éxito.";
        } else {
            echo "Error al borrar el Jesuita.";
        }
    }


    if (isset($_POST["modificar"])) {
        $idModificar = $_POST["modificar_id"];
        $nuevoNombre = $_POST["nuevo_nombre"];
        $nuevaFirma = $_POST["firma"];
        $resultadoModificar = $jesuita->modificarJesuita($idModificar, $nuevoNombre,$nuevaFirma);

        if ($resultadoModificar) {
            echo "Jesuita con ID $idModificar ha sido modificado con éxito.";
        } else {
            echo "Error al modificar el Jesuita.";
        }
    }

    if(isset($_POST["mostrar"]))
    {
        $idbusqueda= $_POST["mostrar"];
        $resultado= $jesuita->mostrarVisitas($idbusqueda);
        if($idbusqueda)
        {
            echo "Id del jesuita a modificar $idbusqueda";
        }
    }
    ?>
</body>

</html>