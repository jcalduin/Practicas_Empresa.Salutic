//*************
// AJAX request
function procesaDatos() {



}



//**********
// Setup DOM
function init(){
    var data = {
        email: 'some@email.com',
        password: 'secure pass',
        adress: '111 Main St.',
        adress2: 'pt. 2-3 A',
        City: 'new york',
        Zip: [20101 , 23019 , 20931 , 34012 , 10234 , 12041 , 13443]
    }
    
    // Iniciar los elementos HTML.
    // ---------------------------
    // Asignar a cada input su correspondiente valor.
    // Example : document.getElementById......value = data.email 



    // Asignar al select de ZIP sus valores apoyandonos en data.zip
    data.Zip.forEach(function(el){
        // Aqui construimos las cadenas <option value=""></option> que insertaremos en el select ZIP
        // Pista , haz en este bucle => console.log(el) para ver que sale por consola y tomar una idea de que hacer.
    });
       
}

init();