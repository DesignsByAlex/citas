<?php
if (!isset($_POST["id2"])) {
    header("Location: http://localhost/citas/admin/error.php");
    exit();
}

include "../model/conexion.php";

$id2 = $_POST["id2"];
$fecha = $_POST["fecha"];
$hora_inicio = $_POST["hora"];
$mensaje = $_POST["mensaje"];
$estado = $_POST["estado"];
$servicio_id = $_POST["servicio_id"];
$cliente_id = $_POST["cliente_id"];

$sentenciaServicio = $db->prepare("SELECT id FROM servicios WHERE id=?");
$sentenciaServicio->execute([$servicio_id]);
$servicioExistente = $sentenciaServicio->fetch(PDO::FETCH_OBJ);

$sentenciaCliente = $db->prepare("SELECT id FROM clientes WHERE id=?");
$sentenciaCliente->execute([$cliente_id]);
$clienteExistente = $sentenciaCliente->fetch(PDO::FETCH_OBJ);

if (!$servicioExistente || !$clienteExistente) {
    echo "El servicio o el cliente no existen.";
    exit();
}

$sentencia = $db->prepare("UPDATE reservas SET Fecha=?, hora_inicio=?, MensajeAdicional=?, Estado=?, servicio_id=?, cliente_id=? WHERE ID=?;");
$resultado = $sentencia->execute([$fecha, $hora_inicio, $mensaje, $estado, $servicio_id, $cliente_id, $id2]);

if ($resultado) {
    header("Location: http://localhost/citas/admin/mod_reservas.php");
} else {
    echo "Error no se pueden actualizar los registros";
}
?>