<?php

$params = (object) $_POST;

$success = true;
$message = 'Se han procesado los datos correctamente';
$nombreCompleto = $params-> nombre . " " . $params->apellido;
$direccion = strtolower($params->direccion);
$edad = date('Y') - $params->edad;
$data = array('nombreCompleto' => $nombreCompleto, 'direccion' => $direccion, 'edad' => $edad);



$response = Array('success' => $success, 'message' => $message, 'data' => $data);
echo json_encode($response);
