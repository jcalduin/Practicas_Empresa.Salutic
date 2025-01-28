
function procesaDatos() {

    var fecha = document.getElementById("fecha").value;
    var fechaObj = new Date(fecha);
    var dia = fechaObj.getDate();
    var mes = fechaObj.getMonth() +1;
    var anio = fechaObj.getFullYear();
    var hora = fechaObj.getHours();
    var minuto = fechaObj.getMinutes();
    var boton = document.getElementById("mostrar");
    var confirmacionOculta = document.getElementById("confirmacion");

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
        minuto: minuto,
        tipoCita: tipoCita
    };

    $.ajax({
        type: "POST",
        url: "controller.php",
        data: datos,
        dataType: "json",
        success: function(response) {
            alert("Solicitud enviada correctamente\nPulse en Mostrar confirmación para ver los datos de la cita");
            document.getElementById("empresa_confirmacion").textContent= response.data.empresa;
            document.getElementById("dia_confirmacion").textContent = response.data.dia;
            document.getElementById("mes_confirmacion").textContent = response.data.mes;
            document.getElementById("anio_confirmacion").textContent = response.data.anio;
            document.getElementById("hora_confirmacion").textContent = response.data.hora;
            document.getElementById("modalidad_confirmacion").textContent = response.data.modalidad;
            document.getElementById("servicio_confirmacion").textContent = response.data.servicio;
            document.getElementById("info_confirmacion").textContent = response.data.mensaje;
            document.getElementById("correo_confirmacion").textContent = response.data.email;
            document.getElementById("nombre_confirmacion").textContent = response.data.nombre;  
            document.getElementById("minuto_confirmacion").textContent = response.data.minuto;
        }
    })

    function mostrarConfirmacion() {
        confirmacionOculta.classList.toggle("oculto");
        boton.textContent = (boton.textContent === "Ocultar confirmación") ? "Mostrar confirmación" : "Ocultar confirmación";
    }

    boton.addEventListener("click", mostrarConfirmacion);
}