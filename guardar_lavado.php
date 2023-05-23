<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "lavado";

// Establecer conexión con la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$clase = $_POST['clase'];
$kilos = $_POST['kilos'];
$precio = $_POST['total'];

// Obtener el área de lavado correspondiente a la clase
$areaId = 0;
if ($clase === 'alto') {
    $areaId = 1;
} elseif ($clase === 'bajo') {
    $areaId = 2;
} elseif ($clase === 'mediano') {
    $areaId = 3;
}

// Obtener el ID del cliente desde la sesión si está definido y es un número entero
$clienteId = isset($_SESSION['idCliente']) ? intval($_SESSION['idCliente']) : 0;

// Verificar si el clienteId es válido
if ($clienteId === 0) {
    echo 'Error: ID del cliente inválido.';
    exit(); // Detener la ejecución del código si el clienteId no es válido
}

// Preparar la consulta SQL para guardar el lavado
$sql = "INSERT INTO TicketCompra (IdCliente, IdArea, FechaCompra, Total)
        VALUES ($clienteId, $areaId, CURDATE(), $precio)";

if ($conn->query($sql) === TRUE) {
    echo 'Success';
} else {
    echo 'Error: ' . $conn->error;
}

$conn->close();
?>
