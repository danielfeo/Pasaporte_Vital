<style type="text/css">

.text { font-family:  Arial, serif; font-size:14pt;  }

</style>

<?php 



function conectar(){

	

	$coneccion = mysql_connect("localhost","idrdgov_pas3","pasaporteudec");

	mysql_select_db("idrdgov_sim_pasaporte",$coneccion);

	return $coneccion;

}

function desconectar($coneccion){

	mysql_close($coneccion);

}



$sql= "SELECT distinct(`supercade`) FROM `pasaporte_registro` WHERE 1";

$Conn=conectar();

$resultado = mysql_query($sql,$Conn)or die(mysql_error());

$totalHombres=0;

$totalMujer=0;
$total=0;
echo "<table border='1' width='100%' class='text'>";

echo "<thead>";

echo "<th>SUPER CADE</th>";

echo "<th>MUJERES</th>";

echo "<th>HOMBRES</th>";

echo "</thead>";

    while($row=mysql_fetch_array($resultado))

    {

    	if($row['supercade']!=''){

    	$sql2="SELECT A.`sexo` AS valor, COUNT(*) as cantidad	FROM pasaporte_registro A, pasaporte_pasaporte B

		 WHERE A.`documento` = B.`documento` AND B.`impreso` = 'SI' and A.`supercade`='".$row['supercade']."' and YEAR(B.`fechaExpedicion`)='2014' GROUP BY A.`sexo`";

		 

	//	 echo $sql2."<br>";

		$hombre=0;

		$mujer=0;

		 $resultado2 = mysql_query($sql2,$Conn)or die(mysql_error());

		 	while($row2=mysql_fetch_array($resultado2))

		    {

		    	if($row2['valor']==1){

		    		$hombre=$row2['cantidad'];

		    		$totalHombres=$totalHombres+$hombre;

		    	}

		    	if($row2['valor']==2){

		    		$mujer=$row2['cantidad'];

		    		$totalMujer=$totalMujer+$mujer;

		    	}

		    }



		    echo "<tr>

		    		<td>".$row['supercade']."</td>

		    		<td style='text-align:center'>".$mujer."</td>

		    		<td style='text-align:center'>".$hombre."</td>

		    	</tr>";

		   } 		

       

    }	

    			echo "<tr>

		    		<tH>Total Genero</th>

		    		<tH style='text-align:center'>".$totalMujer."</th>

		    		<th style='text-align:center'>".$totalHombres."</th>

		    	</tr>";



		    	

    echo "</table>";


	$total=$totalMujer+$totalHombres;

    echo "<p class='text'>Pasaportes entregados durante el 2014 : ".$total."</p>";










$sql= "SELECT distinct(`supercade`) FROM `pasaporte_registro` WHERE 1";

$Conn=conectar();

$resultado = mysql_query($sql,$Conn)or die(mysql_error());

$totalHombres=0;

$totalMujer=0;
$total=0;
echo "<table border='1' width='100%' class='text'>";

echo "<thead>";

echo "<th>SUPER CADE</th>";

echo "<th>MUJERES</th>";

echo "<th>HOMBRES</th>";

echo "</thead>";

    while($row=mysql_fetch_array($resultado))

    {

    	if($row['supercade']!=''){

    	$sql2="SELECT A.`sexo` AS valor, COUNT(*) as cantidad	FROM pasaporte_registro A, pasaporte_pasaporte B

		 WHERE A.`documento` = B.`documento` AND B.`impreso` = 'SI' and A.`supercade`='".$row['supercade']."' and YEAR(B.`fechaExpedicion`)='2015' GROUP BY A.`sexo`";

		 

	//	 echo $sql2."<br>";

		$hombre=0;

		$mujer=0;

		 $resultado2 = mysql_query($sql2,$Conn)or die(mysql_error());

		 	while($row2=mysql_fetch_array($resultado2))

		    {

		    	if($row2['valor']==1){

		    		$hombre=$row2['cantidad'];

		    		$totalHombres=$totalHombres+$hombre;

		    	}

		    	if($row2['valor']==2){

		    		$mujer=$row2['cantidad'];

		    		$totalMujer=$totalMujer+$mujer;

		    	}

		    }



		    echo "<tr>

		    		<td>".$row['supercade']."</td>

		    		<td style='text-align:center'>".$mujer."</td>

		    		<td style='text-align:center'>".$hombre."</td>

		    	</tr>";

		   } 		

       

    }	

    			echo "<tr>

		    		<tH>Total Genero</th>

		    		<tH style='text-align:center'>".$totalMujer."</th>

		    		<th style='text-align:center'>".$totalHombres."</th>

		    	</tr>";



		    	

    echo "</table>";


	$total=$totalMujer+$totalHombres;

    echo "<p class='text'>Pasaportes entregados durante el 2015 : ".$total."</p>";












    $sql= "SELECT distinct(`supercade`) FROM `pasaporte_registro` WHERE 1";

