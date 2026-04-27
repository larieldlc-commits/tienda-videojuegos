<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conexion = new mysqli(
    "sql201.infinityfree.com",
    "if0_41762913",
    "lariler09",
    "if0_41762913_epiz_12345678_tienda"
);

$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $resultado = $conexion->query("SELECT * FROM usuarios WHERE email='$email'");

    if ($resultado && $resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['usuario'] = $user['id'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>
body {
    background:#0f172a;
    color:white;
    font-family:Arial;
    text-align:center;
}

form {
    background:#1e293b;
    padding:20px;
    margin:50px auto;
    width:300px;
    border-radius:10px;
}

input {
    width:90%;
    padding:10px;
    margin:10px;
    border:none;
    border-radius:5px;
}

button {
    background:#22c55e;
    padding:10px;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

.error {
    color:red;
}
</style>

</head>

<body>

<h2>Iniciar Sesión</h2>

<?php if ($error != "") echo "<p class='error'>$error</p>"; ?>

<form method="POST">
<input type="email" name="email" placeholder="Correo" required>
<input type="password" name="password" placeholder="Contraseña" required>
<button type="submit">Entrar</button>
</form>

<p>¿No tienes cuenta? <a href="registro.php" style="color:#38bdf8;">Regístrate</a></p>

</body>
</html>
