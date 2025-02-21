$( document ).ready(function() {

    if ($('#sel_insert_categoria').length) cargarSelector();//se verifica si hay un elemento con el id correspondiente en el documento
    //Si lo hay, llama a la funcion cargar selector

    loadEditProducts()
        
        // Este archivo js se carga al abrir las paginas products.edit.content.php y products.register.content.php
        // Tened en cuenta esto para llamar a las funciones necesarias al mostrar esas vistas.
        // En este caso arriba ya estamos llamando a cargarSelector , si queremos por ejemplo establecer los eventos para
        // nuestro boton de registrar podriamos hacer algo asi if ($('#ID_DE_NUESTRO_BOTON').length) ESTABLECER EVENTO;
})


function cargarSelector() { //funcion para cargar el selector en la vista de registrar producto

    $.ajax({ //peticion ajax a la tabla categorias para mostrar las distintas categorias que tenemos
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: { serviceType: 'get_category_data' },
        dataType: 'json',
        success: function (r) {
            renderizarSelector(r);
        }
    });
}

function renderizarSelector(resultSet) { //aqui se renderiza el selector
    let html = '<option value="">Seleccione una categoría</option>';
    
    for (let key in resultSet) {
        let row = resultSet[key];
        html += `<option value="${row.IDCategory}">${row.description}</option>`; 
    }

    if ($('#sel_insert_categoria').length) //si existe un elemtno con el id seleccionado rn la pagina reemplazara su contenido por la variable html
        document.querySelector('#sel_insert_categoria').innerHTML = html;
}

