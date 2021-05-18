<!DOCTYPE html>
<html lang="es">
<?php
require_once('conexion.php');
?>
<?php
error_reporting(0); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicamentos = $_POST['medicamentos'];
    $efectossecundarios = $_POST['efectos-secundarios'];
    $patologia = $_POST['patologia'];
    $laboratorio = $_POST['laboratorio'];
    $formafarmaceutica = $_POST['forma-farmaceutica'];
}
$instruccion = "select id_medicament, nom from medicaments where id_medicament = '" . $efectossecundarios . "' and id_medicament = '" . $patologia . "' and id_medicament = '" . $laboratorio . "' and id_medicament = '" . $formafarmaceutica . "'";
$resultados = mysqli_query($enlace, $instruccion);
//$fila = mysqli_fetch_row($resultados);
?>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Health World - Result</title>
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
<header id="header">
    <div class="container d-flex align-items-center">
      <a href="Inperfil_doctor.php">
        <img class="me-auto" src="assets/img/logo_wh.jpg" width="300">
      </a>

      <nav id="navbar" class="navbar order-last order-lg-0" style="padding-left: 350px;">
        <ul>
          <li><a class="nav-link scrollto active" href="Inperfil_doctor.php">Profile</a> </li>

          <li><a class="nav-link scrollto" href="Ininformacion.html">Information</a></li>
          <li><a class="nav-link scrollto" href="Inbuscador.php">Search Medication</a></li>

          <li><a class="nav-link scrollto" href="Inpregunta1.html">A.I.</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <ul>
        <li style="display: none;"><a class="nav-link scrollto" style="display: none;"></a></li>
      </ul>
      <a href="Inindex.html"><span class=" ">Log Out</span></a>

    </div>
  </header><!-- End Header -->
    <br>
    <div class="card offset-lg-1 col-lg-10">
        <div class="card-body">
            <div class="section-title">
                <h2>SEARCH RESULTS</h2>
                <p>These are the medicines that match the selected criteria</p>
            </div>
            <div class="mt-3">
                <?php
                if ($medicamentos != ""){
                    $instruccion = "select * from medicaments where nom LIKE '%".$medicamentos."%'";             
                    $resultados = mysqli_query($enlace, $instruccion);
                }
                else{
                    if (($medicamentos == "") && ($efectossecundarios == "") && ($patologia == "") && ($laboratorio == "") && ($formafarmaceutica == "")) {
                        $instruccion = "select * from medicaments";
                        $resultados = mysqli_query($enlace, $instruccion);
                    }
                
                    else{
                        if ($efectossecundarios == ""){
                            $instruccion = "select * from medicaments where id_medicament = '" . $patologia . "' and id_medicament = '" . $laboratorio . "' and id_medicament = '" . $formafarmaceutica . "'";
                            $resultados = mysqli_query($enlace, $instruccion);
                            if ($patologia == ""){
                                $instruccion = "select * from medicaments where id_medicament = '" . $laboratorio . "' and id_medicament = '" . $formafarmaceutica . "'";
                                $resultados = mysqli_query($enlace, $instruccion);
                                if ($laboratorio == ""){
                                    if($formafarmaceutica == 1 || $formafarmaceutica == 2 || $formafarmaceutica == 3 || $formafarmaceutica == 4 ){
                                        $instruccion = "select * from medicaments where id_medicament != 5";
                                        $resultados = mysqli_query($enlace, $instruccion);
                                    }
                                    else{
                                        $instruccion = "select * from medicaments where id_medicament = 5";
                                        $resultados = mysqli_query($enlace, $instruccion);
                                    }                           
                                }
                                else if($formafarmaceutica == ""){
                                    if($laboratorio == 1 || $laboratorio == 2){
                                        $instruccion = "select * from medicaments where id_medicament = 1 OR id_medicament = 2";
                                        $resultados = mysqli_query($enlace, $instruccion);
                                    }
                                    else{
                                        $instruccion = "select * from medicaments where id_medicament = '" . $laboratorio . "'";
                                        $resultados = mysqli_query($enlace, $instruccion);
                                    }
                                }
                            }
                        }
                    }
                }
                // if($resultados == false){
                //     echo "<p align='center'>No hay medicamentos que coincidan con los criterios de busqueda.</p>";
                // }
                while (($fila = mysqli_fetch_row($resultados)) == true) {
                    echo
                    "<tr>
                        <hr>
                        <form action='Inmedicament.php' method='post'>
                        <button name='medicament' class='appointment-btn scrollto mr-4' type='submit' value=" . $fila[0] . ">Consult</button>
                        <td>" . $fila[2] . "</td>                       
                        </form>
                        <br>            
                    </tr>";
                }                
                ?>
                <hr>
            </div>
        </div>
    </div>
    <br>
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