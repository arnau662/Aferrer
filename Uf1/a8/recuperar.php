<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}

if(!empty($_POST)){

    $username=$_POST['username'];

    $codi=generarCodigo(10);

    echo $codi;

    $con = mysqli_connect("localhost","aferrer","aferrer","aferrer_a5");
    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql= "INSERT INTO recovery values ('".$codi."','".$_POST["username"]."')";

    if (!$resultado = $con->query($sql)){
        die("error ejecutando la consulta: ".$con->error);
    }


    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'aferrerg@fp.insjoaquimmir.cat';                     // SMTP username
        $mail->Password   = 'aferrerg2020';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('aferrerg@fp.insjoaquimmir.cat', 'Mailer');
        $mail->addAddress($username, 'Arnau Ferrer');     // Add a recipient
        $mail->addReplyTo('noreply@xtec.cat', 'Information');

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'PASSWORD RECOVERY';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b><br><a href="http://dawjavi.insjoaquimmir.cat/aferrer/Uf1/a8/changepass.php?codi='.$codi.'">clica aqui para cambiar password</a>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'El correu s\'ha enviat';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="recuperar.php" method="post">
    Email: <input type="text" name="username" id=""><br>
    <input type="submit" value="Recuperar">
    </form>
</body>
</html>

<?php
}
?>