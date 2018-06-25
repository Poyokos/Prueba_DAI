<?php 
session_start();
include('functions.php');
$func = new Functions;

$donador = $_POST['id'];

echo json_encode($func->getDonacionesPorUsuario($donador));

?>