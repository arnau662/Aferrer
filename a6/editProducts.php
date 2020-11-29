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
        
        $id=$_SESSION['idProduct'];
        $nom=$_REQUEST['nompro'];
        $descripcio=$_REQUEST['descripciopro'];
        $preu=$_REQUEST['preupro'];
        $idUser=$_SESSION['id'];

        $sql= "UPDATE productes SET id='$id', nom='$nom', descripcio='$descripcio', preu='$preu', usuari_id='$idUser', categoria_id=1 where id='$id'";
        
        if (!$resultado = $con->query($sql)){
            die("error ejecutando el update: ".$con->error);
        }

        $guardado="Guardat correctament!";

        if(!empty($_FILES['imatge'])){
            mkdir("imatges/".$_SESSION['id'], 0777);
            
            $dir_subida="imatges/".$_SESSION['id']."/";
            $fichero_subido=$dir_subida.basename($_FILES['imatge']['name']);

            if(move_uploaded_file($_FILES['imatge']['tmp_name'], $fichero_subido)){
                $nomFoto=$_FILES['imatge']['name'];
                
                $sql="INSERT INTO imatges VALUES (NULL, '$nomFoto', '$fichero_subido', $id)";
                
                if (!$resultado = $con->query($sql)){
                    die("error ejecutando el update: ".$con->error);
                }
                $guardado="Guardat correctament amb imatge!";
                header("location: editProducts.php?$producte2;$guardado");
            }

        }

    }
}

echo "<h1>Productes</h1><br><hr>";

if(isset($_REQUEST['productalgo'])){
    $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(isset($_REQUEST['deleteImatge'])){
        $idImatge=$_REQUEST['deleteImatge'];
        $sql= "DELETE FROM imatges where id='$idImatge'";
    
        if (!$resultado = $con->query($sql)){
            die("error ejecutando la consulta: ".$con->error);
        }
        $deleteImatge=NULL;
        header('Location:'.$_SERVER['PHP_SELF'].'?'.$deleteImatge.';productalgo='.$_SESSION['idProduct'].';');

    }

    $producte2=$_REQUEST['productalgo'];

    $sql= "SELECT * FROM productes where id='$producte2'";
    
    if (!$resultado = $con->query($sql)){
        die("error ejecutando la consulta: ".$con->error);
    }

    while ($producte = $resultado->fetch_assoc()){
        $_SESSION['idProduct'] = $producte['id'];
        $_SESSION['nomProduct'] = $producte['nom'];
        $_SESSION['descripcioProduct'] = $producte['descripcio'];
        $_SESSION['preuProduct'] = $producte['preu'];
    }
    ?>
    <form enctype='multipart/form-data'  method='POST'>
    <span><?php if(!empty($_POST)){echo $guardado;}?></span><br><br>
    Nom producte:     <input type='text' name='nompro' value="<?php if(empty($_POST)){echo "";}else{echo $_REQUEST['nompro'];} ?>"><span class='error'><?if(!empty($_POST)){echo $errornom;}?></span><br><br>
    Descripcio: <input type='text' name='descripciopro' value="<?php if(empty($_POST)){echo $_SESSION['descripcioProduct'];}else{echo $_REQUEST['descripciopro'];} ?>"><span class='error'><?if(!empty($_POST)){echo $errordescripcio;}?></span><br><br>
    Preu:       <input type='text' name='preupro' value="<?php if(empty($_POST)){echo $_SESSION['preuProduct'];}else{echo $_REQUEST['preupro'];} ?>"><span class='error'><?if(!empty($_POST)){echo $errorpreu;}?></span><br><br>
    Afegir imatge: <input type="file" name="imatge"><br><br>
    <input type='submit' value='Guardar els canvis'><br><br>
    Imatges:<br>
    <?php
    $sql= "SELECT * FROM imatges where producte_id='$producte2'";
    if (!$resultado = $con->query($sql)){
        die("error ejecutando la consulta: ".$con->error);
    }

    while ($imatge = $resultado->fetch_assoc()){
        
        /*$imatgeID=$imatge['id'];echo $imatgeID."<br>".$_SESSION['idProducte'];*/
        echo "<img width=\"200px\"  height=\"200px\" src=\"".$imatge['ruta']."\"><a href=\"?productalgo=".$_SESSION['idProduct'].";deleteImatge=".$imatge['id'].";\">Eliminar imatge</a>";
    }
    ?>
    </form><hr><br>
    <?php
}

if(isset($_REQUEST['productalgoDelete'])){

    $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


    $producteDelete=$_REQUEST['productalgoDelete'];
    

    $sql= "DELETE FROM productes where id='$producteDelete'";

    if (!$resultado = $con->query($sql)){
        die("error ejecutando la consulta: ".$con->error);
    }

    $producteDelete=NULL;
    header('Location:'.$_SERVER['PHP_SELF'].'?'.$producteDelete);

    
}

$con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
if (mysqli_connect_error()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id_user=$_SESSION['id'];
$sql= "SELECT * FROM productes where usuari_id='$id_user'";

if (!$resultado = $con->query($sql)){
    die("error ejecutando la consulta: ".$con->error);
}

echo "Productes que tens registrats: ".$resultado->num_rows."<br><br>";

echo "<a href='añadirProduct.php'>Afegir nou producte</a><br><br>";

echo "<table>";

echo "<tr><td style='border: black 1px solid;'>nom</td><td style='border: black 1px solid;'>descripcio</td><td style='border: black 1px solid;'>preu</td></tr>";

if ($resultado->num_rows >= 0){
        while ($producte = $resultado->fetch_assoc()){
            $cont=0;
            $cont++;
            echo "<tr id='".$cont."'>
            <td style='border: black 1px solid;'>".$producte['nom']."</td>
            <td style='border: black 1px solid;'>".$producte['descripcio']."</td>
            <td style='border: black 1px solid;'>".$producte['preu']."€</td>
            <td><a href='?productalgo=".$producte['id']."'>Modificar</a></td>
            <td><a href='?productalgoDelete=".$producte['id']."'>Eliminar</a></td></tr>";
        
    }
}

echo "<table>";
echo "<br><a href='privada.php'>Tornar a la pàgina principal</a>";

}

?>