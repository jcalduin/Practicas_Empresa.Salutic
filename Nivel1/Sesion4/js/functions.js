function procesaDatos() { //Funcion procesaDatos igual que en la sesion3
    var locked = document.getElementById("checkLock");

    if (locked.checked)
        alert("El formulario esta bloqueado");
    else {

        var datos = {
            email: document.getElementById("inputEmail").value,
            password: document.getElementById("inputPassword").value,
            address: document.getElementById("inputAddress").value,
            address2: document.getElementById("inputAddress2").value,
            city: document.getElementById("inputCity").value,
            zip: document.getElementById("inputZip").value
        }

        $.ajax({
            type: "POST",
            url: "controller.php",
            data: datos,
            dataType: "json",
            success: function(response) {
                console.log(response.data);
                document.getElementById("password_encriptada").textContent = response.data.passwordEncriptada;
                document.getElementById("direccion_completa").textContent = response.data.direccionCompleta;
                document.getElementById("zip_formateada").textContent = response.data.zipFormateado;
            }
        })
    }
}

//**********
// Setup DOM
function init(){ // funcion init, se inicializa con los valores de data en el momento que refresca la página. Abajo se llamas directamente a la funcion: "init();"
    var data = { // creo un objeto data, los cuales seran los valores por defecto en los inputs.
        email: 'some@email.com',
        password: 'secure pass',
        adress: '111 Main St.',
        adress2: 'pt. 2-3 A',
        City: 'new york',
        Zip: [20101 , 23019 , 20931 , 34012 , 10234 , 12041 , 13443] //esto es una rray
    }
    //asgino los valores a los inputs
    document.getElementById("inputEmail").value = data.email;
    document.getElementById("inputPassword").value = data.password;
    document.getElementById("inputAddress").value = data.adress;
    document.getElementById("inputAddress2").value = data.adress2;
    document.getElementById("inputCity").value = data.City;


    zip = document.getElementById("inputZip");// creo una variable zip que es igual al elemento con id inputZip
    
    /*var indice = Math.ceil(Math.random() * data.Zip.length-1); //creo una varaible indice que me da un valor aleatorio entre 0 y la longitud del array Zip-1
    
    var option = document.createElement("option"); //creo un elemento option
    option.value = data.Zip[indice]; //le asigno el valor del array Zip en la posicion indice
    option.textContent = data.Zip[indice]; //le asigno el valor del array Zip en la posicion indice
    zip.appendChild(option); //agrego el elemento option al elemento zip
    */

    data.Zip.forEach(function(el){ //aqui se recorre el array Zip. Por cada el en el array Zip se ejecuta la funcion
        var option = document.createElement("option"); //creo un elemento option
        option.value = el; //le asigno el valor del array Zip en la posicion indice
        option.textContent = el; //le asigno el valor del array Zip en la posicion indice
        zip.appendChild(option); //agrego el elemento option al elemento zip
    });
    
}
init(); // aqui es cuando la funcion init se ejecuta cuando carga la pagina
