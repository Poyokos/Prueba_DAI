<?php
include('action/conexion.php');

$sql = "SELECT a.nombre AS actividad, a.observacion AS detalle, u.user AS usuario, a.fecha_actividad AS fecha FROM actividad a
join usuario u on u.id = a.id_user
where estado_id = 1";
$response = mysqli_query($conn,$sql);
?>

<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/actividades.css" rel="stylesheet">
</head>

<div class="container">
		<div class="row">
			<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
				<ul class="event-list">
					<?php while ($row = mysqli_fetch_assoc($response)) {?>
					<?php
					$fecha = $row["fecha"];
					$dia = 	date("d",strtotime($fecha));
					$mes = 	date("M",strtotime($fecha));				
					?>
						<li>
						<time datetime="2014-07-20 0000">
							<span class="day"><?=$dia?></span>
							<span class="month"><?=$mes?></span>
						</time>
						<div class="info">
							<h2 class="title"><?=$row["actividad"]?></h2>
							<p class="desc"><?=$row["detalle"]?></p>
							<ul>
								<li style="width:50%;"></span>Creado Por: <?=$row["usuario"]?></a></li>
							</ul>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>