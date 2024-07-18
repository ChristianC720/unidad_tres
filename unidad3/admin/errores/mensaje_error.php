<?php
echo "error al insertar a la base de datos";
$result = unserialize($_POST['result']);
foreach ($result as $key => $value) {
    echo $key.": ".$value."<br>";
}
