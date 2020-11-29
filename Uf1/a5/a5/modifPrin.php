<?php
include("modificar.php");


if (empty($_SESSION['log'])){
    header("Location: principal.php");
}else{

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Exemple de sessio</title>

</head>

<body>
<h1>Update</h1>
<form name="registration" action="" method="post">
<input type="text" name="nom" placeholder="nom"  />
<input type="email" name="email" placeholder="email" />
<input type="password" name="password" placeholder="password"  />
<input type="submit" name="submit" value="Register" />
</form>
</body>

<?php
}
?>