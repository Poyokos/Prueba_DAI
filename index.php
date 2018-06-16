<?php 
session_start();
include('action/functions.php');

$func = new Functions();

if($func->verificarSession() == true){
	$tipo_usuario = $func->getRangoUser($func->getIdSession());
}

if (isset($_GET["op"])) {$op = $_GET["op"]; }else{ $op = 'home'; }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<base href="http://localhost/pruebadai/">
	<meta charset="UTF-8">
	<title>Fundación - Home</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<script type="text/javascript" src="js/all.js"></script>
</head>
<body>

<?php 
	//variable include página
	

	include('includes/header.php');

    include("pags/$op.php");

	include('includes/footer.php');

?>
</body>
</html>