function init() {
   // setupEventListeners();
    loadUsers();
}

/*function setupEventListeners(){
    // Establecer los eventos de nuestro boton Registrar usuario para que llame a la funcion
    // registerUser , que se encargara de hacer la peticion ajax para insertar un nuevo registro
}*/

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
   
    data = {serviceType: 'register_user', data: entradaDatos};
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
    html += '<th scope="col">Editar</th>';
    html += '<th scope="col">Borrar</th>';
    html += '</tr></thead>';
    html += '<tbody>';
    
    for (let key in resultSet) {
        let row = resultSet[key];
        html += '<tr>';
        html += `<td>${row.IDUser}</td>`;
        html += `<td>${row.nick}</td>`;
        html += `<td>${row.phoneNumber}</td>`;
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


