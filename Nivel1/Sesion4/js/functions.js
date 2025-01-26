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
    
    document.getElementById("inputEmail").value = data.email;
    document.getElementById("inputPassword").value = data.password;
    document.getElementById("inputAddress").value = data.adress;
    document.getElementById("inputAddress2").value = data.adress2;
    document.getElementById("inputCity").value = data.City;

    
    var indice = Math.ceil(Math.random() * data.Zip.length-1);
    
    zip = document.getElementById("inputZip");
    var option = document.createElement("option");
    option.value = data.Zip[indice];
    option.textContent = data.Zip[indice];
    zip.appendChild(option);

   
    // Iniciar los elementos HTML.
    // ---------------------------
    // Asignar a cada input su correspondiente valor.
    // Example : document.getElementById......value = data.email 



    // Asignar al select de ZIP sus valores apoyandonos en data.zip
    //data.Zip.forEach(function(el){
        // Aqui construimos las cadenas <option value=""></option> que insertaremos en el select ZIP
        // Pista , haz en este bucle => console.log(el) para ver que sale por consola y tomar una idea de que hacer.

       
}
init();