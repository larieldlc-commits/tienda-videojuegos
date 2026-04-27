<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

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

$resultado = $conexion->query("SELECT * FROM videojuegos");


$cantidad = 0;
if (isset($_SESSION['carrito'])) {
    $cantidad = count($_SESSION['carrito']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Tienda Gamer DR</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background-color: #0f172a;
    color: white;
}

header {
    background: #020617;
    padding: 20px;
    text-align: center;
    font-size: 28px;
    color: #38bdf8;
    position: relative;
}


.carrito {
    position: absolute;
    left: 20px;
    top: 20px;
    font-size: 18px;
    text-decoration: none;
    background: #1e293b;
    padding: 6px 10px;
    border-radius: 8px;
    color: white;
}

.carrito:hover {
    background: #334155;
}

.contador {
    background: red;
    color: white;
    font-size: 12px;
    padding: 2px 6px;
    border-radius: 50%;
    margin-left: 5px;
}


.logout {
    position: absolute;
    right: 20px;
    top: 20px;
    background: red;
    padding: 8px 12px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}


.contenedor {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
}

.card {
    background: #1e293b;
    border-radius: 10px;
    width: 220px;
    margin: 10px;
    padding: 10px;
    text-align: center;
}

.card img {
    width: 100%;
}

.precio {
    color: #22c55e;
    font-weight: bold;
}

button {
    background: #38bdf8;
    border: none;
    padding: 8px;
    border-radius: 5px;
    cursor: pointer;
}
</style>
</head>

<body>

<header>
🎮 Tienda Gamer DR


<a href="carrito.php" class="carrito">
    🛒
    <?php if ($cantidad > 0) { ?>
        <span class="contador"><?php echo $cantidad; ?></span>
    <?php } ?>
</a>


<a href="logout.php" class="logout">Salir</a>

</header>

<div class="contenedor">

<?php
if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
?>

<div class="card">
    <h3><?php echo $row['nombre']; ?></h3>
    <img src="imagenes/<?php echo $row['imagen']; ?>">
    <p><?php echo $row['descripcion']; ?></p>
    <p class="precio">$<?php echo $row['precio']; ?></p>

  
    <form method="POST" action="carrito.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
        <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
        <button type="submit">Agregar</button>
    </form>
</div>

<?php
    }
} else {
    echo "<p>No hay videojuegos disponibles</p>";
}
?>

</div>

</body>
</html>
