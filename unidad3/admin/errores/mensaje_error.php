<?php
echo "error al insertar a la base de datos";
$errores[]=$_GET['error'];

foreach ($errores as $error) {
    echo $error."<br>";
}