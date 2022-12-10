<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar</title>
</head>
<body>
    <h1>MEMES</h1>
    <button type="submit"><a href="index.php">Inicio</a></button>
    <button type="submit"><a href="listar.php">Listar</a></button>
    <button type="submit"><a href="agregar.html">Agregar meme</a></button>
    <h2>Lista de memes</h2>
    <p>La siguiente lista muestra los MEMES</p>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Texto</th>
        <th>Dimension</th>
        <th>formato</th>
        <th>IMAGEN</th>
        <th>EDITAR</th>
        <th>BORRAR</th>
    </tr>
    <?php
    // 1) Conexion
    $conexion = mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($conexion, "fotos");


    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta='SELECT * FROM imagenes';

    // 3) Ejecutar la orden y obtenemos los registros
    $datos= mysqli_query($conexion, $consulta);

    /*nueva forma con foreach
    while ($reg=mysqli_fetch_array($datos, MYSQLI_ASSOC)){
      foreach ($reg as $key => $value) {
        print ("<p>$key: $value</p>\n");
      };
    };*/

    // 4) Mostrar los datos del registro
     while ($reg=mysqli_fetch_array($datos)) { ?>
        <tr>
        <td><?php echo $reg['id']; ?></td>
        <td><?php echo $reg['text']; ?></td>
        <td><?php echo $reg['dimension']; ?></td>
        <td><?php echo $reg['formato']; ?></td>
        <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="100px" height="100px"></td>
        <td><a href="modificar.php?id=<?php echo $reg['id'];?>">Editar</a></td>
        <td><a href="borrar.php?id=<?php echo $reg['id'];?>">Borrar</a></td>
        </tr>
    <?php } ?>
  </table>
 