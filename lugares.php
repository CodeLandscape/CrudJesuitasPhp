<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Lugares</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<h1>Gestion lugares</h1>
<body>
    <!-- añadir un lugar nuevo -->
    <form action="lugares.php" method="POST">
        <label for="nombre">IP:</label>
        <input type="text" name="ip" required>
        <label for="nombre">Nombre del lugar:</label>
        <input type="text" name="nombreLugar" required>
        <label for="nombre">Descripcion:</label>
        <input type="text" name="descripcion" required>
        <input type="submit" name="agregar" value="agregar">
    </form>
    <br>

    <!-- borrar un lugar -->
    <form action="lugares.php" method="POST">
        <label for="borrar_id">IP a borrar:</label>
        <input type="text" name="borrar_ip" required>
        <input type="submit" name="borrar" value="BorrarLugar">
    </form>
    <br>

    <!-- modificado a traves de ID -->
    <form action="lugares.php" method="POST">
        <label for="modificar_id">IP a modificar:</label>
        <input type="text" name="modificarIp" required>
        <label for="nuevo_nombre">Nuevo lugar:</label>
        <input type="text" name="nuevoLugar" required>
        <label for="nombre">Nueva Descripcion:</label>
        <input type="text" name="nuevaDescripcion" required>
        <input type="submit" name="modificar" value="ModificarLugar">
    </form>
    <br>
    <form action="mostrar.php">
        <label for="mostrardatos">Mostrar todos los lugares</label>
        <input type="text" name= "mostrar">
        <input type="submit" name="mostrar" value="mostrarlistado">
    </form>
    <a href="tablas.html">Volver a la seleccion de tablas de la BBD</a>
    <?php

    require_once("crudLugares.php");
    $nuevolugar = new CrudLugares();

    if (isset($_POST["agregar"])) {
        $ip = $_POST["ip"];
        $lugar = $_POST["nombreLugar"];
        $descripcion= $_POST["descripcion"];
        $resultado = $nuevolugar->nuevoLugar($ip, $lugar,$descripcion);

        if ($resultado) {
            echo "Lugar agregado con éxito.";
        } else {
            echo "Error al agregar el lugar.";
        }
    }

    if (isset($_POST["borrar"])) {
        $ipBorrar = $_POST["borrar_ip"];
        $resultadoBorrar = $nuevolugar->borrarLugar($ipBorrar);

        if ($resultadoBorrar) {
            echo "Lugares con Ip $ipBorrar han sido borrados con éxito.";
        } else {
            echo "No se ha podido borrar ningun lugar.";
        }
    }


    if (isset($_POST["modificar"])) {
        $ipModificar = $_POST["modificarIp"];
        $nuevoLugar = $_POST["nuevoLugar"];
        $nuevaDescripcion = $_POST["nuevaDescripcion"];
        $resultadoModificar = $nuevolugar->modificarLugar($ipModificar, $nuevoLugar,$nuevaDescripcion);

        if ($resultadoModificar) {
            echo "Lugar con IP $ipModificar ha sido modificada con éxito.";
        } else {
            echo "Error al modificar el lugar escogido.";
        }
    }
    ?>
</body>

</html>