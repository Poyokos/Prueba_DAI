<?php
include 'conexion.php';

$usuario = $_POST["user"];
$sql = 'SELECT * FROM usuario WHERE user = "'.$usuario.'"';

$response = mysqli_query($conn,$sql);

if (mysqli_num_rows($response) != 0) {
    echo "1";
}else{
    echo "0";
}
?>