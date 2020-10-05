<!DOCTYPE html>
<html>
<body>

<?php
$cont = 0;
$cont2 = 0;
while ($cont <= 1000){
    if ($cont2 != 50){
        echo "M'agrada programar en PHP<br>";
        $cont+=1;
        $cont2+=1;
    }else{
        echo "M'agrada programar en PHP<br><br>";
        $cont2=0 ; 
	}
}

?> 

</body>
</html>
