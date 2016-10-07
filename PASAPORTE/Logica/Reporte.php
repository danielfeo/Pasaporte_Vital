<?php



session_start();


		

		$titulo="";

		$campoSql="";

		$check=$_POST["radiobutton"];

		$fInicio=$_POST['datepicker'];

		$fFin=$_POST['datepicker1'];

		

		if($check=="cbxGenero")

		{

			$titulo=" Genero";

			$campoSql="sexo";

		}else if($check=="cbxPensionado")

		{

			$titulo="Pensionados";

			$campoSql="pensionado";		

		}else if($check=="cbxPais")

		{

			$titulo="Pais";

			$campoSql="paisNacimiento";		

		}else if($check=="cbxLocalidad")

		{

			$titulo="Localidad";

			$campoSql="localidad";		

		}else if($check=="cbxEstrato")

		{

			$titulo="Estrato";

			$campoSql="estrato";		

		}else if($check=="cbxEstudios")

		{

			$titulo="Nivel De Estudios";

			$campoSql="nivelEstudios";		

		}else if($check=="cbxEnfermedad")

		{

			$titulo="Estado De Salud";

			$campoSql="enfermedad";		

		}else if($check=="cbxSeguridad")

		{

			$titulo="Tipo De Seguridad";

			$campoSql="tipoSeguridad";		

		}else if($check=="cbxSupercade")

		{

			$titulo="Supercade";

			$campoSql="supercade";		

		}else if($check=="cbxActividades")

		{

			$titulo="Actividades De Interes";

			$campoSql="actividadesInteres";		

		}else if($check=="cbxDocumento")

		{

			$titulo="Tipo De Documento";

			$campoSql="tipoDocumento";		

		}

		

		

		

		

		if(isset($_POST['cbxFecha']))

		{

			$descripcion='Reporte comprendido entre '.$fInicio.' y '.$fFin.'<br><br>';

			$consulta='SELECT A.'.$campoSql.' AS valor, COUNT(A.apellidos) AS cantidad  FROM pasaporte_registro A, pasaporte_pasaporte B  WHERE  A.documento=B.documento AND B.fechaExpedicion BETWEEN \''.$fInicio.'\' AND \''.$fFin.'\' and B.`impreso`=\'SI\' GROUP BY A.'.$campoSql.';';

			

			$datos='SELECT A.apellidos, A.nombres, A.documento, A.localidad, B.fechaexpedicion,A.supercade,A.'.$campoSql.' AS valor  FROM pasaporte_registro A, pasaporte_pasaporte B  WHERE  A.documento=B.documento and B.`impreso`=\'SI\' AND B.fechaexpedicion BETWEEN \''.$fInicio.'\' AND \''.$fFin.'\' ORDER BY A.apellidos;';



		}else{			

			$descripcion='El siguiente reporte refleja la totalidad de personas registradas <br><br>';

			$consulta='SELECT A.'.$campoSql.' AS valor, COUNT(*) AS cantidad  FROM pasaporte_registro A, pasaporte_pasaporte B  WHERE  A.documento=B.documento and B.`impreso`=\'SI\' GROUP BY A.'.$campoSql.';';

			$datos='SELECT A.apellidos, A.nombres, A.documento, A.localidad, B.fechaexpedicion,A.supercade,A.'.$campoSql.' AS valor  FROM pasaporte_registro A, pasaporte_pasaporte B  WHERE  A.documento=B.documento and B.`impreso`=\'SI\' AND B.fechaexpedicion  ORDER BY A.apellidos;';

			}

		

		

		  		

		//$consulta='SELECT paisNacimiento AS valor, COUNT(*) AS cantidad  FROM pasaporte_registro GROUP BY paisNacimiento;';

		include ("../Datos/Conexion.php");

		$Conn = conectar();

		

		$strConsulta =$consulta;

		$result = mysql_query($strConsulta);

		$result1= mysql_query($strConsulta);

		$resultDatos= mysql_query($datos);



		

		define('FPDF_FONTPATH', 'font/');

		require('../html_table.php');

		

		

		

		$pdf=new PDF();

		$pdf->AddPage();

		$pdf->SetFont('Arial', '', 12);

		

		

		$html='<table border="1">

			<tr>

				<td width="290" bgcolor="#D0D0FF" bordercolor="#000099" align="center">'.$titulo.' </td>

				<td width="217" bgcolor="#D0D0FF" bordercolor="#000099" align="center">Cantidad de Personas</td>

			</tr>';

		$total=0;	

		while($row=mysql_fetch_array($result))

		{
			if($campoSql=="sexo"){
				if($row['valor']==1) $row['valor']="Hombre";
				if($row['valor']==2) $row['valor']="Mujer";
			}

			if($campoSql=="paisNacimiento"){
				$sql11="SELECT * FROM `pais` WHERE `Id_Pais`=".$row['valor'];
				$Conn2 = conectar2();
				$result22 = mysql_query($sql11,$Conn2);
				$paies=mysql_fetch_array($result22);
				$row['valor']=$paies['Nombre_Pais'];
				desconectar2($Conn2);
			}
			
		 $html=$html. '<tr>

				 			<td width="290" height="30" align="left">'. $row['valor'].' </td>

				 			<td width="210" height="30" align="right">'. $row['cantidad'].' </td>

					   </tr>';

					   $total=$total+$row['cantidad'];

		}

		

		$porcentaje='<br><br><br>';

		

		while($row=mysql_fetch_array($result1))

		{
			if($campoSql=="sexo"){
				if($row['valor']==1) $row['valor']="Hombre";
				if($row['valor']==2) $row['valor']="Mujer";
			}
			$porcentaje=$porcentaje.''.$row['valor'].': '.($row['cantidad']*100)/$total.'% <br>';

		}

		

		$html=$html.'<tr>

				 			<td width="290" height="30" align="left" bgcolor="#CCCCCC">Total </td>

				 			<td width="210" height="30" align="right" bgcolor="#CCCCCC">'. $total.' </td>

					   </tr></table>';

		

	/*	$tablaDatos='<table border="1">

			<tr>

				<td bgcolor="#F99F9D" height="70" align="center">APELLIDOS</td>

				<td bgcolor="#F99F9D" height="70">NOMBRES</td>

				<td bgcolor="#F99F9D" height="70">DOCUMENTO</td>

				<td bgcolor="#F99F9D" height="70">LOCALDIAD</td>

				<td bgcolor="#F99F9D" height="70">FECHA EXPEDICION</td>

				<td bgcolor="#F99F9D" height="70">SUPERCADE</td>

				<td bgcolor="#F99F9D" height="70">'.strtoupper($titulo).'</td>

			</tr>';

		//$tablaDatos=$tablaDatos.'

			//<tr height="0" ><td height="0" width="1"></td>

			//</tr>';

			

		while($row=mysql_fetch_array($resultDatos))

		{
			if($campoSql=="sexo"){
				if($row['valor']==1) $row['valor']="Hombre";
				if($row['valor']==2) $row['valor']="Mujer";
			}
		 $tablaDatos=$tablaDatos. '<tr><td height="59" bgcolor="#FFFFFF" width="2">&nbsp;</td>

		 					<td height="59" bgcolor="">'. $row['apellidos'].' </td>

							<td height="59">'. $row['nombres'].' </td>

							<td height="59">'. $row['documento'].' </td>

							<td height="59">'. $row['localidad'].' </td>

							<td height="59">'. $row['fechaexpedicion'].' </td>

							<td height="59">'. $row['supercade'].' </td>

							<td height="59">'. $row['valor'].' </td>

					   </tr>';
					   break; //hacer la lista
		}

		

		$tablaDatos=$tablaDatos.'</table>';

		
*/
		

		$pdf->WriteHTML('                                                                                                           Reporte Por '.$titulo.'<br><br><br><br>');

		$pdf->WriteHTML(' Instituto Distrital De Recreacion Y Deporte - IDRD<br> ');

		$pdf->WriteHTML('Modulo De Pasaporte Vital<br> ');

		$pdf->WriteHTML('Fecha: '.date("F j, Y").'<br> ');

		$pdf->WriteHTML('Usuario: '.$_SESSION['NombreUsuario'].'<br><br><br><br> ');

		$pdf->WriteHTML($descripcion);		

		$pdf->WriteHTML($html);

		$pdf->WriteHTML($porcentaje);

		$pdf->WriteHTML('<br><br><br><br><br> ');

		$pdf->SetFont('Arial','',8);

		

		$pdf->WriteHTML($tablaDatos);

		

		$pdf->Output();



		desconectar($Conn);

				

		



	







?>

