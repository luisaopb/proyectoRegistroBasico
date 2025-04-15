<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/login.css">
    <title>login</title>
</head>
<body>
    <div class="container">
        <h1>Inicia Sesión</h1>
        <form action="" method="post">
            <label for="username">Usuario:
                <input type="text" name="username" id="username">
            </label>
            <label for="password">Contraseña:
                <input type="text" name="password" id="password">
            </label>
            <input type="submit" value="Iniciar sesión">
        </form>
        <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
    </div>
</body>
</html>