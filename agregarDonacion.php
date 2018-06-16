<?php
include('action/verificarSession.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <script src="js/functions.js"></script>
    <title>Agregar Actividad</title>
    <!-- <script src="js/main.js"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
    </script>
</head>
<body>
    <form id="formulario" method="POST">
    <div class="container py-3">
    <div class="row">
        <div class="mx-auto col-sm-6">
                    <!-- form user info -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Agregar Donación</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Monto a donar:</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number" placeHolder="Mínimo: $5000" name="monto" id="monto" required/>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            La donación será recaudada el primer dia de cada mes.
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                    <a href="login.php" class="btn btn-secondary">Volver</a>
                                    <!-- <button onclick="window.location.href='login.php'" class="btn btn-secondary">Volver</button> -->
                                        <button class="btn btn-primary" name="btnSuscribir" id="btnSuscribir">Suscribir</button>
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