<?php

$params = (object) $_POST; //creo una varaible $params que es un objeto que almacena los datos que se envian por POST

$success = true; //creo una variable $success que es un booleano que almacena si la operacion fue exitosa
$message = 'Se han procesado los datos correctamente'; //creo una variable $message que es un string que almacena un mensaje
$nombreCompleto = $params-> nombre . " " . $params->apellido; //creo una variable $nombreCompleto que almacena el nombre y el apellido
$direccion = strtolower($params->direccion); //creo una variable $direccion que almacena la direccion en minusculas
$edad = date('Y') - $params->edad; //creo una variable $edad que almacena la edad restando el año actual menos la edad introducida
$data = array('nombreCompleto' => $nombreCompleto, 'direccion' => $direccion, 'edad' => $edad); //creo una variable $data que almacena un array con los datos anteriores



$response = Array('success' => $success, 'message' => $message, 'data' => $data); //creo una variable $response que almacena un array con los datos anteriores
echo json_encode($response); //devuelvo los datos en formato json, estos datos se devuelven a la funcion success de la peticion ajax en procesaDatos() para rellenar la parte de Datos Procesados
