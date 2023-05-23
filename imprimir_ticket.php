<?php
session_start();

$servername = "localhost:3307";
$username = "root";
$password = "123456789";
$dbname = "lavado";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del cliente actual
$clienteId = $_SESSION['idCliente'];

// Obtener los detalles del ticket
$sql = "SELECT TicketCompra.IdTicket, TicketCompra.FechaCompra, AreasLavado.Nombre AS AreaNombre, TicketCompra.Total
        FROM TicketCompra
        INNER JOIN AreasLavado ON TicketCompra.IdArea = AreasLavado.IdArea
        WHERE TicketCompra.IdCliente = '$clienteId'
        ORDER BY TicketCompra.IdTicket DESC
        LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Mostrar los detalles del ticket
    echo "Ticket ID: " . $row['IdTicket'] . "<br>";
    echo "Fecha de compra: " . $row['FechaCompra'] . "<br>";
    echo "Área de lavado: " . $row['AreaNombre'] . "<br>";
    echo "Total: $" . $row['Total'] . "<br>";
} else {
    echo "No se encontraron tickets.";
}

$conn->close();
?>
