<?php 

$con = new mysqli("localhost", "root", '', 'dai');
$con->query("SET NAMES 'utf8'");

if ($con->errno) {
	echo "Error al conectar con la base de datos";
}
?>