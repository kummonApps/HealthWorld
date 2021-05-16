<?php

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
    echo "<script>alert('ERROR - El usuario no existe');</script>";
    include("Eslogin.html");
}
else if($resultadoPasswordExistSelect['contrasenya'] != $password){
    echo "<script>alert('ERROR - El usuario y la contraseña no coinciden');</script>";
    include("Eslogin.html");
}
else{
    session_start();
    $_SESSION["nick_logueado"] = $user;
    include("Esperfil_doctor.php");
}		

?>