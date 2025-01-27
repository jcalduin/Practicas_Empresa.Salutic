<?php
//controller PHP es igual que el de la sesion 3
$params = (object) $_POST;

$succes = true;
$mensaje = "Datos procesados correctamente";

$passwordEncriptada = $params -> password;
$longitud = strlen($passwordEncriptada); //obtenemos la longitud de la contraseña
for ($i = 0; $i < $longitud; $i++) { //creamos un bucle para recorrer la contraseña y que sustituya cada caracter por un *
    $passwordEncriptada[$i] = "*";
}
$direccionCompleta = $params -> address . " " . $params -> address2;
$zipFormateado = $params -> city . "[" . $params -> zip . "]";

$data = array("passwordEncriptada" => $passwordEncriptada, "direccionCompleta" => $direccionCompleta, "zipFormateado" => $zipFormateado);

$response = Array("success" => $succes, "message" => $mensaje, "data" => $data);
echo json_encode($response);