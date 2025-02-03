function init() {
    loadUsers();
}

function setupEventListenersResults(){
    
    $(".view-button").on('click',function() {
        var id = $(this).closest('tr').data('id');
        loadUser(id);
    });

    $(".edit-button").on('click',function() {
        var id = $(this).closest('tr').data('id');
        editUser(id);
    });

    $(".delete-button").on('click',function() {
        var id = $(this).closest('tr').data('id');

        swal({
            title: 'Desea continuar?',
            text: `Se va borrar el registro con ID: ${id}`,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrarlo',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            if (result.value) {
              swal(
                'Peticion AJAX',
                'Lanzamos peticion AJAX de borrado',
                'success'
              )
            }
          })
               
    });
       
}

var entradaDatos = {
    inputNick: "nick",
    inputEmail: "email",
    inputPassword: "password",
    inputName: "nombre",
    inputAddress: "direccion",
    inputPhoneNumber: "phone",
    inputDNI: "dni"
};

function editUser(id) {
    // Aqui crearemos la peticion ajax para listar los usuarios que tengamos en la tabla de la bd
   
    var data = {
        serviceType: 'load_user',
        id: id
    };
    
    $.ajax({
        type: 'POST',
        url: 'controllers/UsersController.php',
        data: data,
        dataType: 'json',
        success: function (r) {
            $('#modalEdit').modal();
            renderTableEditUser(r);
        }
    });

   
    $("#btn-safe").on('click',function() {
        var data = {
            serviceType: 'safe_user',
            id : document.getElementById("editID").textContent,
            editName: document.getElementById("editName").value,
            editEmail: document.getElementById("editEmail").value,
            editAddress: document.getElementById("editAddress").value,
            editPhone: document.getElementById("editPhone").value
        }

        

        $.ajax({
            type: 'POST',
            url: 'controllers/UsersController.php',
            data: data,
            dataType: 'json',
            success: function (r){
                swal({
                    text: r.message,
                    icon : "info",
                    button: "Ok"
                });
                if (r.success){
                    $('#modalEdit').modal();
                    renderTableEditUser(r);
                } else {
                    swal({
                        text: r.message,
                        icon : "error",
                        button: "Ok"
                    });
                }
            }
        })
    });
}

function loadUsers() {
    // Aqui crearemos la peticion ajax para listar los usuarios que tengamos en la tabla de la bd
    var data = {
        serviceType: 'load_users'
    };
    
    $.ajax({
        type: 'POST',
        url: 'controllers/UsersController.php',
        data: data,
        dataType: 'json',
        success: function (r) {
            renderTableUsers(r);
            setupEventListenersResults();
        }
    });
}

function loadUser(id) {
    // Aqui crearemos la peticion ajax para listar los usuarios que tengamos en la tabla de la bd
   
    var data = {
        serviceType: 'load_user',
        id: id
    };
    
    $.ajax({
        type: 'POST',
        url: 'controllers/UsersController.php',
        data: data,
        dataType: 'json',
        success: function (r) {
            $('#modalView').modal();
            renderTableUser(r);
        }
    });
}

function registerUser() {

    entradaDatos.nick = document.getElementById('inputNick').value;
    entradaDatos.email = document.getElementById('inputEmail').value;
    entradaDatos.password = document.getElementById('inputPassword').value;
    entradaDatos.nombre = document.getElementById('inputName').value;
    entradaDatos.direccion = document.getElementById('inputAddress').value;
    entradaDatos.phone = document.getElementById('inputPhoneNumber').value;
    entradaDatos.dni = document.getElementById('inputDNI').value;
   
    data = {serviceType: 'register_user', nick: entradaDatos.nick, email: entradaDatos.email, password: entradaDatos.password, nombre: entradaDatos.nombre, direccion: entradaDatos.direccion, phone: entradaDatos.phone, dni: entradaDatos.dni};
    if (entradaDatos.nick == "" || entradaDatos.email == "" || entradaDatos.password == "" || entradaDatos.nombre == "" || entradaDatos.direccion == "" || entradaDatos.phone == "" || entradaDatos.dni == "") {
        swal ( {
            text: "Por favor, rellene todos los campos.",
            icon: "error",
            button: "Ok"
        });
        return false;
    }
    
    $.ajax({
        type: "POST",
        url: "controllers/UsersController.php",
        data: data,
        dataType: "json",
        success: function (response){
            swal({
                text: response.message,
                icon : "info",
                button: "Ok"
            });
            if (response.success){
                cleanInputs();
                loadUsers();
            } else {
                swal({
                    text: response.message,
                    icon : "error",
                    button: "Ok"
                });
            }
        }
    })
    
}

