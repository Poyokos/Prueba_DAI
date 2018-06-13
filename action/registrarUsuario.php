<?php
include("conexion.php");

$usuario = $_POST["usuario"];
$pass = $_POST["pass"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$rut = $_POST["rut"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$correo = $_POST["correo"];
$fnacimiento = $_POST["fnacimiento"];
$tipoUsuario = $_POST["tipoUsuario"];

$pass = dec_enc("encrypt",$pass);

$sql = <<<SQL
    INSERT INTO usuario(user,pass,tipo_usuario,rut,nombre,apellido,fecha_nacimiento,telefono,direccion,correo) VALUES('$usuario','$pass','$tipoUsuario','$rut','$nombre','$apellido','$fnacimiento','$telefono','$direccion','$correo')
SQL;

echo $sql;

mysqli_query($conn,$sql);

header("Location: login.php");
?>