<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practica AJAX 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</head>
<body>
    
    <div class="card">
        <div class="card-header">
        <h5 class="card-title font-weight-bold">Sesión 04 - Practica AJAX - JSON - v2 - Tiempo estimado 8h</h5>
        </div>

        <div class="card-body">
            <p class="card-text">
                1º.- Cargar los valores de los inputs y el select Zip completando la funcion init() de functions.js
                ,esta función se llama automaticamente al cargar la pagina.<br>
                2º.- Al pulsar el botón Enviar Datos deberemos comprobar en la función procesarDatos() si está marcado
                el checkbox Locked , si lo estuviese mostramos un alert avisando de que está bloqueado el formulario y no se hace nada más.<br>
                3º.- En caso contrario si no está marcado el checkbox , crearemos una petición ajax que mande el contenido del formulario
                    inputs + el valor que tengamos en el select a controller.php haciendo una peticion ajax por post.<br>
                4º.- Con los datos que nos llegan a controller.php haremos varias operaciones <br>
                    4a) Password encriptada = el string password solo que cada uno de sus caracteres sustiuidos por *, ejemplo si la password es oculto mostraremos ******<br>
                    4b) Direccion completa = Concatenar Address + Address2<br>
                    4c) City + Zip formateada = New York [nº] , es decir si tenemos new york 20931 nos aparecerá New York [20931]<br>
                5º.- Estos datos procesados los devolveremos al js de nuevo y en el success de la peticion ajax los pintaremos en la parte de Datos procesados como en la practica anterior
            </p>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <h5 class="card-title font-weight-bold">Formulario</h5>
                        <p class="card-text">
                            <hr>
                            <form>

                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputEmail">Email</label>
                                        <input type="text" class="form-control" id="inputEmail" readonly value="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputPassword">Password</label>
                                        <input type="text" class="form-control" id="inputPassword" readonly value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" readonly value="">
                                </div>

                                <div class="form-group">
                                    <label for="inputAddress2">Address 2</label>
                                    <input type="text" class="form-control" id="inputAddress2" readonly value="">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputCity">City</label>
                                        <input type="text" class="form-control" id="inputCity" readonly value="">
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="inputZip">Zip</label>
                                        <select id="inputZip" class="form-control">
                                    
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkLock" checked="checked">
                                        <label class="form-check-label" for="checkLock">
                                            Locked
                                        </label>
                                    </div>
                                </div>

                                <input type="button" class="btn btn-primary" value="Enviar Datos" onclick="procesaDatos()">
                            </form>
                            <hr>                
                        </p>
                </div>

                <div class="col-md-7">
                    <h5 class="card-title font-weight-bold">Datos Procesados</h5>

                    <div class="alert alert-secondary" role="alert">
                        Password encriptada : 
                        <span id="password_encriptada"></span>
                    </div>

                    <div class="alert alert-secondary" role="alert">
                        Direccion completa :
                        <span id="direccion_completa"></span>
                    </div>

                    <div class="alert alert-secondary" role="alert">
                        City + Zip formateada :
                        <span id="zip_formateada"></span>
                    </div>
                </div>
            </div>  
        </div>


      </div>

</body>

<!-- FOOTER , links a JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/functions.js" type="text/javascript"></script>

</html>
