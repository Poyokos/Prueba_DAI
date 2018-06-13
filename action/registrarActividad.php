<?php
session_start();
include("conexion.php");

$titulo = $_POST["titulo"];
$objetivo = $_POST["objetivo"];
$fechaAct = $_POST["fechaAct"];
$id_user = $_SESSION["id_user"];

$sql = <<<SQL
    INSERT INTO actividad(titulo,objetivo,fecha_actividad,estado,id_user) VALUES('$titulo','$objetivo','$fechaAct','pendiente','$id_user')
SQL;

if (mysqli_query($conn,$sql)) {
    echo "Se a registrado la actividad con exito";
}else{
    echo "Error al intentar agregar la actividad";
}


?>