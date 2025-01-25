function procesaDatos(){
    
    //creo un objeto llamado datos el cual contiene los valores de los campos del formulario obtenidos por su id
    var datos = {
        nombre: document.getElementById("id_nombre").value,
        apellido: document.getElementById("id_apellido").value,
        direccion: document.getElementById("id_direccion").value,
        edad: document.getElementById("id_edad").value,
    };

    //envio los datos al controlador mediante $.ajax que es un funcionalidad de jQuery 
    $.ajax({
        type: "POST", //selecciono el metodo de envio
        url: "controller.php", //selecciono el archivo al cual se enviaran los datos
        data: datos, //se envian los datos
        dataType: "json", //indico que el tipo de dato que se espera recibir es en formato json
        success: function (response) { //success es una funcion de jQuery que se ejecuta si la peticion fue exitosa en este caso recibe la respuesta del controlador
            console.log(response.data); //muestro en consola la respuesta del controlador
            document.getElementById("nombre_completo").textContent = response.data.nombreCompleto; //modifico el contenido del elemento con id nombre_completo con el valor de la respuesta del controlador
            document.getElementById("direccion_lwcase").textContent = response.data.direccion; //lo mismo que el anterior pero con el id direccion_lwcase
            document.getElementById("birthday").textContent = response.data.edad; //lo mismo que el anterior pero con el id birthday
        }
    });
    
}