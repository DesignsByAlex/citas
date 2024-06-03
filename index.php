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

      <hr>
      <div class="text-justify">
          <p class="alert alert-warning">Quieres consultar el estatus de tu reserva?, ¿no has recibido el mensaje
            de confirmación o falló el envio?, comunicate con nostros al siguinte número: +57 3122908567.
          </p>
      </div>

    </div>
  </div>
</div>

<?php include "footer.php";?>