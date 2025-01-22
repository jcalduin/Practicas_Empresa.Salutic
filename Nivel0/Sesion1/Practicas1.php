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
        <h5 class="card-title font-weight-bold">Sesión 01 - Introducción a PHP - Tiempo estimado 5h</h5>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #1 - Declaración de Variables (1)</h5>
            <p class="card-text">
                En PHP se pueden declarar las variables de tipo String poniendo el contenido entre '' o ""<br>
                Declara 2 variables de tipo cadena $strA y $strB con el texto que prefieras.<br>
                Muestralas unidas en pantalla usando el operador de concatenación.<br>
                Intenta conseguir lo mismo sin usar el operador de concatenación mostrandolo en una línea distinta con la correspondiente etiqueta HTML.
            
            </p>
            <hr>
            <p class="card-text">
                <?php 
                    
                    
                ?>           
            </p>
            <hr>

        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #2 - Declaración de Variables (2)</h5>
            <p class="card-text">
                En PHP tenemos 2 funciones muy útiles a la hora de mostrar información sobre una variable:<br>
                gettype($variable) y var_dump($variable). Declara 4 variables de tipos distintos y usando estas 2 funciones muestra información sobre ellas en pantalla.
            </p>

            <hr>
            <p class="card-text">
                <?php 
                   

                ?> 
            
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #3 - Declaración de Variables (3)</h5>
            <p class="card-text">
                Cambia el codigo dentro de las etiquetas php en el fichero Practicas1.php para que se muestre correctamente la variable $str en pantalla.
            </p>

            <hr>
            <p class="card-text">
                <?php 
                    $str = 'Cadena oculta';
                    //echo $stR;
                ?> 
            
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #4 - Scope </h5>
            <p class="card-text">
                ¿Qué pondrías en el código de la funcion suma() para que se muestre en pantalla el valor 10 y no de error?
            </p>

            <hr>
            <p class="card-text">
                <?php 
                    $x = $y = 5;
                    function suma(){
                        // Escribe el código aquí
                        $z = $x + $y;
                        return $z;
                    }
                    echo suma();

                ?> 
            
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #5 - Strings (1)</h5>
            <p class="card-text">
                Dadas las cadenas $strA y $strB mostrar en pantalla con las funciones del lenguaje lo siguiente:<br>
                1. Mostrar en pantalla todos los caracteres de $strA en minúsculas.<br>
                2. El punto 1 se podría en este caso en concreto para $strA hacer de 2 formas distintas, ¿cual sería la otra? <br>
                3. Convertir la cadena completa de $strB a minúsculas.<br>
                
                <br>Consultar <a href="http://php.net/manual/es/ref.strings.php">php.net/manual/es/ref.strings.php</a>
            </p>

            <hr>
            <p class="card-text">
                <?php 
                    $strA = 'Cadena en la que hay una o';
                    $strB = 'CADENA COMPLETAMENTE ESCRITA EN MAYUSCULAS';
                    // Escribe el código aquí
                ?> 
            
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #6 - Strings (2)</h5>
            <p class="card-text">
                Investiga la función strstr()<br>
                Dado el email guardado en $email , usando sólo esta función muestra en pantalla en 2 líneas distintas :<br>
                La parte de la cadena a la izquierda de la @ y la parte a la derecha de la @<br>
                En el caso de la parte derecha vemos que nos devuelve tambien el carácter @ , usando otra función existente como podríamos evitarlo.<br>
                (Optativo) Puedes encadenar estos métodos para lograrlo<br>
                <br>Consultar <a href="http://php.net/manual/es/ref.strings.php">php.net/manual/es/ref.strings.php</a>
            </p>

            <hr>
            <p class="card-text">
                <?php 
                    $email = 'nombre@dominio.com';
                    // Escribe el código aquí
                ?> 
            
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #7 - Strings (3)</h5>
            <p class="card-text">
                Dada la cadena $strA , muestra en pantalla lo siguiente usando funciones de cadenas:<br>
                1. Longitud de esta cadena<br>
                2. La cadena en orden invertido<br>
                3. Los últimos 5 carácteres<br>
                4. Reemplaza todas las vocales a por z<br>
                <br>Consultar <a href="http://php.net/manual/es/ref.strings.php">php.net/manual/es/ref.strings.php</a>
            </p>

            <hr>
            <p class="card-text">
                <?php 
                    $strA = 'Esta es la última práctica de strings..';
                    // Escribe el código aquí
                ?> 
            
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #8 - Operadores (1)</h5>
            <p class="card-text">
                Que operador usarías para mostrar en pantalla lo siguiente? : <br>
                1. El número 2;<br>
                2. El número 1331;<br>
                <br>Consultar <a href="http://php.net/manual/es/language.operators.arithmetic.php">php.net/manual/es/language.operators.arithmetic.php</a>
            </p>

            <hr>
            <p class="card-text">
                <?php 
                    $x = 11;
                    // Modifica el codigo de abajo
                    // echo $x (operador) 3;
                ?> 
            
            </p>
            <hr>
        </div>

      </div>

</body>
</html>