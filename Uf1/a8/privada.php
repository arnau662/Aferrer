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

<a href="modifPrin.php">Modificad dades</a><br><br>
<a href="logout.php">Logout</a><br><br>

<h2>Productes</h2>



<a href="añadirProduct.php">Añadir producto</a><br><br>

<a href="editProducts.php">Editar producte</a><br><br>

<form method="post">
    <input type="text" name="buscador" placeholder="Que buscas?"><button type="submit" value="Buscar">Buscar</button>&nbsp;&nbsp;<a href="?$_REQUEST['buscador']=null">Mostra</a>
</form>
<br>


<?php

if(!empty($_POST)){
    $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $clau=$_REQUEST['buscador'];
    $sql= "SELECT * FROM productes where nom like '%$clau%' or descripcio like '%$clau%'";

    if (!$resultado = $con->query($sql)){
        die("error ejecutando la consulta: ".$con->error);
    }

    echo "<table>";

    echo "<tr><td style='border: black 1px solid;'>nom</td><td style='border: black 1px solid;'>descripcio</td><td style='border: black 1px solid;'>preu</td></tr>";
    
    if ($resultado->num_rows >= 0){
        while ($producto = $resultado->fetch_assoc()){
            $product=$producto['id'];

            $sqlp= "SELECT * FROM imatges where producte_id='$product'";

            if (!$resul = $con->query($sqlp)){
                die("error ejecutando la consulta: ".$con->error);
            }
            $cont=0;
            $cont++;
            echo "<tr id='".$cont."'>
            <td style='border: black 1px solid;'>".$producto['nom']."</td>
            <td style='border: black 1px solid;'>".$producto['descripcio']."</td>
            <td style='border: black 1px solid;'>".$producto['preu']." </td></tr>";
                    

            echo '<tr>';
            while ($imatge = $resul->fetch_assoc()){
                
                echo "<td><img width=\"200px\"  height=\"200px\" src=\"".$imatge['ruta']."\"></td>";
            }
            echo '</tr>';
        }
    }
    echo "<table>";
}else{
    $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $sql= "SELECT * FROM productes";
    if (!$resultado = $con->query($sql)){
        die("error ejecutando la consulta: ".$con->error);
    }

    echo "<table>";

    echo "<tr><td style='border: black 1px solid;'>nom</td><td style='border: black 1px solid;'>descripcio</td><td style='border: black 1px solid;'>preu</td></tr>";

    if ($resultado->num_rows >= 0){
        while ($producto = $resultado->fetch_assoc()){
            $product=$producto['id'];

            $sqlp= "SELECT * FROM imatges where producte_id='$product'";

            if (!$resul = $con->query($sqlp)){
                die("error ejecutando la consulta: ".$con->error);
            }
            $cont=0;
            $cont++;
            echo "<tr id='".$cont."'>
            <td style='border: black 1px solid;'>".$producto['nom']."</td>
            <td style='border: black 1px solid;'>".$producto['descripcio']."</td>
            <td style='border: black 1px solid;'>".$producto['preu']." </td></tr>";
            
            echo '<tr>';
            while ($imatge = $resul->fetch_assoc()){
                
                echo "<td><img width=\"200px\"  height=\"200px\" src=\"".$imatge['ruta']."\"></td>";
            }
            echo '</tr>';
        }
    }

    echo "<table>";
}
?>



<?php
}
?>