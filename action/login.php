<?php 
session_start();
include('conex.php');

if (!empty($_POST)) {
	$user = $_POST['usuario'];
	$pass = $_POST['pass'];

	$pass_hash = md5($pass);
	$pass_result = $con->query("SELECT password_salt FROM usuario WHERE user = '{$user}'");
	$row = $pass_result->fetch_array(MYSQLI_ASSOC);

	$password_final = hash('md5',$pass_hash.$row["password_salt"]);


	$result = $con->query("SELECT id, user FROM usuario WHERE pass = '{$password_final}' and user = '{$user}'");
	$usr = $result->fetch_array(MYSQLI_ASSOC);

	if ($result->num_rows > 0) {
		$_SESSION["user"] = $usr["id"];
		// var_dump($_SESSION['user']);
		header("Location: ../home");
	}else{
		echo 'Usuario o contraseña incorrectos';
	}
}else{
	header("Location: ../login");
}


?>