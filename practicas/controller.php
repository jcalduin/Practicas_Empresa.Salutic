<?php

$params = (object) $_POST;

$succes = true;
$message = "Datos guardados correctamente";

$nombre = $params->nombre;
$empresa = $params->empresa;
$dia = $params->dia;
$mes = $params->mes;
switch ($mes) {
    case 1:
        $mes = "Enero";
        break;
    case 2:
        $mes = "Febrero";
        break;
    case 3:
        $mes = "Marzo";
        break;
    case 4:
        $mes = "Abril";
        break;
    case 5:
        $mes = "Mayo";
        break;
    case 6:
        $mes = "Junio";
        break;
    case 7:
        $mes = "Julio";
        break;
    case 8:
        $mes = "Agosto";
        break;
    case 9:
        $mes = "Septiembre";
        break;
    case 10:
        $mes = "Octubre";
        break;
    case 11:
        $mes = "Noviembre";
        break;
    case 12:
        $mes = "Diciembre";
        break;
}
$anio = $params->anio;
$hora = $params->hora;
$minuto = $params->minuto;
$modalidad = $params->tipoCita;
$servicio = $params->servicio;
$mensaje = $params->mensaje;
$email = $params->email;

$data = array(
    "empresa" => $empresa, 
    "dia" => $dia, 
    "mes" => $mes, 
    "anio" => $anio, 
    "hora" => $hora, 
    "minuto" => $minuto, 
    "modalidad" => $modalidad, 
    "servicio" => $servicio, 
    "mensaje" => $mensaje,
    "email" => $email,
    "nombre" => $nombre
);


$response = Array(
    'success' => $succes,
    'message' => $message,
    'data' => $data
);

echo json_encode($response);