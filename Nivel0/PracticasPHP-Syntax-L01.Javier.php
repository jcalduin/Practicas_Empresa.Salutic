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
        <h5 class="card-title font-weight-bold">L01 - PHP Prácticas</h5>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #1 - Sumatorio</h5>
            <p class="card-text">
                Escribir una función que devuelva el sumatorio desde 1 hasta el número pasado como parámetro:<br>
                No tengas en cuenta validaciones, asumimos que siempre se pasa un número entero mayor o igual a 1.
            <p class="alert alert-info" role="alert">
                <span class="font-weight-bold">Assert:</span> sumatorio(2) => 3<br>
                <span class="font-weight-bold">Assert:</span> sumatorio(8) => 36 
            </p>
            
            </p>
            <hr>
            <p class="card-text">
                <?php 
                    
                        function sumatorio($num)
                        {
                            return array_sum(range(1, $num));
                        }

                        echo sumatorio(2)."<br>"; // Output: 3
                        echo sumatorio(8)."<br>";  // Output: 36
                      
                ?>           
            </p>
            <hr>
        </div>

        <div class="card-body">
          <h5 class="card-title font-weight-bold">Práctica #2 - Reversed Strings</h5>
            <p class="card-text">
                Escribir una función que devuelva un string pasado como parámetro en sentido inverso:<br>
                No tengas en cuenta validaciones, asumimos que siempre se pasa una cadena de texto válida.
            <p class="alert alert-info" role="alert">
                <span class="font-weight-bold">Assert:</span> invertirTexto('programacion') => noicamargorp<br>
                <span class="font-weight-bold">Assert:</span> invertirTexto('error de sintaxis') => sixatnis ed rorre
            </p>
            
            </p>
            <hr>
            <p class="card-text">
                <?php
                    
                        function invertirTexto($texto)
                        {
                            return strrev($texto);
                        }

                        echo invertirTexto('programacion')."<br>"; // Output: noicamargorp
                        echo invertirTexto('error de sintaxis')."<br>";  // Output: sixatnis ed rorre
                
                    
                ?>           
            </p>
            <hr>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #3 - Convertir número en negativo</h5>
                <p class="card-text">
                    Escribir una función que devuelva el valor negativo de un número dado:<br>
                    No tengas en cuenta validaciones, asumimos que siempre se pasa un número.<br>
                    Si pasamos un número negativo NO se convierte en número positivo, se devuelve el mismo número. Igual con el número 0.
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> retNegativo(1) => -1<br>
                    <span class="font-weight-bold">Assert:</span> retNegativo(-5) => -5<br>
                    <span class="font-weight-bold">Assert:</span> retNegativo(0) => 0<br>
                    <span class="font-weight-bold">Assert:</span> retNegativo(0.12) => -0.12<br>
                </p>         
            <hr>
            <p class="card-text">
                <?php 
                    
                        function retNegativo($num)
                        {
                            
                            if($num > 0) {
                                $num = -($num);
                            } else if( $num < 0) {
                                $num;
                            } else {
                                $num;
                            }
                            return $num;
                        }

                        echo retNegativo(1)."<br>";
                        echo retNegativo(-5)."<br>";  // Output: -5
                        echo retNegativo(0)."<br>";  // Output: 0
                        echo retNegativo(0.12)."<br>";  // Output: -0.12
                       
                ?>           
            </p>
            <hr>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #4 - Par o Impar</h5>
                <p class="card-text">
                    Escribir una función a la que se le pase un número entero mayor que 0 y que devuelva los strings siguientes:<br>
                    "Par" si es un número par o "Impar" si es un número impar.<br>
                    No tengas en cuenta validaciones, asumimos que siempre se pasa un número entero mayor que 0.
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> par_impar(2) => "Par"<br>
                    <span class="font-weight-bold">Assert:</span> par_impar(7) => "Impar"<br>
                    <span class="font-weight-bold">Assert:</span> par_impar(1) => "Impar"<br>
                </p>         
            <hr>
            <p class="card-text">
                <?php 
                    
                        function par_impar($num)
                        {
                            $respuesta;
                            if ($num%2 == 0){
                                $respuesta = "par";
                            } else {
                                $respuesta = "impar";
                            }
                            return $respuesta;
                        }

                        echo par_impar(2)."<br>"; // Output: "Par"
                        echo par_impar(7)."<br>";  // Output: "Impar"
                        echo par_impar(1)."<br>";  // Output: "Impar"
                       
                ?>           
            </p>
            <hr>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #5 - Contador de positivos, Suma de negativos </h5>
                <p class="card-text">
                    Escribir una función a la que se le pase un array de números enteros y devuelva un array con 2 elementos:<br>
                    - El primer elemento del array será un contador de números positivos que hay en el array original.<br>
                    - El segundo elemento del array será la suma de los números negativos que hay en el array original.<br>
                    No tengas en cuenta validaciones, asumimos que siempre se pasa un array con números enteros positivos o negativos distintos de 0.
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> countPositivesSumNegatives([1,2,3,4,5,6,7]) => [7,0]<br>
                    <span class="font-weight-bold">Assert:</span> countPositivesSumNegatives([-3,2,3,-4,-8,1,3,8,9]) => [6,-15]<br>
                    <span class="font-weight-bold">Assert:</span> countPositivesSumNegatives([2,20,-15,10,-4,-8,5,25]) => [5,-27]<br>
                </p>         
            <hr>
            <p class="card-text">
                <?php 
                    
                        function countPositivesSumNegatives($list)
                        {
                            $contador=0;
                            $negativos = 0;
                            foreach ($list as $elemento) {
                                if ($elemento > 0) {
                                    $contador++;
                                } else  {
                                    $negativos+=$elemento;                       
                                }
                            }
                            return [$contador,$negativos];
                        }

                        echo json_encode(countPositivesSumNegatives([1,2,3,4,5,6,7]))."<br>"; // Output: [7,0]
                        echo json_encode(countPositivesSumNegatives([-3,2,3,-4,-8,1,3,8,9]))."<br>";  // Output: [6,-15]
                        echo json_encode(countPositivesSumNegatives([2,20,-15,10,-4,-8,5,25]))."<br>";  // Output: [5,-27]
                       
                ?>           
            </p>
            <hr>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #6 - Arrays y operadores matemáticos.</h5>
                <p class="card-text">
                    Escribir una función a la que se le pase 3 argumentos y devuelve alguna de las siguientes operaciones:<br>
                    - El primer argumento será un carácter que identificará que operación hacer: '+', '-', '*', '/'.<br>
                    - El segundo y tercer parámetro seran los 2 números sobre los que se ejecutará la operación.<br>
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> basicOP('+', 5 ,6) => 11<br>
                    <span class="font-weight-bold">Assert:</span> basicOP('-', 5, 2) => 3<br>
                    <span class="font-weight-bold">Assert:</span> basicOP('*', 4, 5) => 20<br>
                    <span class="font-weight-bold">Assert:</span> basicOP('/', 10, 2) => 5<br>
                </p>         
            <hr>
            <p class="card-text">
                <?php 
                    
                        function basicOP($operador, $num1, $num2)
                        {
                            $resultado = 0;
                            if ($operador == "+") {
                                $resultado = $num1 + $num2;
                            } else if ($operador == "-") {
                                $resultado = $num1 - $num2;
                            } else if ($operador == "*") {
                                $resultado = $num1 * $num2; 
                            } else if ($operador == "/"){
                                $resultado = $num1/$num2;
                            } else {
                                echo "$operador no es un operador válido";
                            }
                            return $resultado;
                        }

                        echo basicOP('+', 5 ,6)."<br>"; // Output: 11
                        echo basicOP('-', 5, 2)."<br>";  // Output: 3
                        echo basicOP('*', 4, 5)."<br>";  // Output: 20
                        echo basicOP('/', 10, 2)."<br>";  // Output: 5
                       
                ?>           
            </p>
            <hr>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #7 - Mostrar el menor número entero de un array dado.</h5>
                <p class="card-text">
                    Escribir una función a la que se le pase un array de enteros y muestre el menor de ellos:<br>
                    No tengas en cuenta validaciones, asumimos que siempre se pasa un array no vacio y con números enteros válidos.
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> mostrarEnteroMenor([3, 5, 10, 1, 4, 55]) => 1<br>
                    <span class="font-weight-bold">Assert:</span> mostrarEnteroMenor([0, 0]) => 0<br>
                    <span class="font-weight-bold">Assert:</span> mostrarEnteroMenor([34, -345, -1, 100]) => -345 <br>
                </p>         
            <hr>
            <p class="card-text">
                <?php 
                    
                        function mostrarEnteroMenor($list)
                        {
                            $resultado = $list[0];
                            for ($i=0; $i <= sizeof($list)-1 ; $i++) { 
                               
                                if ($list[$i] < $resultado ) {
                                    $resultado = $list[$i];
                                }
                            }
                            return $resultado;
                        }

                        echo mostrarEnteroMenor([3, 5, 10, 1, 4, 55])."<br>"; // Output: 1
                        echo mostrarEnteroMenor([0, 0])."<br>";  // Output: 0
                        echo mostrarEnteroMenor([34, -345, -1, 100])."<br>";  // Output: -345
                        
                ?>           
            </p>
            <hr>
        </div>

    </div>
</body>
</html>