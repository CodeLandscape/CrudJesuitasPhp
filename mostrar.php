<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar todos los lugares</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
        require_once("crudLugares.php");
        $listado= new CrudLugares();        //instanciar objeto de la clase CrudLugares
        $resultado=$listado->listarLugares();          //llamar al metodo que ejecuta el listado
        echo '<h1>Listado de lugares</h1>';
        echo '<select>';
        while ($listado = $resultado->fetch_assoc()) {          ///lista todos los lugares recorriendo las filas que devuelva la funcion
            echo '<option>' . $listado['lugar'] . '</option>';
        }
        echo '</select>';
    ?>
</body>
</html>