<?php
session_start();

if (empty($_SESSION['log'])){
    header("Location: principal.php");
}else{

?>

Privada 1

<?php if ($_SESSION['id_rol']==1){ 
    ?>
        <a href="adminUser.php">Administrar els usuaris de la base de dades</a><br><br>
    <?php
    }
    ?>

<a href="logout.php">Logout</a>

<a href="modifPrin.php">Modificad dades</a>

<?php
}
?>