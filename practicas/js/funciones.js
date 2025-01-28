
function procesaDatos() {
    var fecha = document.getElementById("fecha").value;
    var fechaObj = new Date(fecha);
    var dia = fechaObj.getDate();
    var mes = fechaObj.getMonth() +1;
    var anio = fechaObj.getFullYear();
    var hora = fechaObj.getHours();
    var minutos = fechaObj.getMinutes();

    var citaOnline = document.getElementById("online");
    var tipoCita;
    if (citaOnline.checked){
        tipoCita = document.getElementById("online").value;
    } else {
        tipoCita = document.getElementById("presencial").value;
    };

    var datos = {
        nombre: document.getElementById("nombre").value,
        empresa: document.getElementById("empresa").value,
        telefono: document.getElementById("telefono").value,
        email: document.getElementById("correo").value,
        servicio: document.getElementById("servicio").value,
        mensaje: document.getElementById("mensaje").value,
        dia: dia,
        mes: mes,
        anio: anio,
        hora: hora,
        minutos: minutos,
        tipoCita: tipoCita
    };

    
   

   

    $.ajax({
        type: "POST",
        url: "controller.php",
        data: datos,
        dataType: "json",
        success: function(response) {
            console.log(response.data);
        }
    })
}