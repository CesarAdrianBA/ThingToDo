<?php
session_start();

// Verificar si el usuario está autenticado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Verificar si la sesión ha expirado
    if (time() > $_SESSION['expire_time']) {
        session_unset(); // Eliminar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        header('Location: login.php'); // Redirigir al usuario al inicio de sesión
        exit;
    }
} else {
    // El usuario no está autenticado, no hay necesidad de redirección aquí
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_REQUEST['Login'])){

        // Validar las credenciales (aquí debes agregar tu propia lógica de validación)
        $email = $_POST['form__inputLogin-email'];
        $password = $_POST['form__inputLogin-password'];
        echo $email;

        $mysqli = new mysqli("localhost", "root", "", "thingstd");

        if ($mysqli->connect_error) {
            die("Conexión fallida: " . $mysqli->connect_error);
        }

            

        // Utilizar sentencias preparadas para evitar inyecciones SQL
        $query = "SELECT usuario_id, usuario, correo, contrasena FROM usuarios WHERE correo = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {

            $stmt->bind_result($usuario_id, $usuario, $correo, $hashed_password);
            $stmt->fetch();
            

            if (password_verify($password, $hashed_password)) {
                echo "son iguales las pass";
            }else{
                echo "no son iguales las pass";
            }

            // Verificar la contraseña utilizando password_verify
            if ($password === $hashed_password) {

                // Iniciar sesión y redirigir a la página de bienvenida
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $usuario;
                $_SESSION['user_id'] = $usuario_id;
                $_SESSION['expire_time'] = time() + 60*5; // Establecer un tiempo de expiración de sesión en segundos (10 minutos)

                header('Location: index.php');
                exit;
            } else {
                $error_message = 'Credenciales incorrectas pass. Inténtalo de nuevo.';
            }
        } else {
            $error_message = 'Credenciales incorrectas. Inténtalo de nuevo.';
        }
        $stmt->close();
        $mysqli->close();   
    }
    

    if (isset($_POST['Registrar'])) {
        $usuario = $_POST['form__inputRegistro-nombre'];
        $email = $_POST['form__inputRegistro-email'];
        $usuario = $_POST['form__inputRegistro-usuario'];
        $contrasena = $_POST['form__inputRegistro-contrasena'];
        $confirmaContrasena = $_POST['form__inputRegistro-confirmarContrasena'];

        if ($contrasena === $confirmaContrasena) {
            
            // Conexión a la base de datos (ajusta los valores según tu configuración)
            $mysqli = new mysqli("localhost", "root", "", "thingstd");

        
            // Verificar la conexión
            if ($mysqli->connect_error) {
                die("Conexión fallida: " . $mysqli->connect_error);
            }
        
            // Sentencia SQL preparada con marcadores de posición (?)
            $insert = 'INSERT INTO usuarios (usuario, correo, contrasena) VALUES (?, ?, ?)';
            
            // Preparar la sentencia
            $stmt = $mysqli->prepare($insert);
        
            // Verificar si la preparación fue exitosa
            if ($stmt) {
                // Vincular parámetros
                $stmt->bind_param('sss', $usuario, $email, $contrasena);
        
                // Ejecutar la sentencia
                if ($stmt->execute()) {
                    echo '<script language="javascript">alert("Registro agregado");</script>';
                } else {
                    echo '<script language="javascript">alert("Error al ejecutar la sentencia: " . $stmt->error);</script>';
                }
        
                // Cerrar la sentencia
                $stmt->close();
            } else {
                echo 'Error al preparar la sentencia: ' . $mysqli->error;
            }
        
            // Cerrar la conexión
            $mysqli->close();


        }else {
            $error_message = 'Error confirmar contrasaeña';
        }
        
    }

}
?>
