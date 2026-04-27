<?php
$conexion = new mysqli("sql201.infinityfree.com", "if0_41762913", "lariler09", "if0_41762913_XXX");

if ($conexion->connect_error) {
    die("Error: " . $conexion->connect_error);
}
?>
