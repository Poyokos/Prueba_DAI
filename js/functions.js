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

    $("#btnAprobar").on('click', function(){
        var id = $('#idAprobar').val();
        $.ajax({
          url: 'action/changeStatus.php',
          type: 'POST',
          data: {
            'estado': 1,
            'id': id,
          },
          success: function(response){
            location.reload();
          }
        });
    });

    $("#btnRechazar").on('click', function(){
        var id = $('#idRechazar').val();
        $.ajax({
          url: 'action/changeStatus.php',
          type: 'POST',
          data: {
            'estado': 4,
            'id': id,
          },
          success: function(response){
            location.reload();
          }
        });
    });

    $("#btnCancelar").on('click', function(){
        var id = $('#idCancelar').val();
        $.ajax({
          url: 'action/changeStatus.php',
          type: 'POST',
          data: {
            'estado': 3,
            'id': id,
          },
          success: function(response){
            location.reload();
          }
        });
    });

    $("#btnSuscribir").on('click', function(){
        var monto = $('#monto').val();	
        $.ajax({
            url: 'action/registrarDonacion.php',
            type: 'POST',
            data: {
                'monto': monto,
            },
            success: function(response){
                alert(response);
                location.reload();
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

function estado(id,estado){
    if (estado == 3) {
        document.getElementById('idCancelar').value = id;
        return;
    }
    if (estado == 0) {
        document.getElementById('idRechazar').value = id;
    }else{
        document.getElementById('idAprobar').value = id;
    }
}
