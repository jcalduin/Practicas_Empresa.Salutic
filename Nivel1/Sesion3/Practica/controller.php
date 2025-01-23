<?php

$params = (object) $_POST;

// Procesar los datos que tenemos en $params para cumplir los requisitos pedidos en la practica y 
// meterlos en un array llamado $data
$success = true;
$message = 'Se han procesado los datos correctamente';
$data = array();


// Devolver la variable $response para poder mostrar los datos desde el metodo ajax que llamo a este fichero
$response = Array('success' => $success, 'message' => $message, 'data' => $data);