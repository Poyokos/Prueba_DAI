<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src=js/bootstrap.js></script>
    <title>Registro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>

    $(document).ready(function() {
        $("#formulario").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
        if (e.which == 13) {
        return false;
        }
        });

        $("#usuario").change(function(){
            var user = $(this).val();
            $.ajax({
            url: 'action/verificarUser.php',
            type: 'POST',
            data: {
                'user': user,
            },
            success: function(response){
                if (response != 0) {
                    alert("El nombre de usuario ya existe");
                    $("#usuario").css({"border":"1px solid red"});    
                }else{
                    $("#usuario").css({"border":"1px solid green"});
                }
            }
            });
        });
    });

    function validarPass(){
        var original = document.getElementById("pass").value;
        var repetir = document.getElementById("verif").value;
        if (original != repetir) {
            alert("Las contraseñas no coinciden");
          /*   document.getElementById("verif").value = ""; */
            document.getElementById("pass").style.borderColor = "red";
            document.getElementById("verif").style.borderColor = "red";
        }else{
            document.getElementById("pass").style.borderColor = "green";
            document.getElementById("verif").style.borderColor = "green";
        }
    }
    </script>
</head>
<body>
<form id="formulario" method="POST" action="action/registrarUsuario.php">
    <div class="container py-3">
    <div class="row">
        <div class="mx-auto col-sm-6">
                    <!-- form user info -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Registro</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Usuario</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="usuario" id="usuario" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Contraseña</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="pass" id="pass" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Repetir Contraseña</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password"  name="verif" id="verif" onChange="validarPass()" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="nombre" id="nombre" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Apellido</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="apellido" id="apellido" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Fecha Nacimiento</label>
                                    <div class="col-lg-9">
                                    <input class="form-control" type="date" name="fnacimiento" id="fnacimiento" required/>
                                    </div>
                                </div>                    
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Rut</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="rut" id="rut" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Teléfono</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="telefono" id="telefono" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Dirección</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="direccion" id="direccion" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Correo</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="correo" id="correo" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tipo de Usuario</label>
                                    <div class="col-lg-9">
                                        <select id="tipoUsuario" name="tipoUsuario" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="2">Voluntario</option>
                                            <option value="3">Donador</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                    <a href="login.php" class="btn btn-secondary">Volver</a>
                                    <!-- <button onclick="window.location.href='login.php'" class="btn btn-secondary">Volver</button> -->
                                        <input type="submit" class="btn btn-primary" value="Registrar">
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