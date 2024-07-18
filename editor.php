<?php
$Editar= [];
if($_SERVER = ['REQUEST_METHOD'] === 'POST') {
$errores = [];
$isbn=$_POST['isbn'];
$name=$_POST['name'];
$author=$_POST['autor'];
$price=$_POST['precio'];
$publisher=$_POST['editorial'];
$image=$_POST['imagen'];
}

require_once "unidad3/config/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de libreria</title>
</head>
<body>
<form action="http://localhost/admin/mostrar_libros_bd.php/" method="POST"> <!--o crear php-->
<label for="">ISBN</label>
<input type="text" name="isbn">
<label for="">Nombre</label>
<input type="text" name="nombre">
<label for="">Autor</label>
<input type="text"name ="autor">
<label for="">Precio</label>
<input type="number" name="precio">
<label for="">Editorial</label>
<input type="text"name="editorial"><br>
<label fot ="">imagen</label>
<input type="text"name="imagen">
<input type="submit" value="Editar"><br>
</body>
</html>