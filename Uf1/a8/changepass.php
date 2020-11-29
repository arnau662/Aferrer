<?php

if(!empty($_POST)){

    $codi=$_POST['codi'];
    $password=md5($_POST['p1']);
    $usuariacanviar="";

    $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql= "select Email from recovery inner join Usuaris on Usuaris.Email=recovery.username where recovery.codi='".$codi."'";

    
    if (!$resultado = $con->query($sql)){
        die("error ejecutando la consulta: ".$con->error);
    }

    if ($resultado->num_rows > 0){
        if ($usuari = $resultado->fetch_assoc()){
            $usuariacanviar = $usuari['Email'];
            $sql= "UPDATE Usuaris SET Password='$password'  where Email='$usuariacanviar'";
            if (!$resultado = $con->query($sql)){
                die("error ejecutando la consulta: ".$con->error);
            }
            echo "Contrasenya canviada.";
            echo "<br><a href='privada.php'>Tornar</a>";
        }
    }else{
        echo "Error";
    }

}else{

    $codi=$_GET['codi'];

    //echo $codi;

    $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql= "select Email from recovery inner join Usuaris on Usuaris.Email=recovery.username where recovery.codi='".$codi."'";

    
    
    if (!$resultado = $con->query($sql)){
        die("error ejecutando la consulta: ".$con->error);
    }

    if ($resultado->num_rows > 0){
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="changepass.php" method="post">
                Nova contrasenya: <input type="password" name="p1" id=""><br>
                <input type="hidden" name="codi" value="<?=$codi?>"><br>
                <input type="submit" value="Canviar">
            </form>
        </body>
        </html>
<?php
    }else{
        echo "Error";
    }
}

?>