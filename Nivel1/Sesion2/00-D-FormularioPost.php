<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Examples</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="card">
        <div class="card-header">
        <h5 class="card-title font-weight-bold">Formulario POST</h5>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Petición POST</h5>

            <p class="card-text">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <label for="nombre">Nombre</label>
                    <!-- COMPLETAR AQUI -->
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                    <hr>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </form>
                <hr>
                <div class="alert alert-secondary" role="alert">
                    Tu nombre es: <?php //COMPLETAR AQUI ?><br>
                </div>
                <div class="alert alert-secondary" role="alert">
                    Tu email es: <?php //COMPLETAR AQUI ?>
                </div>
                
            </p>

        </div>


      </div>

</body>
</html>