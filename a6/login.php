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

if (isset($_POST['nom'])){
    
    $error=false;

    $nom = ($_REQUEST['nom']);      
    $password = md5($_REQUEST['password']);
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

        $query = "SELECT * FROM Usuaris WHERE nom='$nom' and password='$password' and email='$email'";
        $result = mysqli_query($con,$query);   
    
        if(!empty($result) && mysqli_num_rows($result) > 0){
            while ($user = $result->fetch_assoc()){
                $id = $user['id'];
                $id_rol = $user['id_rol'];
            }
            $_SESSION['log'] = true;
            $_SESSION['nom'] = $nom;
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['id_rol'] = $id_rol;
            header("Location: privada.php");
        }else{
            echo "Usario no valido";
        }
    }
}
?>