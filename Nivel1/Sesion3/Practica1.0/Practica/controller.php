<?php

$params = (object) $_POST;

$success = true;
$message = 'Se han procesado los datos correctamente';
$nombre_completo = $params->nombre . ' ' . $params->apellidos;
$direccion_lwcase = strtolower($params->direccion);
$nacimiento = date('Y') - $params->edad;
$data = array("completo"=>$nombre_completo,"direccion"=> $direccion_lwcase, "nacimiento"=>$nacimiento);



$response = Array('success' => $success, 'message' => $message, 'data' => $data);
echo json_encode($response);