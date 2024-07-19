<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/disen.css">
<body>
<?php
require_once "../config/config.php";

if ($link->connect_errno){
    die("conexion fallida" .  $link->connect_errno);
}else{
$consulta = "SELECT * FROM `libros`;";
  $result=mysqli_query($link,$consulta);
if(!$result){
    echo "No se ha podido realizar la consulta";
} else {
    echo "<div class='p1'><div class='back1'>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr>";
    echo "<th><h2>ISBN</th></h2>";
    echo "<th><h2>Nombre</th></h2>";
    echo "<th><h2>Autor</th></h2>";
    echo "<th><h2>Precio</th></h2>";
    echo "<th><h2>Editorial</th></h2>";
    echo ("<br>");
    echo "<th><h2>Imagen</th></h2>";
    echo "<th><h2>Editar</th></h2>";
    echo "<th><h2>Eliminar</th></h2>";
    echo "</tr>";

    while($column = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td/>". $column['isbn']. "   </td>";
            echo "<td/>" . $column['nombre']. "</td>";
            echo "<td/>" . $column['autor']. "</td>";
            echo "<td/>" . $column['precio']. "</td>";
            echo "<td/>" . $column['editorial']. "</td>";
            echo "<td/>" . 'asdasd'. "</td>"; ?>

            <td/> <form action="editar_libros_bd.php" method="POST">
                <input name="isbn" value="<?php echo $column['isbn']; ?>" hidden>
                <input name="update" value="" hidden>
                <button type="submit" > Editar </button>
            </form> </td>

            <td/> <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input name="isbn" value="<?php echo $column['isbn']; ?>" hidden>
                <input name="delete" value="" hidden>
                <button type="submit" > Eliminar </button>
            </form> </td>

        </tr> <?php
    }
    echo "</table>";
    echo '<a href=../index.php>regresar</a>';
    }
}

if ($_POST) {
    mysqli_set_charset($link, "utf8");

    $isbn = $_POST['isbn'];

    $sql = "SELECT * FROM libros where isbn='$isbn'";
    $resultado = mysqli_query($link, $sql);
    while ($column = mysqli_fetch_array($resultado)) {
        $id = $column['id'];
    }
    $sql = "DELETE FROM libros where id='$id'";
    $result = mysqli_query($link, $sql);
    if ($result > 0) {
        echo "<br> El libro se ha eliminado correctamente";
        ?><script>
        setTimeout(function() {
            window.location.href = 'mostrar_libreria_bd.php';
        }, 1000); // Redirige después de medio segundo
        </script> <?php
    }
}

?>
</div>
</div>
</body>
</html>