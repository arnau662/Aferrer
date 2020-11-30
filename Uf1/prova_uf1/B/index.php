<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "funcions.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_REQUEST["login"])) {
            iniciar_sesion($_REQUEST["user"], $_REQUEST["password"], $_REQUEST["nom"]);
        }

        if (isset($_REQUEST["recuperar"])) {
            header("Location: recuperar.php");
        }
    }
    
?>
<form method="post">
    <label>Nom: </label><input type="text" name="nom">
    <label>Email: </label><input type="text" name="user">
    <label>Password: </label><input type="password" name="password">
    <button type="submit" name="login" value="si">Login</button>
</form>
<?php
    $a = rand(0, 9);
    $b = rand(0, 9);
    echo "<p>". $a . "</p>";
    echo "<p>+</p>";
    echo "<p>". $b . "</p>";
    $c = ($a + $b);
?>
<form method="post">
    <label>Resposta: </label><input type="text" name="suma">
    <label>Recuperar password: </label><button type="submit" name="recuperar" value="si">Recuperar</button>
</form>
</body>
</html>