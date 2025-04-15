<!--Backend para el registro de usuarios-->
<?php

// Conexión a la base de datos
require_once("connection.php");

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $interest = $_POST['interest'];
    //Verificamos que la contraseña tenga al menos 8 caracteres
    $error = "";
    if (strlen($password) < 8) {
        $error = "La contraseña debe tener al menos 8 caracteres.";
    }

    //Validamos que todos los campos esten llenos
    if (empty($username) || empty($email) || empty($password) || empty($interest)) {
        $error = "Todos los campos son obligatorios.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }

    $check = $connection->prepare("SELECT id FROM users WHERE username=? OR email=?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    //Vincular el resultado y ver si se obtiene algo
    $check->bind_result($id_encontrado);
    if ($check->fetch()) {
        $error = "El nombre de usuario o el correo electrónico ya están en uso.";
    }
    $check->close();

    //Preparar la consulta para insertar el nuevo usuario
    if ($error === "") {
        $stmt = $connection->prepare("INSERT INTO users (username, email, password, interest) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $username, $email, $hashed_password, $interest);

        //Ejecutar y verificar
        if ($stmt->execute()) {
            //Redirigir a la página de inicio de sesión o a otra página
            header("Location: login.php");
        } else {
            echo "Error en el registro: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>


<!--Formulario de registro principal-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/register.css">
    <title>Registro</title>
</head>

<body>
    <div class="container">
    <h1>Regístrate ahora</h1>
    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
    <form class="registerForm" action="" method="post">
        <label for="username">Usuario:
            <input type="text" name="username" id="username" required>
        </label>
        <label for="email">Correo electrónico:
            <input type="email" name="email" id="email" required>
        </label>
        <label for="password">Contraseña:
            <input type="password"  pattern="^(?=.*[A-Z]).{8,16}$" name="password" id="password" required>
        </label>
        <p>Selecciona tu interés:</p>
        <select name="interest">
            <option checked value="1">Tecnología</option>
            <option value="2">Deportes</option>
            <option value="3">Arte</option>
        </select>
        <input class="buttonSubmit" type="submit" value="Registrarse">
    </form>
    </div>

    <!--Incluimos el javascript para el formulario-->
    <script src="js/register.js"></script>
</body>

</html>