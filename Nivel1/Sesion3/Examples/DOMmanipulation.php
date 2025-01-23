<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JS Examples</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</head>
<body>
    
    <div class="card">
        <div class="card-header">
        <h5 class="card-title font-weight-bold">Ejemplo DOM</h5>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold"></h5>
            <div class="row">
                
                <div class="col-md-5">
                    <p class="card-text">
                        <select class="custom-select" id="id_edad" onchange="cambioPropiedad(this.value)">
                            <option value="0" selected>---</option>
                            <option value="1">Cambiar Mensaje ID</option>
                            <option value="2">Cambiar texfield</option>
                            <option value="3">Cambiar color texfield</option>
                        </select>               
                    </p>
                </div>
                
                <div class="col-md-7">
                    <div class="alert alert-secondary" role="alert" id="mensaje_con_id"></div>  
                    <input type="text" id="txt_field" value="cadena de texto original" readonly><br><br>
                    <input type="text" id="txt_field_color" value="cambio color" readonly>
                </div>
                
            </div>  
        </div>


      </div>

</body>

<!-- FOOTER , links a JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/funciones.js" type="text/javascript"></script>

</html>

