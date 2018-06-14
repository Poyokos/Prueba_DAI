<?php
include("conex.php");

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

$rand = rand(1000000, 9999999);

$pass_encrypted = md5($pass);
$password_salt = md5($rand);

$password = hash('md5', $pass_encrypted.$password_salt);

$sql = "INSERT INTO usuario(user,pass, password_salt,tipo_usuario,rut,nombre,apellido,fecha_nacimiento,telefono,direccion,correo) VALUES('$usuario','$password', '$password_salt','$tipoUsuario','$rut','$nombre','$apellido','$fnacimiento','$telefono','$direccion','$correo')";

$con->query($sql);

if ($con->errno) {
	echo 'error '.$con->error;
}else{
	header("Location: ../login");
}


?>