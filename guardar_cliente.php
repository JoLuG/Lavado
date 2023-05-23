<?php
$servername = "localhost";
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
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contrasena = $_POST['contrasena'];
$sexo = $_POST['sexo'];

// Preparar la consulta SQL
$sql = "INSERT INTO Clientes (Nombre, Direccion, Correo, Telefono, Contraseña, Sexo)
        VALUES ('$nombre', '$direccion', '$correo', '$telefono', '$contrasena', '$sexo')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    // Redirigir al inicio de sesión
    header("Location: login.html");
    exit();
} else {
    echo "Error al registrar al cliente: " . $conn->error;
}

$conn->close();
?>
