<?php
session_start(); // Iniciar la sesión

// Verificar si el ID del cliente está presente en la variable de sesión
if (isset($_SESSION['idCliente'])) {
    // Obtener el ID del cliente desde la variable global de sesión
    $idCliente = $_SESSION['idCliente'];

    // Mostrar el ID del cliente en pantalla
    echo "El ID del cliente es: " . $idCliente;
} else {
    // Mostrar un mensaje de error si el ID del cliente no está presente en la variable de sesión
    echo "Error: No se encontró el ID del cliente en la sesión.";
}
?>
