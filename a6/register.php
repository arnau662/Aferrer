<?php
$con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
session_start();
include("testinput.php");

$errornom="";
$errorpassword="";
$errorpassword2="";
$erroremail="";

if (isset($_POST['nom'])){
    $error=false;
        
    $nom = ($_REQUEST['nom']);
    $password = ($_REQUEST['password']);
    $password2 = ($_REQUEST['password2']);
    $email = ($_REQUEST['email']);

    if(empty($nom)){
        $errornom="El nom és obligatori";
        $error=true;
    }
    

    if(empty($password)){
        $errorpassword="La contrasenya es óbligatoria";
        $error=true;
    }else if (!preg_match("/^[a-z0-9]*$/",$password)){
        $errorpassword = "Nomes lletras i numeros";
        $error=true;
    }

    if(empty($password2)){
        $errorpassword2 = " Repetir la contrasenya es obligatori";
        $error=true;
    }else if ($password!=$password2) {
        $errorpassword2 = " No coincideix amb la contrasenya";
        $error=true;
    }

    if(empty($email)){
        $erroremail="el email es obligatori";
        $error=true;
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erroremail = "No es una adreça valida";
        $error=true;
    }
    
    if (!$error){

        $nom = ($_REQUEST['nom']);      
        $password = md5($_REQUEST['password']);
        $email = ($_REQUEST['email']);
        
        $query = "INSERT into Usuaris VALUES (NULL, '$nom', '$email', '$password',2)";
        $result = mysqli_query($con,$query);
        if($result){
            echo "Te has registrado correctamente";
            header("Location: principal.php");
        }

        if($_SESSION['id_rol']==1){
            header('location: adminUsers.php');
        }else{
            header('location: login.php');
        }
    }
}
?>