function cleanInputs() {
    document.getElementById('inputNick').value = "";
    document.getElementById("inputEmail").value = "";
    document.getElementById("inputPassword").value = "";
    document.getElementById("inputName").value = "";
    document.getElementById("inputAddress").value = "";
    document.getElementById("inputPhoneNumber").value = "";
    document.getElementById("inputDNI").value = "";
}


function renderTableUsers(resultSet){
    // Esta funcion sera llamada siempre que queramos pintar la tabla con los resultados
    // de la consulta a la BD de la tabla users. Recibe como parametro el JSON que nos 
    // devuelve la peticion AJAX.

    let html = '<table class="table table-striped mg-top-4">';
    html += '<thead><tr>';
    html += '<th scope="col">Id</th>';
    html += '<th scope="col">Nick</th>';
    html += '<th scope="col">Phone Numb.</th>';
    html += '<th scope="col">Ver</th>';
    html += '<th scope="col">Editar</th>';
    html += '<th scope="col">Borrar</th>';
    html += '</tr></thead>';
    html += '<tbody>';
    
    for (let key in resultSet) {
        let row = resultSet[key];
        html += '<tr data-id="' + row.IDUser + '">'; // Aqui guardamos el ID del usuario en el atributo data-id del tr
        html += `<td>${row.IDUser}</td>`;
        html += `<td>${row.nick}</td>`;
        html += `<td>${row.phoneNumber}</td>`;
        html += `<td><i class="fa fa-eye view-color clickable view-button"></i></td>`;
        html += `<td><i class="fa fa-edit edit-color clickable edit-button"></i></td>`;
        html += `<td><i class="fa fa-trash-alt delete-color clickable delete-button"></i></td>`;
        html += '</tr>';
    }
    
    html += '</tbody></table>';  

    // Recordar que el id render-table-users corresponde al div dentro del cual vamos a 
    // insertar el html que generemos en esta funcion.
    document.querySelector('#render-table-users').innerHTML = html;
}

function renderTableUser(r) {
    let row = r[0];

    let html = '<table class="table table-striped mg-top-4">';
    html += '<thead><tr>';
    html += '<th scope="col">Id</th>';
    html += '<th scope="col">Nombre</th>';
    html += '<th scope="col">Nick</th>';
    html += '<th scope="col">Email</th>';
    html += '<th scope="col">Direccion</th>';
    html += '<th scope="col">Phone Numb.</th>';
    html += '<th scope="col">DNI</th>';
    html += '</tr></thead>';
    html += '<tbody>';

    html += '<tr>';
    html += `<td>${row.IDUser}</td>`;
    html += `<td>${row.name}</td>`;
    html += `<td>${row.nick}</td>`;
    html += `<td>${row.email}</td>`;
    html += `<td>${row.address}</td>`;
    html += `<td>${row.phoneNumber}</td>`;
    html += `<td>${row.dni}</td>`;
    html += '</tr>';

    html += '</tbody></table>'; 
    document.querySelector('#contenidoModalView').innerHTML = html;
}

function renderTableEditUser(r) {
    let row = r[0];

    let html = '<table class="table table-striped mg-top-4">';
    html += '<thead><tr>';
    html += '<th scope="col">Id</th>';
    html += '<th scope="col">Nombre</th>';
    html += '<th scope="col">Email</th>';
    html += '<th scope="col">Direccion</th>';
    html += '<th scope="col">Phone Numb.</th>';
    html += '</tr></thead>';
    html += '<tbody>';

    html += '<tr>';
    html += `<td id="editID">${row.IDUser}</td>`;
    html += `<td><input id="editName" type="text" value="${row.name}" class="form-control"></td>`;
    html += `<td><input id="editEmail" type="text" value="${row.email}" class="form-control"></td>`;
    html += `<td><input id="editAddress" type="text" value="${row.address}" class="form-control"></td>`;
    html += `<td><input id="editPhone" type="text" value="${row.phoneNumber}" class="form-control"></td>`;
    html += '</tr>';


    html += '</tbody></table>';
    document.querySelector('#contenidoModalEdit').innerHTML = html; 
}

init();
