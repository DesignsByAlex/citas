<?php
include("../header.php");
include("../navbar.php");
include("../model/conexion.php");

if (!isset($_GET['id'])) {
    header('Location: http://localhost/citas/admin/error.php');
    exit();
}

$id = $_GET['id'];
$sentencia = $db->prepare("SELECT * FROM reservas WHERE ID=?");
$sentencia->execute([$id]);
$reserva = $sentencia->fetch(PDO::FETCH_OBJ);

if (!$reserva) {
    header('Location: http://localhost/citas/admin/error.php');
    exit();
}

// Obtener el nombre del cliente
$sentenciaCliente = $db->prepare("SELECT * FROM clientes WHERE id=?");
$sentenciaCliente->execute([$reserva->cliente_id]);
$cliente = $sentenciaCliente->fetch(PDO::FETCH_OBJ);

// Obtener el nombre del servicio
$sentenciaServicio = $db->prepare("SELECT * FROM servicios WHERE id=?");
$sentenciaServicio->execute([$reserva->servicio_id]);
$servicio = $sentenciaServicio->fetch(PDO::FETCH_OBJ);
?>

<div class="container">
    <br><br>
    <div class="md-5">
        <form action="update.php" method="post" class="form-group">
            <h2>Actualiza el registro</h2>
            <p class="text-primary"><b>Ingresa los datos correspondientes:</b></p>

            <div class="form-row">
                <label for="cliente" class="col-form-label">Cliente:</label>
                <input type="text" name="cliente" class="form-control" value="<?php echo $cliente->nombres; ?>" readonly>
                <input type="hidden" name="cliente_id" value="<?php echo $cliente->id; ?>">
            </div>

            <div class="form-row">
                <label for="servicio" class="col-form-label">Servicio:</label>
                <input type="text" name="servicio" class="form-control" value="<?php echo $servicio->nombre; ?>" readonly>
                <input type="hidden" name="servicio_id" value="<?php echo $servicio->id; ?>">
            </div>

            <div class="form-row">
                <label for="fecha" class="col-form-label">Fecha:</label>
                <input type="date" name="fecha" class="form-control" value="<?php echo $reserva->Fecha; ?>">
            </div>

            <div class="form-row">
                <label for="hora" class="col-form-label">Hora:</label>
                <input type="time" name="hora" class="form-control" value="<?php echo $reserva->hora_inicio; ?>">
            </div>

            <div class="form-row">
                <label for="mensaje" class="col-form-label">Mensaje:</label>
                <input type="text" name="mensaje" class="form-control" value="<?php echo $reserva->MensajeAdicional; ?>">
            </div>

            <div class="form-group">
                <label for="estado">Estado de la cita:</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="<?php echo $reserva->Estado; ?>"><?php echo $reserva->Estado; ?></option>
                    <option value="" disabled>Elige estado de la cita</option>
                    <option value="Confirmado">Confirmado</option>
                    <option value="Cancelado">Cancelado</option>
                    <option value="Pendiente">Pendiente</option>
                </select>
                <kbd>
                    <small class="text-white">(Estado actual: <?php echo $reserva->Estado; ?>)</small>
                </kbd>
            </div>

            <br>
            <input type="hidden" name="id2" value="<?php echo $reserva->ID; ?>">
            <a href="../mod_reservas.php" class="btn btn-warning">Cancelar</a>
            <input type="submit" class="btn btn-success" value="Guardar">
        </form>
    </div>
</div>

<?php include("../../footer.php"); ?>