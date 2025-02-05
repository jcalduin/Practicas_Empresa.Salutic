$( document ).ready(function() {
    swal({
            text: 'Sección para el resto de operaciones de BD , editar , borrar , insertar nuevo producto...',
            type: 'info',
            confirmButtonText: 'Ok'
        });
        
        if ($('#sel_insert_categoria').length) cargarSelector();
        
        // Este archivo js se carga al abrir las paginas products.edit.content.php y products.register.content.php
        // Tened en cuenta esto para llamar a las funciones necesarias al mostrar esas vistas.
        // En este caso arriba ya estamos llamando a cargarSelector , si queremos por ejemplo establecer los eventos para
        // nuestro boton de registrar podriamos hacer algo asi if ($('#ID_DE_NUESTRO_BOTON').length) ESTABLECER EVENTO;
});


function cargarSelector() {
    // Aqui lanzamos una peticion AJAX que se traiga los datos de la tabla categoria
    /*
    $.ajax({
        type: 'POST',
        url: 'AQUI PONER EL CONTROLADOR PRODUCTS CONTROLLER',
        data: { serviceType: 'get_category_data' },
        dataType: 'json',
        success: function (r) {
            renderizarSelector(r);
        }
    });*/

}

function renderizarSelector(resultSet) {
    let html = '';
    /*
    for (let key in resultSet) {
        let row = resultSet[key];
        html += `<option id="${row.IDProducto}">${row.Descripcion}</option>`;
    }*/
       
    if ($('#sel_insert_categoria').length) document.querySelector('#sel_insert_categoria').innerHTML = html;

    
}


