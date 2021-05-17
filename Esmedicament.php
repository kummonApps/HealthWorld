<?php

@session_start();
$nickLog=$_SESSION["nick_logueado"];

header("Content-Type: text/html;charset=utf-8");

	$servidor="localhost";
	$usuario="root";
	$contraseña="usbw";
	$bd="kummonapps";	

	$conexion = mysqli_connect($servidor, $usuario, $contraseña, $bd) or die(mysqli_connect_error());
	
	if (!$conexion)
	{
		die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
	}
	else
	{
		mysqli_set_charset ($conexion, "utf8");
		//echo "Se ha conectado a la base de datos" . "<br>";
  }
$id = $_POST['medicament'];
$instruccion = "select * from medicaments where id_medicament = ".$id."";
$resultados = mysqli_query($conexion, $instruccion);
$fila=mysqli_fetch_row($resultados);

$instruccion = "select * from forma_farmaceutica where id_medicament = ".$id."";
$resultados = mysqli_query($conexion, $instruccion);
$fila1=mysqli_fetch_row($resultados);

$instruccion = "select * from efectes_secundaris where id_medicament = ".$id."";
$resultados = mysqli_query($conexion, $instruccion);
$fila2=mysqli_fetch_row($resultados);

$instruccion = "select * from laboratori where id_medicament = ".$id."";
$resultados = mysqli_query($conexion, $instruccion);
$fila3=mysqli_fetch_row($resultados);

$instruccion = "select * from simptomatologia where id_medicament = ".$id."";
$resultados = mysqli_query($conexion, $instruccion);
$fila4=mysqli_fetch_row($resultados);


?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Health World I.A.</title>
  
  <!--  Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css?1" rel="stylesheet">
  <link href="assets/css/resultado.css?1" rel="stylesheet">

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

       <?php 
            echo("
            <div class='section-title'> 
              <h2 align='center'>" .$fila[2] ."</h2> 
            </div>
            ");
        ?>


</div>
  <div class="row">
    <div class="card offset-md-4 col-md-2" style="width: 18rem;">
      <img src="assets/img/asma/lupa.jpg" target="_blank" class="card-img-top" onclick="window.open(this.src);">
    </div>
    <div class="card col-md-2" style="width: 18rem;">
      <img src="assets/img/asma/diagnostic.jpg" target="_blank" class="card-img-top" onclick="window.open(this.src);">
    </div>
  </div>
  <br>
    <details>
        <summary id="asmastrong"><strong>Caracteristicas</strong></summary>
        <div class="content">
        <?php 
            echo("<form class='form-inline' action='Esperfil_doctor.php' method = 'GET'>Nombre: " .$fila[2]."<br>Codigo de barras: ". $fila[3] ."</form>");
            
        ?>
        </div>
    </details>
    <details>
        <summary id="asmastrong"><strong>Composición</strong></summary>
        <div class="content">
        <?php 
            echo("<form class='form-inline' action='Esperfil_doctor.php' method = 'GET'>" .$fila[1] ."</form>");
        ?>
      </div>
    </details>
    <details>
        <summary id="asmastrong"><strong>Forma farmaceutica</strong></summary>
        <div class="content">
        <?php 
            echo("<form class='form-inline' action='Esperfil_doctor.php' method = 'GET'>" .$fila1[1] ."</form>");
        ?>         
          </div>
    </details>
    <details>
        <summary id="asmastrong"><strong>Efectos secundarios</strong></summary>
        <div class="content">
        <?php
        $instruccion = "select * from efectes_secundaris where id_medicament = ".$id."";
        $resultados = mysqli_query($conexion, $instruccion);
        while(($fila2 = mysqli_fetch_row($resultados)) == true){
            echo("<form class='form-inline' action='Esperfil_doctor.php' method = 'GET'>- " .$fila2[1]."</form>");
        }
        ?>         
          </div>
    </details>
    <details>
        <summary id="asmastrong"><strong>Laboratorio</strong></summary>
        <div class="content">
        <?php 
            echo("<form class='form-inline' action='Esperfil_doctor.php' method = 'GET'>" .$fila3[2]."<br>".$fila3[1]."</form>");
        ?>         
          </div>
    </details>
    <details>
        <summary id="asmastrong"><strong>Simptomatología</strong></summary>
        <div class="content">
        <?php 
            echo("<form class='form-inline' action='Esperfil_doctor.php' method = 'GET'>" .$fila4[1] ."</form>");
        ?>         
          </div>
    </details>
    <footer>
   <!-- Footer -->

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>Health World</span></strong>. <br>All Rights Reserved
    
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
</body>
</html>