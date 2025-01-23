function mandarDatosJS(){
    
    var datos = {
        nombre: document.getElementById('id_nombre').value,
        email: document.getElementById('id_email').value,
        direccion: document.getElementById('id_direccion').value,
        edad: document.getElementById('id_edad').value
    };
        
    $.ajax({
        type: 'POST',
        url: 'controller.php',
        data: datos,
        dataType: 'json',
        success: function (response) {
            document.getElementById('id_nombre').value = response.data[2];
        }
    });
       
}

function mandarDatosJQuery(){
    
    var datos = {
        nombre: $('#id_nombre').val(),
        email: $('#id_email').val(),
        direccion: $('#id_direccion').val(),
        edad: $('#id_edad').val()
    };
    
    
    $.ajax({
        type: 'POST',
        url: 'controller.php',
        data: datos,
        dataType: 'json'
    }).done(function (r){
        console.log(r);
    }).fail(function(){
        alert('todo ha ido mal');
    });  
}

function cambioValor(valor){
    var mensaje = "El nuevo valor es " + valor;
    //let mensaje = `El nuevo valor es ${valor}`;
    
    //console.warning(mensaje);
    //console.error(mensaje);
    //console.log(mensaje);
    //console.info(mensaje);
}

// *******************
// DOM Manipulation

function cambioPropiedad(propiedad) {    
    switch(parseInt(propiedad)){
        case 0:
            location.reload();
        case 1:
            //document.getElementById('mensaje_con_id').innerHTML = 'Mensaje ID Cambiado';
            document.getElementById('mensaje_con_id').textContent = 'Mensaje ID Cambiado';
            break;
        case 2:
            document.getElementById('txt_field').value = 'Text field cambiado';
            break;
        case 3:
            document.getElementById('txt_field_color').style.color = 'red';
            break;
    }
    
}
