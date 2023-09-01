<?php

require('conexion.php');

// Obtengo los datos del formulario
if (!empty($_POST['nombre'] && !empty($_POST['correo']))) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
}

// Se creo la sentecia
$sql = "INSERT INTO usuarios(nombre, correo) VALUES(:nombre, :correo)";
$stmt = $conn->prepare($sql);

// Asociar valores a los parámetros en la sentencia preparada
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':correo', $correo);

// Ejecutar la sentencia preparada
$stmt->execute();

// Cerramos la conexión
$conn = null;

echo "El usuario fue agregado con exito!";
// Redirigir a la pantalla principal después de unos segundos
header("refresh:3;url=usuarios.php");

?>