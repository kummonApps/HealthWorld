<?php

error_reporting(0); 

require_once 'BD.php';
$user = "";
$password = "";

$user = $_POST['floatingInput'];
$password = $_POST['floatingPassword'];


//Comprueba si el nombre de usuario ya existe
$userExistSelect = "select count(*) as cuantos from usuari where email = '$user'";
$passwordExistSelect = "select contrasenya from usuari where email = '$user'";
$consultaUserExistSelect = mysqli_query($con, $userExistSelect);
$consultaPasswordExistSelect = mysqli_query($con, $passwordExistSelect);
$resultadoUserExistSelect = mysqli_fetch_assoc($consultaUserExistSelect);
$resultadoPasswordExistSelect = mysqli_fetch_assoc($consultaPasswordExistSelect);

if($resultadoUserExistSelect['cuantos'] == 0){
    echo "<script>alert('ERROR - Username do not exist');</script>";
    include("Inlogin.html");
}
else if($resultadoPasswordExistSelect['contrasenya'] != $password){
    echo "<script>alert('ERROR - Username and password do not match');</script>";
    include("Inlogin.html");
}
else{
    session_start();
    $_SESSION["nick_logueado"] = $user;
    include("Inperfil_doctor.php");
}		

?>