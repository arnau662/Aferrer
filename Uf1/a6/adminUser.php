<?php
session_start();

if (empty($_SESSION['log'])){
    header("Location: principal.php");
}else{
    include("testinput.php");



if (!empty($_POST)){
    $errornom="";
    $erroremail="";
    $errorpassword="";
    $errorpassword2="";

    $nom1 = test_input($_REQUEST['noma']);
    $email1 = test_input($_REQUEST['emaila']);
    $password1 = test_input($_REQUEST['passworda']);
    $password21 = test_input($_REQUEST['password2a']);
    $error=false;

    if(empty($nom1)){
        $errornom = " El nom es obligatori";
        $error=true;
    }else if (!preg_match("/^[a-zA-Z-' ]*$/",$nom1)) {
        $errornom = " Nomes es permet lletres i espais en blanc";
        $error=true;
    }

    if(empty($email1)){
        $erroremail = " El correu es obligatori";
        $error=true;
    }else if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
        $erroremail = " Format incorrecte";
        $error=true;
    }else if ($error==false && $_SESSION['emailM']!=$email1){
        $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
        if (mysqli_connect_error()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $sqla= "SELECT * FROM Usuaris where email='$email1'";
        
        if (!$resultado = $con->query($sqla)){
            echo $sqla;
            $error=true;
        }

        if ($resultado->num_rows > 0){

            $erroremail = " Aquest correu ja esta registrat";
            $error=true;
        }
    }

    if(empty($password1)){
        $errorpassword = " La contrasenya es obligatoria";
        $error=true;
    }else if (!preg_match("/^[a-zA-Z0-9]*$/",$password1)) {
        $errorpassword = " Contrasenya incorrecte";
        $error=true;
    }

    if(empty($password21)){
        $errorpassword2 = " Repetir la contrasenya es obligatori";
        $error=true;
    }else if ($password1!=$password21) {
        $errorpassword2 = " No coincideix amb la contrasenya";
        $error=true;
    }

    if ($error==false){
        $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
        if (mysqli_connect_error()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }


        $id=$_SESSION['idM'];
        $nom=$_REQUEST['noma'];
        $email=$_REQUEST['emaila'];
        $password=md5($_REQUEST['passworda']);

        $sql= "UPDATE Usuaris SET id='$id', nom='$nom', email='$email', password='$password'  where id='$id'";

        if (!$resultado = $con->query($sql)){
            die("error ejecutando el update: ".$con->error);
        }

        $guardar="Guardat";
    }
}

echo"<h1>Panell de admin</h1><br><hr>";

if(isset($_REQUEST['emailalgo'])){
    $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $email2=$_REQUEST['emailalgo'];

    $sql= "SELECT * FROM Usuaris where email='$email2'";

    if (!$resultado = $con->query($sql)){
        die("error ejecutando la consulta: ".$con->error);
    }
    while ($user = $resultado->fetch_assoc()){
        $_SESSION['idM'] = $user['id'];
        $_SESSION['nomM'] = $user['Nom'];
        $_SESSION['emailM'] = $user['Email'];
        $_SESSION['passwordM'] = $user['Password'];
    }
    ?>
    <form method='POST'>
    <span><?php if(!empty($_POST)){echo $guardar;}?></span><br><br>
    Nom d'usuari:     <input type='text' name='noma' value="<?php if(empty($_POST)){echo $_SESSION['nomM'];}else{echo $_REQUEST['noma'];} ?>"><span class='error'><?php if(!empty($_POST)){echo $errornom;}?></span><br><br>
    Correu electronic: <input type='text' name='emaila' value="<?php if(empty($_POST)){echo $_SESSION['emailM'];}else{echo $_REQUEST['emaila'];} ?>"><span class='error'><?php if(!empty($_POST)){echo $erroremail;}?></span><br><br>
    Contrasenya:       <input type='text' name='passworda' value="<?php if(empty($_POST)){echo $_SESSION['passwordM'];}else{echo $_REQUEST['passworda'];} ?>"><span class='error'><?php if(!empty($_POST)){echo $errorpassword;}?></span><br><br>
    Torna a escriure la contrasenya:       <input type='text' name='password2a' value="<?php if(empty($_POST)){echo $_SESSION['passwordM'];}else{echo $_REQUEST['password2a'];} ?>"><span class='error'><?php if(!empty($_POST)){echo $errorpassword2;}?></span><br><br>
    <input type='submit' value='Guardar els canvis'>
    </form><hr><br>
    <?php

}

if(isset($_REQUEST['emailalgoDelete'])){
    $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $emailDelete=$_REQUEST['emailalgoDelete'];

    $sql= "DELETE FROM Usuaris where email='$emailDelete'";

    if (!$resultado = $con->query($sql)){
        die("error ejecutando la consulta: ".$con->error);
    }

    $emailDelete=NULL;
    header('Location:'.$_SERVER['PHP_SELF'].'?'.$emailDelete);

}

$con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
if (mysqli_connect_error()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql= "SELECT * FROM Usuaris";

if (!$resultado = $con->query($sql)){
    die("error ejecutando la consulta: ".$con->error);
}


echo "<a href='signup.php'>Crear usuari</a><br><br>";

echo "<table>";

echo "<tr><td style='border: black 1px solid;'>id</td><td style='border: black 1px solid;'>nom</td><td style='border: black 1px solid;'>email</td><td style='border: black 1px solid;'>password</td></tr>";




if ($resultado->num_rows >= 0){
    while ($user = $resultado->fetch_assoc()){
        $cont=0;
        $cont++;
        echo "<tr id='".$cont."'><td style='border: black 1px solid;'>".$user['ID']."</td>
            <td style='border: black 1px solid;'>".$user['Nom']."</td>
            <td style='border: black 1px solid;'>".$user['Email']."</td>
            <td style='border: black 1px solid;'>".$user['Password']." </td>
            <td><a href='?emailalgo=".$user['Email']."'>Modificar</a></td>
            <td><a href='?emailalgoDelete=".$user['Email']."'>Eliminar</a></td></tr>";
    }
}


echo "<table>";
echo "<br><a href='index.php'>Tornar al inici</a>";
}

?>

