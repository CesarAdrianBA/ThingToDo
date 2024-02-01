<?php
$Nombre = $Correo = $Telefono = $Mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombre = $_POST['Nombre'];
    $Correo = $_POST['Correo'];
    $Telefono = $_POST['Telefono'];
    $Mensaje = $_POST['Mensaje'];

    if (empty($Nombre) || empty($Correo) || empty($Telefono) || empty($Mensaje)) {
        echo "Todos los campos son requeridos.";
    } else {
        $db = new mysqli("localhost", "root", "", "thingstd");
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $insert = 'INSERT INTO Contactanos (Nombre, Correo, Telefono, Mensaje) VALUES (?, ?, ?, ?)';
        $stmt = $db->prepare($insert);

        $stmt->bind_param('ssss', $Nombre, $Correo, $Telefono, $Mensaje);

        if ($stmt->execute()) {
            echo "Mensaje enviado correctamente.";
            echo '<script>window.location.href = "index.php";</script>';
        } else {
            echo "Error al enviar el mensaje. Por favor, inténtalo de nuevo.";
        }

        $stmt->close();
        $db->close();
    }
}
?>


