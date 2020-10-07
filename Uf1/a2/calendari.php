 
<!DOCTYPE html>
<html>
<body>

<?php
$mes=date("n");
$any=date("Y");
$diaAvui=date("j");
 
$diaSemana=date("w",mktime(0,0,0,$mes,1,$any))+7;
$lastDayMes=date("d",(mktime(0,0,0,$mes+1,1,$any)-1));
 
echo '<table>';    
echo "<tr>";
		echo "<th>Lun</th>";
		echo "<th>Mar</th>";
		echo "<th>Mie</th>";
		echo "<th>Jue</th>";
		echo "<th>Vie</th>";
		echo "<th>Sab</th>";
		echo "<th>Dom</th>";
	
		$ultim=$diaSemana+$lastDayMes;
		
		for($i=1;$i<=42;$i++)
		{
			if($i==$diaSemana)
			{
				$dia=1;
			}
			if($i<$diaSemana || $i>=$ultim)
			{
				echo "<td>&nbsp;</td>";
			}else{
				if($dia==$diaAvui)
					echo "<td bgcolor='orange'>$dia</td>";
				else
					echo "<td>$dia</td>";
				$dia++;
			}
			if($i%7==0)
			{
				echo "</tr><tr>\n";
			}
        }
echo "</tr>";
echo "</table>";
	?>
</body>
</html>
