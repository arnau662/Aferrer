<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_REQUEST["mytext"])){
        echo"Text: ";
        print_r($_REQUEST["mytext"]);
        echo "<br></br>";
    }

    if(isset($_REQUEST["myradio"])){
        echo"Myradio: ";
        print_r($_REQUEST["myradio"]);
        echo "<br></br>";
    }

    if(isset($_REQUEST["mycheckbox"])){
        echo"MyCheckBox: ";
        print_r($_REQUEST["mycheckbox"]);
        echo "<br></br>";
    }
    if(isset($_REQUEST["myselect"])){
        echo"MySelect: ";
        print_r($_REQUEST["myselect"]);
        echo "<br></br>";
    }
    if(isset($_REQUEST["mytextarea"])){
        echo"TextArea: ";
        print_r($_REQUEST["mytextarea"]);
        echo "<br></br>";
    }
    $dir_subida = 'imatges/';
    $fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);
    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)){
        echo "<img src=\"$fichero_subido\"/img>";
    }else{
        echo "no ok";
    }
}else{
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Exemple de formulari</title>

</head>

<body>
<form enctype="multipart/form-data" action="formularis.php" method="post" id="myform" name="myform">
<div style="margin: 30px 10%;">
<h3>My form</h3>
1
    <label>Text</label> <input type="text" value="" size="30" maxlength="100" name="mytext" id="" /><br /><br />

    <input type="radio" name="myradio" value="1" /> First radio
    <input type="radio" checked="checked" name="myradio" value="2" /> Second radio<br /><br />

    <input type="checkbox" name="mycheckbox[]" value="1" /> First checkbox
    <input type="checkbox" checked="checked" name="mycheckbox[]" value="2" /> Second checkbox<br /><br />

    <label>Select ... </label>
    <select name="myselect" id="">
        <optgroup label="group 1">
            <option value="1" selected="selected">item one</option>
        </optgroup>
        <optgroup label="group 2" >
            <option value="2">item two</option>
        </optgroup>
    </select><br /><br />

    <textarea name="mytextarea" id="" rows="3" cols="30">
Text area
    </textarea> <br /><br />
    <label>Archivo</label> <input type="file" name="archivo"/>
    <button id="mysubmit" type="submit">Submit</button><br /><br />

</form>
</div>

</body>
</html>

<?php
}
?>