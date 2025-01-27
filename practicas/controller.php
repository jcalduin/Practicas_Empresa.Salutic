<?php

$params = (object) $_POST;

$succes = true;
$message = "Datos guardados correctamente";

$empresa = $params->empresa;
$dia = $params->dia;
$mes = $params->mes;
$anio = $params->anio;
$hora = $params->hora;
$minutos = $params->minutos;
$modalidad = $params->tipoCita;
$servicio = $params->servicio;
$mensaje = $params->mensaje;

$data = array("empresa" => $empresa, "dia" => $dia, "mes" => $mes, "anio" => $anio, "hora" => $hora, "minutos" => $minutos, "modalidad" => $modalidad, "servicio" => $servicio, "mensaje" => $mensaje);

$response = Array(
    'success' => $succes,
    'message' => $message,
    'data' => $data
);

echo json_encode($response);