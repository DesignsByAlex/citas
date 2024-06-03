<?php
// Verificar si se ha enviado el formulario
if (!isset($_POST['nombres']) || !isset($_POST['celular']) || !isset($_POST['cedula']) || !isset($_POST['fecha_nacimiento'])) {
    exit("Error: Todos los campos son obligatorios.");
}

// Incluir el archivo de conexión a la base de datos
include '../admin/model/conexion.php';

// Obtener los datos del formulario
$nombres = $_POST['nombres'];
$celular = $_POST['celular'];
$cedula = $_POST['cedula'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

// Insertar el nuevo registro
$sentencia = $db->prepare("INSERT INTO clientes (nombres, celular, cedula, fecha_nacimiento) VALUES (?, ?, ?, ?)");
if ($sentencia->execute([$nombres, $celular, $cedula, $fecha_nacimiento])) {
    header('Location: ../exito.php'); // Redirigir si la inserción fue exitosa.
} else {
    echo 'Error al insertar datos.';
}
?>
