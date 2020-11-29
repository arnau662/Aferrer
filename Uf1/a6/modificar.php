<?php
$con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
session_start();
include("testinput.php");

$errornom="";
$errorpassword="";
$erroremail="";

if (!empty($_POST)){
    $error=false;
        
    $nom = ($_REQUEST['nom']);
    $password = ($_REQUEST['password']);
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

    if(empty($email)){
        $erroremail="el email es obligatori";
        $error=true;
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erroremail = "No es una adreça valida";
        $error=true;
    }
    
    if (!$error){

        $nom = $_REQUEST['nom'];      
        $password = md5($_REQUEST['password']);
        $email = $_REQUEST['email'];
        $id=$_SESSION['id'];

        
        
        $algo = "UPDATE Usuaris SET  id='$id', Nom='$nom', Email='$email', Password='$password' where id='$id'";
        $result = mysqli_query($con,$query);
        if(!$result = $con->query($algo)){
            die("AAAAAAAAAAAAAH".$con->error);
        }

        if($result){
            echo "Te has registrado correctamente";
            header("Location: privada.php");
        }
    }
}
?>