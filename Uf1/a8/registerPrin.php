<?php
include("register.php")
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Exemple de sessio</title>

</head>

<body>
<h1>Registrar</h1>
<form name="registration" action="" method="post">
<input type="text" name="nom" placeholder="nom"  />
<input type="email" name="email" placeholder="email" />
<input type="password" name="password" placeholder="password"  />
<input type="password" name="password2" placeholder="repetir password"  />
<input type="submit" name="submit" value="Register" />
<p>Un cop registrat t'enviara automaticament a fer el login</p>
<a href="principal.php">Login</a>
</form>
</body>