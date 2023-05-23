<?php
session_start(); // Iniciar la sesión

$servername = "localhost:3307";
$username = "root";
$password = "123456789";
$dbname = "lavado";

// Establecer conexión con la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión si es exitosa muestra un mensaje de conexión exitosa
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Obtener los datos del formulario
$correo = $_POST['correo-login'];
$contrasena = $_POST['contrasena-login'];

// Preparar la consulta SQL para obtener el ID del cliente basado en el correo electrónico
$sql = "SELECT idClientes FROM Clientes WHERE Correo = '$correo' AND Contraseña = '$contrasena'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $idCliente = $row['idClientes'];

    // Almacenar el ID del cliente en una variable global
    $_SESSION['idCliente'] = $idCliente;

    // Redireccionar a la página deseada después del inicio de sesión exitoso
    header("Location: formulario_lavado.html");
    exit();
} else {
    // Inicio de sesión fallido
    echo "Correo o contraseña incorrectos";
}

// Cerrar la conexión
mysqli_close($conn);
?>
