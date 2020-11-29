<?php
include("login.php")
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Exemple de sessio</title>

</head>

<body>
<form enctype="multipart/form-data" action="principal.php" method="post" id="myform" name="myform">

    <label>Usuari</label> <input type="text" value="" size="30" maxlenght="100" name="myusuari" id=""><span class="error"><?=$errorusuari;?>
    <br><label>Password</label> <input type="text" value="" size="30" maxlenght="100" name="mypassword" id=""><span class="error"><?=$errorpassword;?></br>
    <br><label>Email</label> <input type="text" value="" size="30" maxlenght="100" name="myemail" id=""><span class="error"><?=$erroremail;?></br>

    <button id="mysubmit" type="submit">Submit</button><br /><br />

</form>
</body>