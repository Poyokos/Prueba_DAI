<?php
include('action/conexion.php');
$userid = $_SESSION["user"]
?>

<div class="container">
	<div class="row" style="margin:10px">
		<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Objetivo</th>
        <th>Fecha Actividad</th>
        <th>Estado</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SELECT *,a.id AS id_actividad, e.nombre AS estado, a.nombre AS actividad FROM actividad a join usuario u on u.id = a.id_user join estado e on e.id = a.estado_id WHERE a.id_user = {$userid}";
        $response = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($response)) {
            echo "<tr>";
            echo    '<td>'.$row["id_actividad"].'</td>';
            echo    '<td>'.$row["actividad"].'</td>';
            echo    '<td>'.$row["observacion"].'</td>';
            echo    '<td>'.$row["fecha_actividad"].'</td>';
            echo    '<td>'.ucfirst($row["estado"]).'</td>';
            if (strtolower($row["estado"]) == "pendiente") {
                echo    '<td>
                <center>
                <button type="button" class="btn btn-danger" onclick="estado(\''.$row["id_actividad"].'\',\'3\')" title="Cancelar" data-toggle="modal" data-target="#rechazarModal">
                <span class="fas fa-times fa-sm"></span>
                </button>
                </center>
                        </td>';
                echo "</tr>";
            }else{
                echo    '<td>
                <center>
                <button type="button" class="btn" title="Cancelar" data-toggle="modal" data-target="#rechazarModal" disabled>
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
						<h4 class="modal-title">Cancelar Actividad</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Esta seguro de que quiere cancelar esta actividad?</p>
					</div>
					<input type="hidden" id="idCancelar" name="idCancelar"/>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Atras">
						<input type="button" class="btn btn-danger" name="btnCancelar" id="btnCancelar" value="Cancelar Actividad">
					</div>
				</form>
			</div>
		</div>
	</div>