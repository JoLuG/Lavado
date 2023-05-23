<!DOCTYPE html>
<html>
<head>
    <title>Ticket de lavado - Empresas MAYI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .ticket {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid #000;
            background-color: #f9f9f9;
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .ticket-header h1 {
            font-size: 24px;
            margin: 0;
        }

        .ticket-content {
            margin-bottom: 20px;
        }

        .ticket-label {
            font-weight: bold;
        }

        .ticket-data {
            margin-left: 10px;
        }

        .ticket-footer {
            text-align: center;
        }

        .ticket-footer p {
            margin: 0;
        }

        .print-button {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .print-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-header">
            <h1>Ticket de lavado - Empresas MAYI</h1>
        </div>
        <div class="ticket-content">
            <?php
            session_start();

            $servername = "localhost";
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
                echo "<p class='ticket-label'>Ticket ID:</p><p class='ticket-data'>" . $row['IdTicket'] . "</p>";
                echo "<p class='ticket-label'>Fecha de compra:</p><p class='ticket-data'>" . $row['FechaCompra'] . "</p>";
                echo "<p class='ticket-label'>Área de lavado:</p><p class='ticket-data'>" . $row['AreaNombre'] . "</p>";
                echo "<p class='ticket-label'>Total:</p><p class='ticket-data'>$" . $row['Total'] . "</p>";
            } else {
                echo "<p>No se encontraron tickets.</p>";
            }

            $conn->close();
            ?>
        </div>
        <div class="ticket-footer">
            <p>¡Gracias por elegir nuestros servicios!</p>
        </div>
    </div>

    <button class="print-button" onclick="imprimirTicket()">Imprimir</button>

    <script>
        function imprimirTicket() {
            window.print();
        }
    </script>
</body>
</html>
