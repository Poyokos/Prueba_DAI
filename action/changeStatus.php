<?php
session_start();
include("conexion.php");

$estado = $_POST["estado"];
$id = $_POST["id"];

if ($estado == 1) {
    $sql = <<<SQL
    UPDATE actividad SET estado = 'aprobado' WHERE id = '$id'
SQL;
}else{
    $sql = <<<SQL
    UPDATE actividad SET estado = 'rechazado' WHERE id = '$id'
SQL;
}

mysqli_query($conn,$sql);
?>