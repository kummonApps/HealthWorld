<!DOCTYPE html>
<html lang="es">
<?php
require('conexion.php');
?>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Health World - Buscador</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!--  Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
   <!-- ======= Header logfejat ======= -->
<header id="header" >
  <div class="container d-flex align-items-center">
    <a href="Esperfil_doctor.php">
    <img class="me-auto" src="assets/img/logo_wh.jpg" width="300">
    </a>
    <!-- <h1 class="logo me-auto"><a href="index.html"><img src="assets/img/logo_wh.jpg"></a></h1> -->
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0" style="padding-left: 350px;">
      <ul>
        <li><a class="nav-link scrollto" href="Esperfil_doctor.php">Perfil</a> </li>
        <li><a class="nav-link scrollto" href="Esinformacion.html">Información</a></li>
        <li><a class="nav-link scrollto active" href="Esbuscador.php">Buscar Medicamentos</a></li>
        <li><a class="nav-link scrollto" href="Espregunta1.html">I.A.</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    <ul><li style="display: none;"><a class="nav-link scrollto" style="display: none;"></a></li>
    </ul>
    <a href="Esindex.html"><span class="">Cerrar sesión</span></a>

  </div>
</header><!-- End Header -->
  <br>
  <div class="card offset-lg-1 col-lg-10">
    <div class="card-body">
      <form action="Esresultado.php" method="post">
      <div class="section-title">
            <h2>BUSQUEDA DE MEDICAMENTOS</h2>
            <p>Encuentre aquí el medicamiento adecuado</p>
          </div>
        </div>
        <div align="center" class="text-center">
          <h4>Medicamentos</h4>
          <input class="col-3" type="text" name="medicamentos" placeholder="Introduzca el nombre de medicamento">
          <br>
          <br>
          <h4>Efectos secundarios</h4>
          <select class="col-3 custom-select" name="efectos-secundarios">
          <option value="">Selecciona un efecto secundario</option>
            <?php
            $conexion = mysqli_query($enlace, "SELECT DISTINCT * FROM EFECTES_SECUNDARIS GROUP BY descripcio");
            while ($row = $conexion->fetch_assoc()) {
              echo "<option value=" . $row['id_medicament'] . ">" . $row['descripcio'] . "</option>";
            }
            ?>
          </select>

          <br>
          <br>

          <h4>Patología</h4>
          <select class="col-3 custom-select" name="patologia">
          <option value="">Selecciona un patologia</option>
            <?php
            $conexion = mysqli_query($enlace, "SELECT DISTINCT * FROM PATOLOGIA GROUP BY descripcio");
            while ($row = $conexion->fetch_assoc()) {
              echo "<option value=" . $row['id_medicament'] . ">" . $row['descripcio'] . "</option>";
            }
            ?>
          </select>

          <br>
          <br>
          <h4>Laboratorio</h4>
          <select class="col-3 custom-select" name="laboratorio">
          <option value="">Selecciona un laboratorio</option>
            <?php
            $conexion = mysqli_query($enlace, "SELECT DISTINCT * FROM LABORATORI GROUP BY descripcio");
            while ($row = $conexion->fetch_assoc()) {
              echo "<option value=" . $row['id_medicament'] . ">" . $row['nom'] . "</option>";
            }
            ?>
          </select>

          <br>
          <br>
          <h4>Forma Farmacéutica</h4>
          <select class="col-3 custom-select" name="forma-farmaceutica">
          <option value="">Selecciona una forma farmacéutica</option>
            <?php
            $conexion = mysqli_query($enlace, "SELECT * FROM FORMA_FARMACEUTICA GROUP BY descripcio");
            while ($row = $conexion->fetch_assoc()) {
              echo "<option value=" . $row['id_medicament'] . ">" . $row['descripcio'] . "</option>";
            }
            ?>
          </select>
          <br>
          <br>
          <input class="appointment-btn scrollto" type="submit" value="Buscar">
          <br>
          <br>

        </div>
      </div>
    </form>

  </div>

</body>
<!-- Footer -->
<footer>
  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright 2021 <strong><span>Health World</span></strong>. <br>All Rights Reserved
        Designed by <a href="https://kummonapps.github.io/Castellano.html">KummonApps</a>
      </div>
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>
  </div>
</footer><!-- End Footer -->

</html>