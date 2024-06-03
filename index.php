<?php 
include "header.php";
include "navbar.php";
?>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4 text-center">
      <h2>MASAJES PEPITA</h2>
      <img src="img/logoP.jpg" class="rounded mx-auto d-block border" width="80%" alt="...">
      <p>Informacion:</p>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href="mediosContacto.php">Medios de contacto</a>
        </li>
      </ul>
    </div>

    <div class="col-sm-8">

      <?php 
        include "modal_reserva.php";
      ?>

      <!-- Boton Registrar Cliente -->
      <div class="text-center mt-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistrarCliente">
          <i class="fas fa-user-plus"></i> Registrar Cliente
        </button>
      </div>

      <hr>
      <div class="text-justify">
          <p class="alert alert-warning">Quieres consultar el estatus de tu reserva?, ¿no has recibido el mensaje
            de confirmación o falló el envio?, comunicate con nostros al siguinte número: +57 3122908567.
          </p>
      </div>

    </div>
  </div>
</div>

<!-- Modal Registrar Cliente -->
<div class="modal fade" id="modalRegistrarCliente" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarClienteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRegistrarClienteLabel">Registrar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="procesar_registro_cliente.php" method="post">
          <div class="form-group">
            <label for="nombres">Nombres *</label>
            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese los nombres" required>
          </div>
          <div class="form-group">
            <label for="celular">Celular *</label>
            <input type="tel" class="form-control" id="celular" name="celular" placeholder="Ingrese el número de celular" required>
          </div>
          <div class="form-group">
            <label for="cedula">Número de Cédula *</label>
            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese el número de cédula" required>
          </div>
          <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento *</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
          </div>

          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php";?>
