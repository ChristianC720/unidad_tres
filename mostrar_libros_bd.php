<?php 
require_once "unidad3/config/config.php";

if ($link->connect_errno){
  die("conexion fallida" .  $conexion->connect_errno);
}else{
    //echo "se ha conectado ala base de datos sm32";
    //echo ("<br>");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<link rel="stylesheet" href="consulta.css">
</body>
<h1 color="red">Tabla de la base de datos Biblioteca</h1>
</body>
<style>
  body {
    background-color: aquamarine;
  }
</style>

<?php
if(isset($_POST['EnViar'])){

  $isbn=$_POST ['isbn'];
  $nombre=$_POST ['nombre'];
  $autor=$_POST ['autor'];
  $precio=$_POST ['precio'];
  $editorial=$_POST ['editorial'];
  $imagen=$_POST ['imagen'];
  $Editar=$_POST ['Editar'];

}

$consulta = "SELECT * FROM `libros`;";
  $result=mysqli_query($link,$consulta);
if($result)
{
//echo "se ha podido realizar la consulta";
//echo("<br>");
}
echo "<table>";
echo "<tr>";
echo "<th><h1>isbn</th></h1>";
echo "<th><h1>nombre</th></h1>";
echo "<th><h1>autor</th></h1>";
echo "<th><h1>precio</th></h1>";
echo "<th><h1>editorial</th></h1>";
echo ("<br>");
echo "<th><h1>imagen</th></h1>";
echo "<th><h1>Editar</th></h1>";
echo "</tr>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
</body>
</body>
<style></style>
<?php
while($column = mysqli_fetch_array($result)){
  $iesebeene = $column['isbn'];
  echo "<tr>";
  echo "<td/><h2>". $column['isbn']. "</td></h2>";
  echo "<td/><h2>" . $column['nombre']. "</td></h2>";
  echo "<td/><h2>" . $column['autor']. "</td></h2>";
  echo "<td/><h2>" . $column['precio']. "</td></h2>";
  echo "<td/><h2>" . $column['editorial']. "</td></h2>";
  echo "<td/><h2>" . 'asdasd'. "</td></h2>";
  echo "<td/><h2> <a href='unidad3/admin/editar_libros_bd.php?isbn=$iesebeene'>Editar</a> " . $column['isbn'] . "</td></h2>";
  echo "</tr>";
}
echo "</table>";
?> <?php echo '<a href=/admin/index.php/>regresar</a>'; } ?>