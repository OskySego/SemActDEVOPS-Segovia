<?php
// configura los encabezados para permitir solicitudes desde cualquier origen
// y especifica que la respuesta será en formato JSON
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// La llamada AJAX envía los datos en formato JSON, así que los leemos desde el cuerpo de la petición.
$data=json_decode(file_get_contents("php://input"));

// Se realiza una verificación simple de los datos recibidos.
// En un encenario real, aquí se harián validaciones más complejas (ej. longitud, formato, etc.).
if (!isset($data->username) || !isset($data->password) || empty($data->username) || empty($data->password)) {
    // Si falta algún dato, se envía una respuesta de error.
    http_response_code(400); // Bad Request
    echo json_encode(array("status" => "error", "message" => "Faltan datos de usuario o contraseña."));
} else {
        // Si los datos están presentes, se devuelve una resuesta exitosa.
        http_response_code(200); // OK
        echo json_encode(array("status" => "ok", "message" => "Datos recibidos y verificados con éxito."));
    exit();
}
?>
