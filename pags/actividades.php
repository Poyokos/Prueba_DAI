<?php 

$result = $func->getQuery("act.id, act.nombre, act.observacion, act.fecha_actividad, est.nombre as estado, usr.user as voluntario", "actividad act JOIN estado est ON est.id = act.estado_id JOIN usuario usr ON act.id_user = usr.id");
// var_dump($result);
?>

<div class="container">
	<table border="1">
		<thead>
			<tr>
				<td>Nombre Actividad</td>
				<td>Observación</td>
				<td>Fecha Actividad</td>
				<td>Estado</td>
				<td>Voluntario</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			
			<?php foreach ($result as $item) { ?>
				<tr>
					<td><?= $item['nombre'] ?></td>
					<td><?= $item['observacion'] ?></td>
					<td><?= $item['fecha_actividad'] ?></td>
					<td><?= $item['estado'] ?></td>
					<td><?= $item['voluntario'] ?></td>
					<?php if ($tipo_usuario == 1) {
						echo '<td>Editar</td>';
					}elseif($tipo_usuario == 3){
						echo '<td>Donar</td>';
					} ?>
					</tr>
			<?php } ?>
		</tbody>
	</table>
</div>