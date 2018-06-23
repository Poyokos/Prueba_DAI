<?php
session_start();
include("conexion.php");

$estado = $_POST["estado"];
$id = $_POST["id"];

if ($estado == 1) {
    $sql = <<<SQL
    UPDATE actividad SET estado_id = '1' WHERE id = '$id'
SQL;
}elseif($estado == 3){
    $sql = <<<SQL
    UPDATE actividad SET estado_id = '3' WHERE id = '$id'
SQL;
}elseif($estado == 4){
    $sql = <<<SQL
    UPDATE actividad SET estado_id = '4' WHERE id = '$id'
SQL;
}

mysqli_query($conn,$sql);
?>