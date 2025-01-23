<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX Examples</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</head>
<body>
    
    <div class="card">
        <div class="card-header">
        <h5 class="card-title font-weight-bold">Ejemplo Peticion Ajax</h5>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Formulario</h5>
            <div class="row">
                <div class="col-md-5">
                    <p class="card-text">
                        <form>
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="id_nombre" name="nombre" value="">

                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="id_email" name="email" value="">

                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="id_direccion" name="direccion" value="">

                            <label for="edad">Edad</label>
                            <select class="custom-select" id="id_edad" onchange="cambioValor(this.value)">
                                <?php 
                                    for($i = 1 ; $i <= 80 ; $i++)
                                        echo "<option value ='$i'>$i</option> ";
                                ?>
                            </select>
                            
                            <hr>
                            
                            <input type="button" class="btn btn-primary" onclick="mandarDatosJS()" value="Enviar" >
                        </form>
                        <hr>                
                    </p>
                </div>
            </div>  
        </div>


      </div>

</body>

<!-- FOOTER , links a JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/funciones.js" type="text/javascript"></script>

</html>
