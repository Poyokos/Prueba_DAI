<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <title>Agregar Actividad</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="js/main.js"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
    $(document).ready(function() {
        $("#btnAgregar").on('click', function(){
            var titulo = $('#titulo').val();	
            var objetivo = $('#objetivo').val();
            var fechaAct = $('#fechaAct').val();
           
            $.ajax({
                url: 'action/registrarActividad.php',
                type: 'POST',
                data: {
                    'titulo': titulo,
                    'objetivo': objetivo,
                    'fechaAct': fechaAct,
                },
                success: function(response){
                    alert(response);
                }
            });       		
	    });
    });
    </script>
</head>
<body>
    <form id="formulario">
    <div class="container py-3">
    <div class="row">
        <div class="mx-auto col-sm-6">
                    <!-- form user info -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Agregar Actividad</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nombre de la actividad</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="titulo" id="titulo" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Objetivo</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" rows="4" cols="50" name="objetivo" id="objetivo" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Fecha a realizar</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="date"  name="fechaAct" id="fechaAct" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                    <a href="login.php" class="btn btn-secondary">Volver</a>
                                    <!-- <button onclick="window.location.href='login.php'" class="btn btn-secondary">Volver</button> -->
                                        <button class="btn btn-primary" name="btnAgregar" id="btnAgregar">Agregar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->
        </div>
    </div>
</div>
    </form>
</body>
</html>