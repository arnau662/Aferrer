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
<h1>Log In</h1>
<form action="principal.php" method="post" name="login">
<input type="text" name="nom" placeholder="nom" required />
<input type="email" name="email" placeholder="email" required/>
<input type="password" name="password" placeholder="password"  required/>
<input name="submit" type="submit" value="Login" />
</form>
<a href='registerPrin.php'>Register Here</a>


</body>
</html>