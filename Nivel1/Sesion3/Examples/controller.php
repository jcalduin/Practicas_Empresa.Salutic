<?php
$params = (object) $_POST;


$success = false;
$message = 'Todo ha ido OK';
$data = array($params->nombre , $params->edad * 2 , $params->direccion);

$response = Array('success' => $success, 'message' => $message, 'data' => $data);
echo json_encode($response);

