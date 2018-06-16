<?php
include("conex.php");
session_start();

$cn = new Conex();

$con = $cn->newConex();

$monto = $_POST["monto"];
$user = $_SESSION["user"];
$fechaActual = date('Y-m-01');
for ($i=1; $i < 6; $i++) { 
    $fechaDonacion = date('Y-m-d', strtotime('+'.$i.' months', strtotime($fechaActual)));
    $sql = <<<SQL
    INSERT INTO donacion(monto,fecha_donacion,user_id) VALUES ('$monto','$fechaDonacion','$user')
SQL;
    
    $con->query($sql);

    if ($con->errno) {
        echo 'error '.$con->error;
        die();
    }

}

echo "Suscripcion realizada con exito";

?>