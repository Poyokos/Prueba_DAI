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