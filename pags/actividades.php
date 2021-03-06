<?php
include('action/conexion.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="js/bootstrap.js"></script>
    <title>Agregar Actividad</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="js/functions.js"></script>
    <!-- <script src="js/main.js"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .table{
        background-color:#fff;
        box-shadow:0px 2px 2px #aaa;
        margin-top:50px;
    }
    </style>
</head>
<body>
<div class="container">
	<div class="row">
		<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Objetivo</th>
        <th>Fecha Actividad</th>
        <th>Estado</th>
        <th>Usuario</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SELECT *,a.id AS id_actividad, e.nombre AS estado, a.nombre as nombre_act FROM actividad a join usuario u on u.id = a.id_user join estado e on e.id = a.estado_id";
        $response = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($response)) {
            echo "<tr>";
            echo    '<td>'.$row["id_actividad"].'</td>';
            echo    '<td>'.$row["nombre_act"].'</td>';
            echo    '<td>'.$row["observacion"].'</td>';
            echo    '<td>'.$row["fecha_actividad"].'</td>';
            echo    '<td>'.$row["estado"].'</td>';
            echo    '<td>'.$row["user"].'</td>';
            if (strtolower($row["estado"]) == "pendiente") {
                echo    '<td>
                <center>
                <button type="button" class="btn btn-success" onclick="estado(\''.$row["id_actividad"].'\',\'1\')" title="Aprovar" data-toggle="modal" data-target="#aprobarModal">
                <span class="fas fa-check fa-sm"></span>
                </button>
                &nbsp
                <button type="button" class="btn btn-danger" onclick="estado(\''.$row["id_actividad"].'\',\'0\')" title="Rechazar" data-toggle="modal" data-target="#rechazarModal">
                <span class="fas fa-times fa-sm"></span>
                </button>
                </center>
                        </td>';
                echo "</tr>";
            }else if(strtolower($row["estado"]) == "rechazado") {
                echo    '<td>
                <center>
                <button type="button" class="btn btn-success" onclick="estado(\''.$row["id_actividad"].'\',\'1\')" title="Aprovar" data-toggle="modal" data-target="#aprobarModal">
                <span class="fas fa-check fa-sm"></span>
                </button>
                &nbsp
                <button type="button" class="btn" onclick="estado(\''.$row["id_actividad"].'\',\'0\')" title="Rechazar" data-toggle="modal" data-target="#rechazarModal" disabled>
                <span class="fas fa-times fa-sm"></span>
                </button>
                </center>
                        </td>';
                echo "</tr>";
            }else{
                echo    '<td>
                <center>
                <button type="button" class="btn" onclick="estado(\''.$row["id_actividad"].'\',\'1\')" title="Aprovar" data-toggle="modal" data-target="#aprobarModal" disabled>
                <span class="fas fa-check fa-sm"></span>
                </button>
                &nbsp
                <button type="button" class="btn btn-danger" onclick="estado(\''.$row["id_actividad"].'\',\'0\')" title="Rechazar" data-toggle="modal" data-target="#rechazarModal">
                <span class="fas fa-times fa-sm"></span>
                </button>
                </center>
                        </td>';
                echo "</tr>";
            }
                
        } 
    ?>
    </tbody>
  </table>
	</div>
</div>

<div id="rechazarModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Rechazar Actividad</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Esta seguro de que quiere rechazar esta actividad?</p>
					</div>
					<input type="hidden" id="idRechazar" name="idRechazar"/>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="button" class="btn btn-danger" name="btnRechazar" id="btnRechazar" value="Rechazar">
					</div>
				</form>
			</div>
		</div>
	</div>

    <div id="aprobarModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Aprobar Actividad</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Esta seguro de que quiere aprobar esta actividad?</p>
					</div>
					<input type="hidden" id="idAprobar" name="idAprobar"/>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="button" class="btn btn-success" name="btnAprobar" id="btnAprobar" value="Aprobar">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>