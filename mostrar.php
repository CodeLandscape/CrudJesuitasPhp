<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar todos los lugares</title>
</head>
<body>
    <?php
        require_once("crudLugares.php");
        $listado= new CrudLugares();
        $listado->listarLugares();
        

    ?>
</body>
</html>