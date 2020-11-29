<?php
session_start();
include("testinput.php");

$errorusuari="";
$errorpassword="";
$erroremail="";
$error=false;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $myusuari = test_input($_REQUEST["myusuari"]);
    $mypassword = test_input($_REQUEST["mypassword"]);
    $myemail = test_input($_REQUEST["myemail"]);

    if(empty($myusuari)){
        $errorusuari="El nom és obligatori";
        $error=true;
    }

    if(empty($mypassword)){
        $errorpassword="La contrasenya es óbligatoria";
        $error=true;
    }else if (!preg_match("/^[a-z0-9]*$/",$mypassword)){
        $errorpassword = "Nomes lletras i numeros";
        $error=true;
    }

    if(empty($myemail)){
        $erroremail="el email es obligatori";
        $error=true;
    }else if (!filter_var($myemail, FILTER_VALIDATE_EMAIL)){
        $erroremail = "No es una adreça valida";
        $error=true;
    }

    if(!$error){
        $_SESSION['myusuari'] = $_REQUEST['myusuari'];
        $_SESSION['mypassword'] = $_REQUEST['mypassword'];
        $_SESSION['myemail'] = $_REQUEST['myemail'];
        header("location:controlog.php");
    }
    

}
?>

