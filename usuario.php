<?php
session_start();
include("action/conexion.php");

$usuario = $_POST["usuario"];
$pass = $_POST["pass"];

$pass = dec_enc("encrypt",$_POST["pass"]);

$sql = 'SELECT * FROM usuario WHERE user = "'.$usuario.'"';

$response = mysqli_query($conn,$sql);

if (mysqli_num_rows($response) == 0) {
    header("Location: login.php?error");
}else{
    $sql = 'SELECT * FROM usuario WHERE user = "'.$usuario.'" AND pass = "'.$pass.'"';
    $respuesta = mysqli_query($conn,$sql);
    if (mysqli_num_rows($respuesta) == 0) {
        header("Location: login.php?failed");
    }else{
        while ($row = mysqli_fetch_assoc($respuesta)) {
            $_SESSION["id_user"] = $row["id"];
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <table border="solid">
        <tr>
            <td>Nombre<td>
            <td>Edad<td>
            <td>user<td>
            <td>Password<td>
        </tr>
        <?php
        $sql = "SELECT * FROM usuario";
        $response = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($response)) {
            $cumpleanos = new DateTime($row["fnacimiento"]);
            $hoy = new DateTime();
            $annos = $hoy->diff($cumpleanos);
            $pass = dec_enc("decrypt",$row["pass"]);
            echo "<tr>";
            echo    '<td>'.$row["nombre"].'<td>';
            echo    '<td>'.$annos->y.'<td>';
            echo    '<td>'.$row["user"].'<td>';
            echo    '<td>'.$pass.'<td>';
            echo "</tr>";    
        } 
        ?>
        
    </table>
</body>
</html>