<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Syntax - Prácticas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="card">
        <div class="card-header">
        <h5 class="card-title font-weight-bold">Sesión 02 - Estructuras de control PHP - Tiempo estimado 7h</h5>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #1 - Sentencia Switch</h5>
            <p class="card-text">
                Generar un valor aleatorio entre 1 y 5. Luego imprimir en pantalla el string correspondiente a ese número.<br>
                Por ejemplo si nos devuelve un 2 , debemos imprimir "dos"<br>
            
            </p>
            <hr>
            <p class="card-text">
                <?php 
                    $aleatorio = rand(1,5);
                    switch($aleatorio) {
                        case 1 : echo "uno";
                        break;
                        case 2 : echo "dos";
                        break;
                        case 3 : echo "tres";
                        break;
                        case 4 : echo "cuatro";
                        break;
                        default : echo "cinco";
                    }
                    
                ?>           
            </p>
            <hr>

        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #2 - Estructuras iterativas (1)</h5>
            <p class="card-text">
                Declara un array con 10 valores numericos distintos , muestra el mayor de ellos en pantalla usando un bucle for<br>
                Intenta lograrlo también sin usar un bucle , directamente con métodos de arrays<br>

                <br><a href="http://php.net/manual/es/ref.array.php">php.net/manual/es/ref.array.php</a>
            </p>

            <hr>
            <p class="card-text">
                <?php 
                   $numeros = [20,30,68,12,-4,101,73,55,98,19];
                   $mayor = $numeros[0];
                   foreach($numeros as $numero) {
                    if ($numero > $mayor) {
                        $mayor = $numero;
                    }
                   }
                   echo "El número mayor usando bucle es: $mayor <br>";
                   $mayor = max($numeros);
                   echo "El número mayor usando un método es: $mayor"
                ?> 
            
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #3 - Estructuras iterativas (2)</h5>
            <p class="card-text">
                Usando un bucle for realiza la suma de todos los números enteros pares que hay entre 1 y 1000 y los muestre por pantalla<br>
            </p>

            <hr>
            <p class="card-text">
                <?php 
                    $suma = 0;
                    $limite = 1000;
                    for ($i=1; $i <=$limite ; $i++) { 
                       if ($i%2 == 0) {
                        $suma+=$i;
                       }
                    }
                    echo $suma;
                ?> 
            
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #4 - Estructuras iterativas (3) </h5>
            <p class="card-text">
                Completa la función definida abajo para que al proporcionarle 3 números cualquiera nos muestre por cada uno de ellos si es la suma de los otros 2.<br>
                Por ejemplo si le pasamos 3 , 5 , 8 nos tendría que decir que 8 es suma de 3 + 5<br>
                O si le pasamos 2 , 4 , 6 nos deberia decir que 6 es la suma de 2 + 4<br>
            </p>

            <hr>
            <p class="card-text">
                <?php 
                    function magic_method($x, $y, $z){
                        if ($x + $y == $z) {
                            echo "$z es la suma de $x + $y";
                        } else if ($x + $z == $y) {
                            echo "$y es la suma de $x + $z";
                        }else if ($y + $z == $x) {
                            echo "$x es la suma de $y + $z";
                        } else {
                            echo "Ninguno de los números es resultado de la suma entre los otros dos";
                        }
                    }
                    magic_method(5,3,8);

                ?> 
            
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #5 - PHP Envío Formularios GET </h5>
            <p class="card-text">
               Crea un formulario que apunte a esta misma página , tendrá 2 cajas de texto para introducir 2 números.<br>
               Estos 2 números se enviaran por el método GET .Muestra en pantalla solo el mayor de ellos
            </p>

            <hr>
            <p class="card-text">
                <form action="" method="GET"> <!-- el atributo action esta vacio se envian los datos a la misma pagina donde se encuentra el form -->
                    <input type="number" name="number1" id="number1" placeholder="Introduce un nº" required>
                    <input type="number" name="number2" id="number2" placeholder="Introduce un nº" required>
                    <input type="submit">
                </form>
                
                <?php 
                    
                    $num1 = $_GET["number1"]; //lo que hay dentro de los corchetes hace referencia al name del input, es recomendable poner diferentes names
                    $num2 = $_GET["number2"]; //si pongo mas de un name igual los datos se sobreescribe, en este caso solo se recibiria el ultimo valor que metemos en el input
                    
                    if ($num1 > $num2) {
                        echo "El número mayor es: $num1";
                    } elseif ($num1 < $num2) {
                         echo "El número mayor es: $num2";
                    } else {
                         echo "Los números son iguales: $num1";
                    }
                    
                ?> 
            
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #6 - PHP Envío Formularios POST </h5>
            <p class="card-text">
                Crea un formulario que apunte a esta misma página , tendrá 1 caja de texto para introducir una cadena de texto.<br>
                Esta cadena tendrá la siguiente configuración , 4 palabras separadas por comas. Convertir este string a un array.<br>
                Revisar los métodos que hay para arrays , existe uno que nos puede valer. Mostrar en pantalla un var_dump de este array.
            </p>

            <hr>
            <p class="card-text">
                <?php 
                   
                ?> 
            
            </p>
            <hr>
        </div>


      </div>

</body>
</html>