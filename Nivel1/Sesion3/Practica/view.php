l<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practica AJAX</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</head>
<body>
    
    <div class="card">
        <div class="card-header">
        <h5 class="card-title font-weight-bold">Sesión 03 - Practica AJAX - JSON - Tiempo estimado 7h</h5>
        </div>

        <div class="card-body">
            <p class="card-text">
                Antes de comenzar con esta práctica estudiar el ejemplo mostrado en la carpeta Examples.<br>

                El objetivo de la practica es completar el formulario situado debajo creando 4 elementos<br>
                3 input-text y 1 select. Con los datos que introduzcamos en estos campos haremos lo siguiente:<br><br>

                1º- Completar la función procesaDatos de functions.js para recoger estos datos<br>
                2º- Crear la peticion AJAX tal y como hemos visto mandado los datos en formato JSON a controller.php<br>
                3º- En controller.php procesar estos datos de la siguiente manera<br><br>
                    3.1 Concatenaremos Nombre y Apellido<br>
                    3.2 Pasaremos la cadena que nos llegue del input direccion a minusculas<br>
                    3.3 Calcularemos el año de nacimiento con la edad que nos viene del select<br><br>

                4º Devolveremos desde controller.php estos datos creando una variable $response tal y como vimos en la formacion<br>
                5º Por ultimo en el metodo success de la peticion ajax en procesaDatos() usaremos esos datos para rellenar la parte de Datos Procesados             
            </p>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <h5 class="card-title font-weight-bold">Formulario</h5>
                        <p class="card-text">
                            <hr>
                            <form>
                                <form>
                                <label for ="nombre">Nombre</label>
                                <input type="text" class="form-control" id="id_nombre" name="nombre">
                                
                                <label for="apellidos">Apellidos</label>
                                <input tyoe="text" class="form-control" id="id_apellido" name="apellidos">

                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="id_direccion" name="direccion">

                                <label for="edad">Edad</label>
                                <select class="custom-select" id="id_edad" name="edad">
                                    <?php
                                        for ($i = 18; $i <= 90  ; $i++)  
                                            echo "<option value ='$i'>$i</option>"; 
                                    ?>
                               
                                </select>
                                </form>
                                <hr>
                                <!-- La funcion procesaDatos es una función previamente creada en el archivo functions de la carpeta js. onclick llama a la funcion que se dispara en el momento que se pulsa sobre este -->
                                <input type="button" class="btn btn-primary" onclick="procesaDatos()" value="Enviar Datos" >
                            </form>
                            <hr>                
                        </p>
                </div>

                <div class="col-md-7">
                    <h5 class="card-title font-weight-bold">Datos Procesados</h5>

                    <div class="alert alert-secondary" role="alert">
                        Nombre Completo : 
                        <span id="nombre_completo"></span>
                    </div>

                    <div class="alert alert-secondary" role="alert">
                        Direccion lowerCase :
                        <span id="direccion_lwcase"></span>
                    </div>

                    <div class="alert alert-secondary" role="alert">
                        Año nacimiento :
                        <span id="birthday"></span>
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
