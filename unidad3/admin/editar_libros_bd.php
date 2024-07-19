<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/disen.css">
</head>
<body>
<div class="p1">
    <div class="back1">
<a href="../index.php"> Regresar</a>
        <?php
        if($_POST){
            require_once "../config/config.php";
            mysqli_set_charset($link,"utf8");
            $updated = $_POST['update'];
            if (!$updated == '') {
                $errores = [];
                $id=$_POST['id'];
                $isbn=$_POST['isbn'];
                $name=$_POST['name'];
                $author=$_POST['autor'];
                $price=$_POST['precio'];
                $publisher=$_POST['editorial'];

                if ($isbn === '') {
                    $errores[] = 'ISBN';
                }
                if ($name === '') {
                    $errores[] = 'Nombre';
                }
                if ($author === '') {
                    $errores[] = 'Autor';
                }
                if ($price === '') {
                    $errores[] = 'Precio';
                }
                if ($publisher === '') {
                    $errores[] = 'Editorial';
                }
                if (empty($errores)) {
                    $sql= " UPDATE libros SET isbn = '$isbn', nombre = '$name', autor = '$author', precio = '$price', editorial = '$publisher' WHERE id = '$id' ";
                    $resultado = mysqli_query($link, $sql);
                    echo "<br> El libro se actualizo correctamente";
                ?><script>
                setTimeout(function() {
                    window.location.href = 'mostrar_libreria_bd.php';
                }, 1000); // Redirige después de un segundo
            </script> <?php
                } else{
                    header("Location: errores/mensaje_error.php");
                    }
            }
            else {
            $errores = [];
            $isbn=$_POST['isbn'];
            $sql= "SELECT * FROM libros where isbn='$isbn'";
            $resultado = mysqli_query($link, $sql);
            while($column = mysqli_fetch_array($resultado)){
                $id = $column['id'];
                $isbn = $column['isbn'];
                $name = $column['nombre'];
                $author = $column['autor'];
                $price = $column['precio'];
                $publisher = $column['editorial'];
            }

            if ($isbn === '') {
                $errores[] = 'ISBN';
            }
            if ($name === '') {
                $errores[] = 'Nombre';
            }
            if ($author === '') {
                $errores[] = 'Autor';
            }
            if ($price === '') {
                $errores[] = 'Precio';
            }
            if ($publisher === '') {
                $errores[] = 'Editorial';
            }
            if (empty($errores)) {

        ?>
<form method="POST" name="EditarLibro" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <table>
        <tr>
        <th><label for="isbn">ISBN</label></th>
        <td><input type="text" name="isbn" placeholder="Ingrese el isbn" value="<?php echo $isbn ?>"></td>
        </tr>
        <tr>
        <th><label for="name">NOMBRE:</label></th>
        <td><input type="text" name="name" placeholder="Ingrese el nombre" value="<?php echo $name ?>"></td>
        </tr>
        <tr>
        <th><label for="autor">AUTOR:</label></th>
        <td><input type="text" name="autor" placeholder="Ingrese el autor" value="<?php echo $author; ?>"></td>
        </tr>
        <tr>
        <th><label for="precio">PRECIO:</label></th>
        <td><input type="number" name="precio" placeholder="Ingrese el precio" step="0.01" value="<?php echo $price; ?>"></td>
        </tr>
        <tr>
        <th><label for="editorial">EDITORIAL:</label></th>
        <td><input type="text" name="editorial" placeholder="Ingrese la editorial" value="<?php echo $publisher; ?>"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" name="update" value="Actualizar">
</form>
            <?php
            }
            else{
                header("Location: errores/mensaje_error.php");
                }
            }
        }
        ?>
    </div>
</div>

</body>
</html>