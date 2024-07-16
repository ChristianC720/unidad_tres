<?php

$conexion = mysqli_connect("localhost","root","","sm32");

$errores = [];
$isbn = $_POST ['isbn'];
$nombre = $_POST['nombre'];
$autor = $_POST['autor'];
$precio = $_POST['precio'];
$editorial = $_POST['editorial'];
$imagen = $_POST['imagen'];

if($isbn === ''){
    $errores[] = 'Debes especificr un ISBN';
}

if ($nombre === ''){
$errores[] = 'Debes especificar un Nombre';
}

if ($precio === ''){
    $errores[] = 'Debes especificar un precio';
}

if ($autor === ''){
 $errores[] = 'Debes especificar un autor';
}

if ($editorial === ''){
 $errores[] = 'Debes especificar una editorial';
}        

if ($imagen === ''){
    $errores[] = 'Debes especificar una iamgen';
   }  




if($conexion)
{
    header("Location: ../admin/crear.php/libros.php");    
}
else
{
    header("Location: ../admin/mensaje_error.php");
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<action="sm32.php" method="POST">
</body>
</html>

<body>
</html>


<?php
if(isset($_POST['EnViar'])){

  $isbn=$_POST ['isbn'];
  $nombre=$_POST ['nombre'];
  $autor=$_POST ['autor'];
  $precio=$_POST ['precio'];
  $editorial=$_POST ['editorial'];
  $imagen=$_POST ['imagen'];
}

$peticionInsertar = "INSERT INTO libros(isbn,nombre,autor,precio,editorial,imagen)
VALUES ('$isbn','$nombre','$autor','$precio', '$editorial','$imagen')";


$resultados= mysqli_query($conexion,$peticionInsertar);

if($resultados)
{
    header("Location: libros.php");

}else{

  header("Location: mensaje_error.php");

}

if($isbn < 10000){
    header("Location: libros.php");
}else{
    header("Location: mensaje_error.php");
}


if ($nombre === ''){
    header("Location: mensaje_error.php");
}

if ($precio === ''){
    header("Location: mensaje_error.php");
}

if ($autor === ''){
    header("Location: mensaje_error.php");
}

if ($editorial === ''){
    header("Location: mensaje_error.php");
}        

if ($imagen === ''){
    header("Location: mensaje_error.php");
   } 

?>






