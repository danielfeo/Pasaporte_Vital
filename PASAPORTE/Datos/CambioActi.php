<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/apprise.js"></script>
<link rel="stylesheet" href="css/apprise.css" type="text/css" />
<?php
session_start();

if(isset($_SESSION['ID']))
{
function Modificar($cedula,$actividades)
		{  
			include ("..//Datos/Conexion.php");
			
		
		$Conn2 = conectar2();
					$sqBD2="SELECT `Id_Persona` FROM `persona` WHERE Cedula=$cedula";				
					$resultado = mysql_query($sqBD2,$Conn2)or die(mysql_error());	
					$fila= mysql_fetch_row($resultado);
					$id_= $fila[0];
					//seguridad Actividades antiguas
					$ActAntiguas="SELECT B.Nombre_Actividad , A.Estado FROM `actividad_acceso` A, `actividades` B WHERE A.Id_Actividad= B.Id_Actividad AND  A.Id_Persona='$id_' AND A.Id_Actividad IN (SELECT Id_Actividad FROM `actividades` WHERE Id_Modulo=3);";				
					$resultadoAct = mysql_query($ActAntiguas,$Conn2)or die(mysql_error());	
								
					$ActiAntiguas="";
					while ($rowa = mysql_fetch_array($resultadoAct)){ 
							
							$acti=$rowa['Nombre_Actividad'];
							$esta=$rowa['Estado'];
							$ActiAntiguas=$ActiAntiguas." ".$acti."=".$esta." , ";
					
					}
					
		 				
		$postre = $actividades;	
		$n = count($postre);	
		$i = 0;				
			while ($i < $n)		
			{		
				$sqBDC="UPDATE `actividad_acceso`  SET Id_Persona='$id_' , Id_Actividad='$postre[$i]' , Estado=1 WHERE Id_Persona='$id_' AND Id_Actividad='$postre[$i]';";		
				mysql_query($sqBDC,$Conn2)or die(mysql_error());
				$i++;					
			}		
		

		$sqBD6="SELECT * FROM actividad_acceso A WHERE A.`Id_Persona`='$id_' AND A.`Id_Actividad` IN (SELECT Id_Actividad FROM actividades WHERE Id_Modulo=3)";
		$resultado2 = mysql_query($sqBD6,$Conn2)or die(mysql_error());		
		
				
			while ($row = mysql_fetch_array($resultado2)){ 
				$a=0;
				$i=0;
				$ver=$row['Id_Actividad'];	
				while ($i<$n)		
				{
					
					if($ver===$postre[$i])
					{
					
					$a++;
					}
					
				$i++;
				}	
				
				if($a==0){
					$sqBDCC="UPDATE `actividad_acceso`  SET Id_Persona='$id_' , Id_Actividad='$ver' , Estado=0 WHERE Id_Persona='$id_' AND Id_Actividad='$ver';";		
					mysql_query($sqBDCC,$Conn2)or die(mysql_error());
				}
			}		
						
					//seguridad Actividades nuevas
					$ActNuevas="SELECT B.Nombre_Actividad , A.Estado FROM `actividad_acceso` A, `actividades` B WHERE A.Id_Actividad= B.Id_Actividad AND  A.Id_Persona='$id_' AND A.Id_Actividad IN (SELECT Id_Actividad FROM `actividades` WHERE Id_Modulo=3);";				
					$resultadoActn = mysql_query($ActNuevas,$Conn2)or die(mysql_error());
				
								
					$ActiNuevas="";
					while ($rown = mysql_fetch_array($resultadoActn)){ 
							$ActiNuevas=$ActiNuevas." ".$rown['Nombre_Actividad']."=".$rown['Estado']." , ";
					
					}
						$Conn2 = conectar2();
						$id=$_SESSION['ID'];
						$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona = $row['Id_Persona'];
						$ip=$_SERVER['REMOTE_ADDR'];
						$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','actividad_acceso','UPDATE','$ActiAntiguas','$ActiNuevas','$ip'); ";
						mysql_query($sql22,$Conn2)or die(mysql_error()); 
						
						
							//Historial
						//$historial="INSERT INTO historial(Id_Modulo , Id_Persona, Fecha , Descripcion) VALUES (4,'$idpersona',now(), 'Cambio actividades ha un usuario') ";
						//mysql_query($historial,$Conn2)or die(mysql_error()); 					
			?>    
			<script>
			$( function(){ apprise('Bienvenido ', {'animate':true});});	
			alert("Actividades cambiadas con exito.");	
			</script><?php	 	

			$estado="correcto";		
			desconectar($Conn);		
			desconectar2($Conn2);	
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=../CambioActividades.php\">";	

			
			return $estado;
		} 
		
	}
?>