<?php
session_start();


if (empty($_SESSION['log'])){

    header("Location: principal.php");

}else{
    include("testinput.php");



if (!empty($_POST)){

    
    $errornom="";
    $errordescripcio="";
    $errorpreu="";
        
    $nompro = test_input($_REQUEST['nompro']);
    $descripciopro = test_input($_REQUEST['descripciopro']);
    $preupro = test_input($_REQUEST['preupro']);
    $error=false;

    if(empty($nompro)){
        $errornom = " El nom es obligatori";
        $error=true;
    }

    if(empty($descripciopro)){
        $errordescripcio = " Descriu: ";
        $error=true;
    }

    if(empty($preupro)){
        $errorpreu = " El preu es obligatori";
        $error=true;
    }else if (!preg_match("/^[0-9]*$/",$preupro)) {
        $errorpreu = " Nomes pots utilitzar caracters del 0 al 9.";
        $error=true;
    }
    if ($error==false){

        $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
        if (mysqli_connect_error()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $nom=$_REQUEST['nompro'];
        $descripcio=$_REQUEST['descripciopro'];
        $preu=$_REQUEST['preupro'];
        $idUser=$_SESSION['id'];

        $sql= "INSERT INTO productes VALUES (NULL, '$nom', '$descripcio', '$preu', '$idUser', 1)";

        if (!$resultado = $con->query($sql)){
            die("error en el update: ".$con->error);
        }

        header("Location: editProducts.php");

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arnau Ferrer</title>
</head>
<body>

    <h1>Añadir producte</h1>
    <form method="POST">
        Nom producte:     <input type='text' name='nompro' value="<?php if(empty($_POST)){echo "";}else{echo $_REQUEST['nompro'];} ?>"><span class='error'><?if(!empty($_POST)){echo $errornom;}?></span><br><br>
        Descripcio: <input type='text' name='descripciopro' value="<?php if(empty($_POST)){echo "";}else{echo $_REQUEST['descripciopro'];} ?>"><span class='error'><?if(!empty($_POST)){echo $errordescripcio;}?></span><br><br>
        Preu:       <input type='text' name='preupro' value="<?php if(empty($_POST)){echo "";}else{echo $_REQUEST['preupro'];} ?>"><span class='error'><?if(!empty($_POST)){echo $errorpreu;}?></span><br><br>
        <input type='submit' value='Registrar'>
        <a href="<?=$_SERVER['HTTP_REFERER']?>">Tornar</a>
    </form>
</body>
<html>

<?php
}
?>