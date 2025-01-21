<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Javascript Syntax - Prácticas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="card">
        <div class="card-header">
        <h5 class="card-title font-weight-bold">L01 - Javascript Prácticas</h5>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #1 - Eliminar el primer y último caracter.</h5>
                <p class="card-text">
                    Escribir una función que elimine el primer y último caracter de una cadena de texto pasada como parámetro.<br>
                    No tengas en cuenta validaciones, no importa que se pase una cadena de texto con menos de 2 caracteres. (En este caso simplemente se devolverá una cadena vacia)                    
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> eliminarCaracteres('Hola mundo') => ola mund<br>
                    <span class="font-weight-bold">Assert:</span> eliminarCaracteres('Se me extravio el celular') => e me extravio el celula<br>
                </p>         
            <hr>
            <button type="button" class="btn btn-primary" 
                    onclick="eliminarCaracteres(document.getElementById('practica1_texto').value)">Comprobar</button>
            <input type="text" id="practica1_texto" value="">
            <button type="button" class="btn btn-primary" onclick="this.nextElementSibling.innerHTML = ''">Limpiar Resultado</button>
            <p id="resultado_practica1" class="card-text mt-3"></p>
            <hr>
            <script>
                
                function eliminarCaracteres(texto)
                {
                    var resultado = "" ;
                    
                    resultado = texto.slice(1,texto.length -1);
                    

                    document.getElementById('resultado_practica1').innerHTML = resultado;
                }
                
            </script>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #2 - Secuencia inversa.</h5>
                <p class="card-text">
                    Escribir una función que dado un número pasado como parámetro nos devuelva un string con la secuencia inversa.<br>
                    El formato de salida será un string formado por cada dígito separado por comas tal y como se ve en los asserts.<br>
                    No tengas en cuenta validaciones, asumimos que se pasa un número entero mayor que 0.                    
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> secuenciaInversa(5) => "5,4,3,2,1"<br>
                    <span class="font-weight-bold">Assert:</span> secuenciaInversa(12) => "12,11,10,9,8,7,6,5,4,3,2,1"<br>
                </p>         
            <hr>
            <button type="button" class="btn btn-primary" 
                    onclick="secuenciaInversa(document.getElementById('practica2_numero').value)">Comprobar</button>
            <input type="number" id="practica2_numero" min="1" value="1">
            <button type="button" class="btn btn-primary" onclick="this.nextElementSibling.innerHTML = ''">Limpiar Resultado</button>
            <p id="resultado_practica2" class="card-text mt-3"></p>
            <hr>
            <script>
                
                function secuenciaInversa(numero)
                {
                    var resultado = '';
                    for ( var i = numero; i> 0; i--) {
                        resultado += i+",";
                    }

                    document.getElementById('resultado_practica2').innerHTML = resultado;
                }
                
            </script>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #3 - Comprobar si el texto es palíndromo.</h5>
                <p class="card-text">
                    Escribir una función que compruebe si un string pasado como parámetro es un palíndromo.<br>
                    El formato de salida será un valor booleano (true o false) dependiendo de si es o no un palíndromo.<br>
                    No tengas en cuenta validaciones, asumimos que se pasa un string válido. Importante: no distinguiremos entre caracteres en minúscula o mayúscula.                    
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> esPalindromo('Ojo') => true <br>
                    <span class="font-weight-bold">Assert:</span> esPalindromo('Reconocer') => true <br>
                    <span class="font-weight-bold">Assert:</span> esPalindromo('Soborno') => false <br>
                </p>         
            <hr>
            <button type="button" class="btn btn-primary" 
                    onclick="esPalindromo(document.getElementById('practica3_texto').value)">Comprobar</button>
            <input type="texto" id="practica3_texto" value="Ojo">
            <button type="button" class="btn btn-primary" onclick="this.nextElementSibling.innerHTML = ''">Limpiar Resultado</button>
            <p id="resultado_practica3" class="card-text mt-3"></p>
            <hr>
            <script>
                
                    function esPalindromo(texto)
                    {
                        var resultado = "";
                        var comprobacion = texto.split("").reverse().join("");
                        resultado = (texto == comprobacion);

                        document.getElementById('resultado_practica3').innerHTML = resultado;
                    }
                
            </script>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #4 - Calcular área o perímetro.</h5>
                <p class="card-text">
                    Escribir una función que devuelva el valor del área o perímetro de un polígono de 4 lados.<br>
                    Vamos a asumir que será un cuadrado si la longitud y anchura pasados como parámetros son iguales.(Calculamos área)<br>
                    Que será un rectangulo si la longitud y anchura pasados como parámetros son distintos.(Calculamos perímetro)<br>
                    Area Cuadrado = (lado x lado) ; Perimetro rectangulo = (2 x anchura) + (2 x longitud)<br> 
                    No tengas en cuenta validaciones, asumimos que siempre se pasan 2 números enteros mayor que 0.                    
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> calcularAreaPerimetro(6, 10) => 32<br>
                    <span class="font-weight-bold">Assert:</span> calcularAreaPerimetro(4, 4) => 16<br>
                </p>         
            <hr>
            <button type="button" class="btn btn-primary" 
                    onclick="calcularAreaPerimetro(document.getElementById('practica4_anchura').value, document.getElementById('practica4_longitud').value)">Calcular</button>
            <label for="practica4_anchura">Anchura</label>
            <input type="number" id="practica4_anchura" min="1" value="1">
            <label for="practica4_longitud">Longitud</label>
            <input type="number" id="practica4_longitud" min="1" value="1">
            <button type="button" class="btn btn-primary" onclick="this.nextElementSibling.innerHTML = ''">Limpiar Resultado</button>
            <p id="resultado_practica4" class="card-text mt-3"></p>
            <hr>
            <script>
                
                function calcularAreaPerimetro(anchura, longitud)
                {
                    var resultado = 0;
                    if (anchura == longitud) {
                        resultado = anchura * longitud;
                    } else {
                        resultado = (2*anchura) + (2*longitud);
                    }

                    document.getElementById('resultado_practica4').innerHTML = resultado;
                }
                
            </script>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #5 - Devolver los n primeros elementos de un array de números enteros.</h5>
                <p class="card-text">
                    Escribir una función que devuelva un array con los n primeros elementos de un array pasado como parámetro.<br>
                    Se pasaran 2 parámetros, el array y el número de elementos de ese array que devolveremos.<br>
                    El array lo pasamos como se ve en el input Lista de valores, será una serie de números enteros separados por comas.<br> 
                    No tengas en cuenta validaciones, asumimos que siempre se pasa un array válido y un número entero mayor que 0.                 
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> nElementos([2,4,7,10,34,21], 4) => [2,4,7,10] <br>
                    <span class="font-weight-bold">Assert:</span> nElementos([5,8,7,10,3443,3,342,233], 6) => [5,8,7,10,3443,3] <br>
                </p>         
            <hr>
            <button type="button" class="btn btn-primary" 
                    onclick="nElementos(document.getElementById('practica5_array').value, document.getElementById('practica5_num').value)">Calcular</button>
            <label for="practica5_array">Lista de valores</label>
            <input type="text" id="practica5_array" value="2,4,7,10,34,21">
            <label for="practica5_num">N elementos</label>
            <input type="number" id="practica5_num" min="1" value="1">
            <button type="button" class="btn btn-primary" onclick="this.nextElementSibling.innerHTML = ''">Limpiar Resultado</button>
            <p id="resultado_practica5" class="card-text mt-3"></p>
            <hr>
            <script>
                
                    function nElementos(valores, num)
                    {
                        var listaValores = valores.split(','); // listaValores ahora es un array con los números pasados desde el input Lista de valores
                        var resultado = listaValores.slice(0,num);
                        // ESCRIBE AQUI EL CODIGO

                        document.getElementById('resultado_practica5').innerHTML = `[${resultado}]`;
                    }
                
            </script>
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #6 - Calcular IMC.</h5>
                <p class="card-text">
                    Escribir una función que calcule el IMC de una persona dados su peso(Kg) y altura(m).<br>
                    Fórmula para el calculo del IMC: peso * altura^2<br>
                    La función deberá escribir las siguientes palabras dependiendo del resultado: <br>
                    IMC <= 18.5 "Peso insuficiente"<br>
                    IMC <= 25.0 "Normal"<br>
                    IMC <= 30.0 "Sobrepeso"<br>
                    IMC  > 30.0 "Obesidad"<br>
                    No tengas en cuenta validaciones, asumimos que siempre se pasan 2 números válidos mayores que 0.                    
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span> calcularIMC(80, 1.58) => Obesidad <br>
                    <span class="font-weight-bold">Assert:</span> calcularIMC(85, 1.78) => Sobrepeso <br>
                </p>         
            <hr>
            <button type="button" class="btn btn-primary" 
                    onclick="calcularIMC(document.getElementById('practica6_peso').value, document.getElementById('practica6_altura').value)">Calcular IMC</button>
            <label for="practica6_peso">Peso</label>
            <input type="number" id="practica6_peso" value="50">
            <label for="practica6_altura">Altura</label>
            <input type="number" id="practica6_altura" step="0.02" value="1.50">
            <button type="button" class="btn btn-primary" onclick="this.nextElementSibling.innerHTML = ''">Limpiar Resultado</button>
            <p id="resultado_practica6" class="card-text mt-3"></p>
            <hr>
            <script>
                
                function calcularIMC(peso, altura)
                {
                    var resultado = "";
                    var imc = peso / (Math.pow(altura,2));
                    if (imc <= 18.5) {
                        resultado = "Peso insuficiente"
                    } else if (imc <= 25){
                        resultado = "Normal"
                    } else if (imc <= 30.0) {
                        resultado = "Sobrepeso"
                    } else if (imc > 30.0){
                        resultado = "Obesidad";
                    }
            
                    document.getElementById('resultado_practica6').innerHTML = resultado;
                }
                
            </script>
        </div>
        
        <div class="card-body">
            <h5 class="card-title font-weight-bold">Práctica #7 - Imprimir media de una lista de números.</h5>
                <p class="card-text">
                    Escribir una función que devuelva la media de una lista de números dada.<br>
                    Este ejercicio ya está preparado para que se use automaticamente la lista de números que se ve en el Assert.                   
                </p>
                <p class="alert alert-info" role="alert">
                    <span class="font-weight-bold">Assert:</span>  para la lista [3, 5, 6, 7, 9] calcularMedia() => 6 <br>
                </p>         
            <hr>
            <button type="button" class="btn btn-primary" 
                    onclick="calcularMedia()">Calcular Media</button>
            <button type="button" class="btn btn-primary ml-3" onclick="this.nextElementSibling.innerHTML = ''">Limpiar Resultado</button>
            <p id="resultado_practica7" class="card-text mt-3"></p>
            <hr>
            <script>
                
                function calcularMedia()
                {
                    var sumatorio = 0;
                    var lista = [3, 5, 6, 7, 9];
                    for (var i in lista) {
                        sumatorio += lista[i]
                    }
                    var resultado = sumatorio /= lista.length;

                    document.getElementById('resultado_practica7').innerHTML = resultado;
                }
                
            </script>
        </div>

    </div>

</body>
</html>