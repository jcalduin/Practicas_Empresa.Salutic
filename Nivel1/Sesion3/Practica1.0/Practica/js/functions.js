function procesaDatos(){

        var datos = {
            nombre: document.getElementById('nombre').value,
            apellidos: document.getElementById('apellidos').value,
            direccion: document.getElementById('direccion').value,
            edad: document.getElementById('edad').value
        };
            
        $.ajax({
            type: 'POST',
            url: 'controller.php',
            data: datos,
            dataType: 'json',
            success: function (response) {
                console.log(response.data);
                document.getElementById('nombre_completo').textContent = response.data.completo;
                document.getElementById('direccion_lwcase').textContent = response.data.direccion;
                document.getElementById('birthday').textContent = response.data.nacimiento;
            }
        });
        
    }
    
        // En el metodo success con los datos que nos devuelva controller.php deberemos
    // pintarlos en los 3 span de la parte de Datos Procesados en view.php