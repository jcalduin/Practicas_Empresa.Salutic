function init() {
    loadUsers();
}

function setupEventListenersResults(){
    
    $(".view-button").on('click',function() {
        console.log("askdjsha")  
        var id = $(this).closest('tr').data('id');
        alert(`El Id de esta fila es ${id} , tenemos que abrir modal para VER datos`); 
            //aqui abrir modal
    });

    $(".edit-button").on('click',function() {
        var id = $(this).closest('tr').data('id');
        alert(`El Id de esta fila es ${id} , tenemos que abrir modal para EDITAR datos`);
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
        html += `<td>..Proximamente..</td>`;
        html += `<td>..Proximamente..</td>`;
        html += '</tr>';
    }
    
    html += '</tbody></table>';  

    // Recordar que el id render-table-users corresponde al div dentro del cual vamos a 
    // insertar el html que generemos en esta funcion.
    document.querySelector('#render-table-users').innerHTML = html;
}


init();


