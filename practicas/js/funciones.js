function procesaDatos() {
    
    var datos = {
        nombre: document.getElementById("nombre").value,
        empresa: document.getElementById("empresa").value,
        telefono: document.getElementById("telefono").value,
        email: document.getElementById("correo").value,
        fecha: document.getElementById("fecha").value,
        servicio: document.getElementById("servicio").value,
        mensaje: document.getElementById("mensaje").value
    };

    
    var citaOnline = document.getElementById("online");
    if (citaOnline.checked){
        tipoCita = document.getElementById("online").value;
    } else {
        tipoCita = document.getElementById("presencial").value;
    };

    var fechaObj = new Date(datos.fecha);
    var dia = fechaObj.getDate();
    var mes = fechaObj.getMonth() +1;
    var anio = fechaObj.getFullYear();
    var horas = fechaObj.getHours();
    var minutos = fechaObj.getMinutes();

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