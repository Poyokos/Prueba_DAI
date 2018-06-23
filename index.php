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
	<base href="http://localhost/pruebaDai/">
	<meta charset="UTF-8">
	<title>Fundación - Home</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="js/bootstrap.js"></script>
    <script src="js/functions.js"></script>
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