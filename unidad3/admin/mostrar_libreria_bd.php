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
} else ?>
    <div class='p1'><div class='back1'>
    <table border='1' cellpadding='10' cellspacing='0'>
    <a href=../index.php>regresar</a>
    <tr>
    <th><h3>ISBN</th></h3>
    <th><h3>Nombre</th></h3>
    <th><h3>Autor</th></h3>
    <th><h3>Precio</th></h3>
    <th><h3>Editorial</th></h3>

    <th><h3>Imagen</th></h3>
    <th><h3>Editar</th></h3>
    <th><h3>Eliminar</th></h3>
    </tr>

    <?php while($column = mysqli_fetch_array($result)){ ?>
            <tr>
            <td/> <?php echo $column['isbn']; ?>  </td>
            <td/> <?php echo $column['nombre']; ?>  </td>
            <td/> <?php echo $column['autor']; ?>  </td>
            <td/> <?php echo $column['precio']; ?>  </td>
            <td/> <?php echo $column['editorial']; ?>  </td>
            <td><image src=" <?php echo $column['imagen']; ?> " width='100px'></td>


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