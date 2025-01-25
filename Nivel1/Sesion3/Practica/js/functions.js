function procesaDatos(){
    
    var datos = {
        nombre: document.getElementById("id_nombre").value,
        apellido: document.getElementById("id_apellido").value,
        direccion: document.getElementById("id_direccion").value,
        edad: document.getElementById("id_edad").value,
    };

    $.ajax({
        type: "POST",
        url: "controller.php",
        data: datos,
        dataType: "json",
        success: function (response) {
            console.log(response.data);
            document.getElementById("nombre_completo").textContent = response.data.nombreCompleto;
            document.getElementById("direccion_lwcase").textContent = response.data.direccion;
            document.getElementById("birthday").textContent = response.data.edad;
        }
    });
    
}