function registerProduct() { //funcion para registrar nuevos productos en la tabla

    var datos = { //se cogen los values que queremos registrar 
        serviceType : 'register_product',
        nombre :  document.getElementById("txt_insert_nombre").value,
        categoria : document.getElementById("sel_insert_categoria").value,
        descripcion : document.getElementById("txt_insert_descripcion").value,
        precio : document.getElementById("txt_insert_precio").value,
        stock : document.getElementById("txt_insert_stock").value
    }

    if (datos.nombre == "" || datos.categoria == "" || datos.precio == "" || datos.stock == "") { //comprobación para que ningun campo necesario quede vacío
        Swal.fire({
            text: "Por favor rellene todos los campos marcados con *" ,
            icon: "error" ,
            confirmButtonText: "OK"
        });
        return false
    }

    $.ajax({     
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: datos,
        dataType: 'json',
        success: function (response) {
            if (response.success){
                Swal.fire({
                    text: response.message,
                    icon: "info",
                    confirmButtonText: "OK"
                });
                cleanInputs(); //si la respuesta tiene exito muestra un mensaje y vacia los campos de los distintos inputs
            } else {
                Swal.fire({
                    text: response.message,
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        }
    })
}

function cleanInputs() { //funcion para limpiar los inputs del form
    document.getElementById("txt_insert_nombre").value = "";
    document.getElementById("sel_insert_categoria").value = cargarSelector();
    document.getElementById("txt_insert_descripcion").value = "";
    document.getElementById("txt_insert_precio").value = "";
    document.getElementById("txt_insert_stock").value = "";
}

function loadEditProducts() { //funcion para listar los distintos productos dentro de la vista editar productos
    var data = {
        serviceType : 'load_products'
    };


    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (response) {
            renderTableEditProducts(response);
            setupEventListenersResults();
        }
    })
}

function renderTableEditProducts(resultSet) { // funcion para pintar la lista correspondiente en la vista editar productos
    
    let html = '<table class="table table-striped mg-top-4">';
    html += '<thead><tr>';
    html += '<th scope="col">Nombre</th>';
    html += '<th scope="col">Descripción</th>';
    html += '<th scope="col">Precio</th>';
    html += '<th scope="col">Stock</th>';
    html += '<th scope="col">Editar</th>';
    html += '<th scope="col">Borrar</th>';
    html += '</tr></thead>';
    html += '<tbody>';

    for (let key in resultSet) {
        let row = resultSet[key];

        html += '<tr data-id="' + row.IDProduct + '">';
        html += `<td>${row.name}</td>`;
        html += `<td>${row.description}</td>`;
        html += `<td>${row.price}</td>`;
        html += `<td>${row.stock}</td>`;
        html += `<td><i class="fa fa-edit fa-lg edit-color clickable edit-button"></i></td>`;
        html += `<td><i class="fa fa-trash fa-lg delete-color clickable delete-button"></i></td>`;
        html += '</tr>';

       
    }
    html += '</tbody></table>';  
    
    
   
    document.querySelector('#renderTable-edit-products').innerHTML = html;
}

function setupEventListenersResults() {  //funcion que llama a los distintos botones ("borrar y editar") para que al hacer click sobre ellos
                                        // se ejecute la funcion que corresponda

    $(".edit-button").on('click',function() { //peticion la cual indica que si se clicka sobre el elmento con el id="edit-button" realiza lo siguiente
        var id = $(this).closest('tr').data('id'); //obtiene el tr dentro del tbody en la tabla mas cercano
        editProducts(id); //llama a la funcion
    })

    $(".delete-button").on('click',function() {
        var id = $(this).closest('tr').data('id'); //obtiene el tr dentro del tbody en la tabla mas cercano

        Swal.fire({ //se crea una alerta que al pinchar nos muestra una opcion SWAL para borrar o no el usuario
            title: 'Desea continuar?',
            text: `Se va borrar el registro con ID: ${id}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrarlo',
            cancelButtonText: 'Cancelar'
        }).then(function (result) { //si se pulsa sobre ok se ejecuta la funcion deleteproduct
            if (result.value) {
                deleteProduct(id);
            }
          })       
    });
}

function editProducts(id) { //funcion para generar un modal que se desppliega y pinta los valores correspondientes dentro de este

    var data = {
        serviceType: 'load_product',
        id: id
    }

    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (r) {
            $('#modalEdit').modal();
            renderTableEditProduct(r);
        }
    });
}

function safeEdit(){ //funcion que se llama una vez que se pincha en el boton del modal y guarda los datos modificados

    var data = {
        serviceType: 'safe_product',
        editIDProduct :document.getElementById("editID").textContent,
        editName : document.getElementById("editName").value,
        editDescription : document.getElementById("editDescription").value,
        editPrice : document.getElementById("editPrice").value,
        editStock : document.getElementById("editStock").value
    }
    
    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function(r) {
            if (r.success) {
                Swal.fire({
                    text: r.message,
                    icon: "info",
                    confirmButtonText: "OK"
                });
                loadEditProducts();
                $('#modalEdit').modal('hide');
            } else {
                Swal.fire({
                    text: r.message,
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        }
    })
}

function renderTableEditProduct(resultSet){  //pinta la tabla dentro del modal
    let row = resultSet[0];

    let html = '<table class="table table-striped mg-top-4">';
    html += '<thead><tr>';
    html += '<th scope="col">Nombre</th>';
    html += '<th scope="col">Descripción</th>';
    html += '<th scope="col">Precio</th>';
    html += '<th scope="col">Stock</th>';
    html += '</tr></thead>';
    html += '<tbody>';

    html += '<tr>';
    html += `<td id="editID" class="hidden">${row.IDProduct}</td>`;
    html += `<td><input id="editName" type="text" value="${row.name}" class="form-control"></td>`;
    html += `<td><input id="editDescription" type="text" value="${row.description}" class="form-control"></td>`;
    html += `<td><input id="editPrice" type="text" value="${row.price}" class="form-control"></td>`;
    html += `<td><input id="editStock" type="text" value="${row.stock}" class="form-control"></td>`;
    html += '</tr>';

    html += '</tbody></table>';

    document.querySelector('#contenidoModalEdit').innerHTML = html; 
}

function deleteProduct(id) { //funcion que se ejecuta para eliminar el producto con el id determinado
    data = {
        serviceType : 'delete_product',
        id: id
    }

    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (r) {
            if (r.success) {
                Swal.fire({
                    text: r.message,
                    icon: "success",
                    confirmButtonText: "OK"
                });
                loadEditProducts();
            } else  {
                Swal.fire({
                    text: r.message,
                    icon: "warning",
                    confirmButtonText: "OK"
                });
            }
            
        }
    });
}