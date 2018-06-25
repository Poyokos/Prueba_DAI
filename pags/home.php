<div class="container">
	
	<?php 
		if ($tipo_usuario == 1) { 
			$donaciones = $func->getDonacionesMes();
			$donaciones_proyectadas = $func->doProyectadas();
			$donadores = $func->getDonadores();

			?>
			<div class="grid-50">
				<div id="mes_actual"></div>
				<div id="do_proyectadas"></div>

				<div class="usuarios">
					<h2>Usuarios donadores</h2>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Usuario</th>
								<th scope="col">Telefono</th>
								<th scope="col">RUT</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($donadores as $donador) { ?>
							<tr>
								<td><?= $donador['user'] ?></td>
								<td><?= $donador['telefono'] ?></td>
								<td><?= $donador['rut'] ?></td>
								<td><a href="javascript:void(0)" rel="<?= $donador['id'] ?>" class="btn_donaciones" data-toggle="modal" data-target="#exampleModalCenter">Ver Donaciones</a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			
		<?php 
		}else{
			echo '';
		}

	?>

</div>

<script type="text/javascript">
	
	// Create the chart
Highcharts.chart('mes_actual', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Donaciones de este mes'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: ${point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    "series": [
        {
            "name": "Actividades",
            "colorByPoint": true,
            "data": [
            	<?php foreach($donaciones as $item){?>
                {
                    "name": "<?= $item['nombre'] ?>",
                    "y": <?= (int)$item['monto'] ?>,
                },
                <?php } ?>
            ]
        }
    ]
});

Highcharts.chart('do_proyectadas', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Donaciones proyectadas'
    },
    xAxis: {
        categories: [
            'Jul',
            'Ago',
            'Sep',
            'Oct',
            'Nov',
            'Dic'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Valor donaciones'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>${point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Suma donaciones',
        data: [
        	<?php 
        		foreach ($donaciones_proyectadas['donacion'] as $item) {
        			echo $item['monto'] . ',';
        		}
        	?>
        ]
    }]
});

$('.btn_donaciones').on('click', function(){
	var id = $(this).attr('rel');
	// console.log(id);
	$.ajax({
		url: 'action/ajax_donaciones.php',
		type: 'post',
		dataType: 'json',
		data: {id: id},
		success: function(res){
			// console.log(res);
			$('.arr_resp').html('');
			for(var i in res){

				$('.arr_resp').append('<tr class="table_modal"><td>' + res[i]['nombre'] + '</td><td>$ ' + res[i]['monto'] + '</td></tr>');
			}
			$('.modal_don').fadeIn();
			$('.bg_modal').fadeIn();
		}
	});
});
</script>