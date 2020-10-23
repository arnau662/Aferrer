<?php
include("login.php");

$_SESSION["control"]=false;

if($_SESSION["myusuari"]!="arnau" || ($_SESSION["mypassword"]!="pass") || ($_SESSION["myemail"]!="arnauferrergalbe@gmail.com")){
    $error=true;
    header("location:principal.php");  
    
}else{
    $_SESSION["control"]=true;
    header("location:privada.php");
}





?>