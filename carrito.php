<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_id'])) {

    $id = $_POST['remove_id'];

    foreach ($_SESSION['carrito'] as $index => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['carrito'][$index]);
            break;
        }
    }

    // Reindexar array (importante)
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);

    header("Location: carrito.php");
    exit();
}

// 🔥 CREAR CARRITO SI NO EXISTE
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// 🔥 AGREGAR PRODUCTO (SIN DUPLICADOS)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];

    // 🔍 VERIFICAR SI YA EXISTE
    $existe = false;

    foreach ($_SESSION['carrito'] as $item) {
        if ($item['id'] == $id) {
            $existe = true;
            break;
        }
    }

    // ❌ SI YA EXISTE, NO SE AGREGA
    if (!$existe) {
        $_SESSION['carrito'][] = [
            "id" => $id,
            "nombre" => $_POST['nombre'],
            "precio" => $_POST['precio']
        ];
    }

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Carrito</title>

<style>
body {
    background:#0f172a;
    color:white;
    font-family:Arial;
    text-align:center;
}

.item {
    background:#1e293b;
    margin:10px auto;
    padding:10px;
    width:300px;
    border-radius:10px;
}

.msg {
    color:#38bdf8;
}
</style>
</head>

<body>

<h2>🛒 Carrito de Compras</h2>

<?php
if (!empty($_SESSION['carrito'])) {

    foreach ($_SESSION['carrito'] as $item) {
        echo "<div class='item'>";
echo "<p>".$item['nombre']."</p>";
echo "<p>$".$item['precio']."</p>";

echo "<form method='POST' style='margin-top:10px;'>
        <input type='hidden' name='remove_id' value='".$item['id']."'>
        <button type='submit'>❌ Quitar</button>
      </form>";

echo "</div>";
    }

} else {
    echo "<p>El carrito está vacío</p>";
}
?>

<br>
<a href="index.php">← Volver a la tienda</a>

</body>
</html>