$Conn=conectar();

$resultado = mysql_query($sql,$Conn)or die(mysql_error());

$totalHombres=0;

$totalMujer=0;
$total=0;


echo "<table border='1' width='100%' class='text'>";

echo "<thead>";

echo "<th>SUPER CADE</th>";

echo "<th>MUJERES</th>";

echo "<th>HOMBRES</th>";

echo "</thead>";

    while($row=mysql_fetch_array($resultado))

    {

    	if($row['supercade']!=''){

    	$sql2="SELECT A.`sexo` AS valor, COUNT(*) as cantidad	FROM pasaporte_registro A, pasaporte_pasaporte B

		 WHERE A.`documento` = B.`documento` AND B.`impreso` = 'SI' and A.`supercade`='".$row['supercade']."' and YEAR(B.`fechaExpedicion`)='2016' GROUP BY A.`sexo`";

		 

	//	 echo $sql2."<br>";

		$hombre=0;

		$mujer=0;

		 $resultado2 = mysql_query($sql2,$Conn)or die(mysql_error());

		 	while($row2=mysql_fetch_array($resultado2))

		    {

		    	if($row2['valor']==1){

		    		$hombre=$row2['cantidad'];

		    		$totalHombres=$totalHombres+$hombre;

		    	}

		    	if($row2['valor']==2){

		    		$mujer=$row2['cantidad'];

		    		$totalMujer=$totalMujer+$mujer;

		    	}

		    }



		    echo "<tr>

		    		<td>".$row['supercade']."</td>

		    		<td style='text-align:center'>".$mujer."</td>

		    		<td style='text-align:center'>".$hombre."</td>

		    	</tr>";

		   } 		

       

    }	

    			echo "<tr>

		    		<tH>Total Genero</th>

		    		<tH style='text-align:center'>".$totalMujer."</th>

		    		<th style='text-align:center'>".$totalHombres."</th>

		    	</tr>";



		    	

    echo "</table>";


	$total=$totalMujer+$totalHombres;

    echo "<p class='text'>Pasaportes entregados durante el 2016 : ".$total."</p>";






    					$sql="SELECT A.documento, A.apellidos,A.nombres,B.fechaExpedicion,B.supercade,B.impreso FROM pasaporte_registro A, pasaporte_pasaporte B WHERE A.documento=B.documento ORDER BY B.fechaExpedicion DESC"; 

					    $result=mysql_query($sql); 

						$numero=mysql_num_rows($result);

							 	$sql22="SELECT count( * ) as valor , `impreso` FROM pasaporte_registro A, pasaporte_pasaporte B WHERE A.documento = B.documento GROUP BY `impreso` "; 

								$result22=mysql_query($sql22);

								while($row22=mysql_fetch_array($result22))

								{

								

										if($row22['impreso']=='SI') $si=$row22['valor'];

										if($row22['impreso']=='NO') $no=$row22['valor'];

									

								}

	echo"<br><br><br>";					

echo "<table border='1' width='100%' class='text'>";

			echo"<tr>";

						echo "<td>Pasaportes entregados hasta la fecha</td>";

						echo"<td>".$si."</td>";

			echo"</tr>";

			echo"<tr>";

						echo "<td>Pasaportes por entregar</td>";

						echo"<td>".$no."</td>";

			echo"</tr>";

			echo"<tr>";

						echo "<td>Total registros</td>";

						echo"<td>".$numero."</td>";

			echo"</tr>";

   			

echo "</table>";



?>