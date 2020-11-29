<?php
session_start();

if($_SESSION["control"]==false){
    header("Location:principal.php");
}else{
?>

Privada 1

<a href="logout.php">Logout</a>

<?php
}
?>