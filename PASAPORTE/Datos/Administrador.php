<?php

?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/apprise.js"></script>
<link rel="stylesheet" href="css/apprise.css" type="text/css" />

<?php


	
if(isset($_SESSION['ID']))
{
function registrarUsuario($cedula,$contrato,$nombre,$apellido,$email,$Usuario,$contra,$idRol,$Finicio,$Ffin, $TipoDocumento,$apellido2,$nombre2,$FNacimiento, $Pais, $ciudad, $sexo,$etnia,$TipoUsuario,$actividades,$NomEmpresa)
		{  
			include ("..//Datos/Conexion.php");
			
			$Conn2 = conectar2();
		$sql1="SELECT usuario FROM acceso WHERE usuario='$Usuario'";
		$resultado1 = mysql_query($sql1,$Conn2)or die(mysql_error());
		desconectar($Conn2);
		  
						if(mysql_num_rows($resultado1) > 0){
						?>	
						 <script>
							alert("El Usuario que desea utilizar ya se encuentra registrado. ");
						</script>  
						<?php  
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";
						}
  
		
			$Conn1 = conectar();
			$sql1="CALL SP_ConsultarUsuarioAdmin('$cedula');";
			$resultado1 = mysql_query($sql1,$Conn1)or die(mysql_error());
			desconectar($Conn1);
				$estado="";
				
				$row=mysql_fetch_array($resultado1);
	
				if (mysql_num_rows($resultado1)>0)
				{
					?>	
                     <script>
						alert("El documento que acaba de ingresar ya se encuentra registrado. ");
					</script>  
						<?php  
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";
				}else{  	
				echo "-> ".$Finicio." ->".$Ffin;

					try{
					
					
					
					$sqBD="INSERT INTO `persona`(`Cedula`, `Id_TipoDocumento`, `Primer_Apellido`, `Segundo_Apellido`, `Primer_Nombre`, `Segundo_Nombre`, `Fecha_Nacimiento`, `Id_Pais`, `Nombre_Ciudad`, `Id_Genero`, `Id_Etnia`)
					VALUES ($cedula, $TipoDocumento,'$apellido','$apellido2','$nombre','$nombre2','$FNacimiento',$Pais,'$ciudad',$sexo,$etnia)";		 
					
					$Conn2 = conectar2();
					$id_=$_SESSION['ID'];
					$datos="".$cedula." ".$TipoDocumento." ".$apellido." ".$apellido2." ".$nombre." ".$nombre2." ".$FNacimiento." ".$Pais." ".$ciudad." ".$sexo." ".$etnia;
					$ip=$_SERVER['REMOTE_ADDR'];
					$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id_'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona = $row['Id_Persona'];				
					 
					 $sql="CALL SP_RegistroUsuario('$cedula','$contrato','$nombre','$apellido','$email','$idRol','$Usuario','$contra','$Finicio','$Ffin');";
					$Conn = conectar();
					mysql_query($sql,$Conn)or die(mysql_error()); 
				    desconectar($Conn);
					
						$Conn2 = conectar2();//seguridad
						$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','persona','Insert','-','$datos','$ip'); ";
						mysql_query($sqBD,$Conn2)or die(mysql_error()); 
						mysql_query($sql22,$Conn2)or die(mysql_error()); 
						$datos2="Usuario: ".$Usuario."- Contraseña ".$contra;
						$sql222="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','Acceso','Insert','-','$datos2','$ip'); ";
						mysql_query($sql222,$Conn2)or die(mysql_error()); 
						
						
				

					$sqBD2="SELECT `Id_Persona` FROM `persona` WHERE Cedula='$cedula'";				
					$resultado = mysql_query($sqBD2,$Conn2)or die(mysql_error());	
					$fila= mysql_fetch_row($resultado);
					$rool= $fila[0];
					$sqBD3="INSERT INTO `persona_tipo`(`Id_Tipo`, `Id_Persona`) VALUES ($TipoUsuario,$rool)";
					mysql_query($sqBD3,$Conn2)or die(mysql_error());	
					
					if($idRol==3){
					$Conn3 = conectar();
					$sqBD44="INSERT INTO empresavinculadatipo(`Empresa`, `Cedula_Delegado`, `NomDelegado`, `ApeDelegado`, `Fecha`) VALUES ('$NomEmpresa','$cedula','$nombre','$apellido','$Finicio')";
					mysql_query($sqBD44,$Conn3)or die(mysql_error());
					
					 }
					 
					 $Conn2 = conectar2();
					$sqBD5="INSERT INTO `acceso`(`Id_Persona`, `Usuario`, `Contrasena`) VALUES ($fila[0],'$Usuario',SHA1('$contra'))";
					mysql_query($sqBD5,$Conn2)or die(mysql_error());
					
					$datos23="";
						if(isset($actividades))
						 { 
							$postre = $actividades;
							$n = count($postre);
							$i = 0;
								while ($i < $n)
								   {
									  $sqBD5="INSERT INTO `actividad_acceso`(`Id_Persona`, `Id_Actividad`, `Estado`) VALUES ($fila[0],
									  $postre[$i],
									  1)";
									  mysql_query($sqBD5,$Conn2)or die(mysql_error());
									  $i++;
								   }
						 }

						 
					$sqBD6="SELECT DISTINCT A.Id_Actividad FROM actividades A, actividad_acceso B 
WHERE A.Id_Actividad NOT IN ( SELECT Id_Actividad FROM actividad_acceso WHERE Id_Persona=$fila[0]) AND A.`Id_Modulo`=3";
					$resultado2 = mysql_query($sqBD6,$Conn2)or die(mysql_error());
							$i=0;			
						
						while ($row = mysql_fetch_array($resultado2)){ 
									$ver=$row['Id_Actividad'];
									$sqBD7="INSERT INTO `actividad_acceso`(`Id_Persona`, `Id_Actividad`, `Estado`) VALUES ($fila[0],
									  $ver,
									  0)";
									  mysql_query($sqBD7,$Conn2)or die(mysql_error());
							 
						 }
						 
					//seguridad Activivades
					
					$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$cedula'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona2 = $row['Id_Persona'];
					
					$id=$_SESSION['ID'];
								$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona1 = $row['Id_Persona'];					
					$ActNuevas="SELECT B.Nombre_Actividad , A.Estado FROM `actividad_acceso` A, `actividades` B WHERE A.Id_Actividad= B.Id_Actividad AND  A.Id_Persona='$idpersona2' AND A.Id_Actividad IN (SELECT Id_Actividad FROM `actividades` WHERE Id_Modulo=3);";				
					$resultadoActn = mysql_query($ActNuevas,$Conn2)or die(mysql_error());
				
					$ActiNuevas="";
					while ($rown = mysql_fetch_array($resultadoActn)){ 
							$ActiNuevas=$ActiNuevas." ".$rown['Nombre_Actividad']."=".$rown['Estado']." , ";
					}
					$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona1','actividad_acceso','Insert','--','$ActiNuevas','$ip'); ";
						mysql_query($sql22,$Conn2)or die(mysql_error()); 
						 
						 
                                    ?>
                                    <script>
	                                 $( function(){ 
									apprise('Bienvenido ', {'animate':true});
									});	
			                         alert("Usuario Registrado.");
									</script><?php	 
						            
						$estado="correcto";
						desconectar($Conn);
						desconectar2($Conn2);
						
						 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";
							
					 }catch(Exception $e){
						?>	
						<script language="JavaScript" type="text/javascript">
						   alert("Error al intentar llenar este registro.");
						</script>  
						<?php  
						$estado="ERROR";              
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";                
				
					 }
								
					}
			return $estado;
		} 
				 	
		function consultarUsuario($documento)
		{
			include ("Datos/Conexion.php");
			$Conn = conectar();
			$sql="CALL SP_ConsultarPasaporte('$documento')";
			$resultado = mysql_query($sql,$Conn)or die(mysql_error());
			
			if (!$resultado) {
				?> 
					<script language="JavaScript" type="text/javascript">
					alert("La pagina solicitada no esta disponible, intentelo nuevamente.");
					</script>         
					<?php
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=index2.php\">";
				
				echo 'No se pudo ejecutar la consulta: ' . mysql_error();
				exit;
			}
			
			
			$fila= mysql_fetch_row($resultado);
			
			desconectar($Conn);
			
			return $fila;
		}
		
	function cambiocontra($pass, $nueva)
		{
		include ("../Datos/Conexion.php");
		include('Cifrado.php');
		$Conn = conectar2();
		  $id = $_SESSION['ID'];
		
		  $pass = cifrar($pass);
	
		  $Sql = "SELECT * FROM acceso A, persona P WHERE A.Id_Persona = P.Id_Persona AND P.`Cedula`='$id' AND Contrasena = SHA1('$pass');";
		  $resultado = mysql_num_rows(mysql_query($Sql,$Conn));
		  if ($resultado>0) {
				     
					 $contra=cifrar($nueva);
					 $Sql2 = "UPDATE `acceso` SET `Contrasena`=SHA1('$contra') WHERE `Id_Persona`=(SELECT P.`Id_Persona` FROM persona P WHERE P.`Cedula`= '$id' )";
					$resultado = mysql_query($Sql2,$Conn)or die(mysql_error());
					 
					 ?> 
					<script language="JavaScript" type="text/javascript">
					alert("La contrase"+'\u00f1'+"a fue actulizada exitosamente.");
					</script>         
					<?php
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=../cambiocontra.php\">";
				exit;
			}else{
			?> 
					<script language="JavaScript" type="text/javascript">
					alert("La clave actual no coincide..")
					</script>         
					<?php
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=../cambiocontra.php\">";
			}
		  
		}

	function registrarActividades($cedula,$contrato,$idRol,$Finicio,$Ffin,$TipoUsuario,$actividades,$email)		{  	
		include ("..//Datos/Conexion.php");			
			
		$estado="";					
		
		if($Finicio < $Ffin){
		try{	
		$Conn2 = conectar2();
		$id_=$_SESSION['ID'];
		$sqBD2="SELECT * FROM `persona` WHERE Cedula='$cedula'";
		$resultado = mysql_query($sqBD2,$Conn2)or die(mysql_error());	
		$fila= mysql_fetch_row($resultado);	
		$rool= $fila[0];			
		$TipoDocumento=$fila[2];	
		$apellido=$fila[3];			
		$apellido2=$fila[4];		
		$nombre=$fila[5];			
		$nombre2=$fila[6];			
		$FNacimiento=$fila[7];		
		$Pais=$fila[8];				
		$ciudad=$fila[9];		
		$sexo=$fila[10];		
		$etnia=$fila[11];		
		
		
					$Conn2 = conectar2();
					$id_=$_SESSION['ID'];
					$datos="".$cedula." ".$TipoDocumento." ".$apellido." ".$apellido2." ".$nombre." ".$nombre2." ".$FNacimiento." ".$Pais." ".$ciudad." ".$sexo." ".$etnia;
					$ip=$_SERVER['REMOTE_ADDR'];
					$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id_'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona = $row['Id_Persona'];				
					 
					$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','persona','Insert','-','$datos','$ip'); ";
					mysql_query($sql22,$Conn2)or die(mysql_error()); 
					
					//Historial
					//	$historial="INSERT INTO historial(Id_Modulo , Id_Persona, Fecha , Descripcion) VALUES (4,'$idpersona',now(), 'Registro de actividades a un usuario ya inscrito en algun modulo del idrd.') ";
					//	mysql_query($historial,$Conn2)or die(mysql_error());
					
		$Conn2 = conectar2();	
		
		$sqBD2="SELECT * FROM acceso WHERE Id_Persona='$rool'";		
		$resultado = mysql_query($sqBD2,$Conn2)or die(mysql_error());	
		$fila= mysql_fetch_row($resultado);		
		$Usuario= $fila[1];			
		
		
					
		
		////aca voy
		$Conn = conectar();	
		$sql="CALL SP_RegistroUsuario('$cedula','$contrato','$nombre','$apellido','$email','$idRol','$Usuario','ttyurwey','$Finicio','$Ffin');";
		mysql_query($sql,$Conn)or die(mysql_error()); 	
		
		$sqBD3="INSERT INTO `persona_tipo`(`Id_Tipo`, `Id_Persona`) VALUES ($TipoUsuario,$rool)";
		mysql_query($sqBD3,$Conn2)or die(mysql_error());

					

		if(isset($actividades))			
		{ 				
		$postre = $actividades;	
		$n = count($postre);	
		$i = 0;				
			while ($i < $n)		
			{					
				$sqBD5="INSERT INTO `actividad_acceso`(`Id_Persona`, `Id_Actividad`, `Estado`) VALUES ($fila[0],
				$postre[$i],	
				1)";				
				mysql_query($sqBD5,$Conn2)or die(mysql_error());
				$i++;					
			}		
		}

		$sqBD6="SELECT DISTINCT A.Id_Actividad FROM actividades A, actividad_acceso B WHERE A.Id_Actividad NOT IN ( SELECT Id_Actividad FROM actividad_acceso WHERE Id_Persona=$fila[0]) AND A.`Id_Modulo`=3";
		$resultado2 = mysql_query($sqBD6,$Conn2)or die(mysql_error());		
		$i=0;								
			while ($row = mysql_fetch_array($resultado2)){ 		
				$ver=$row['Id_Actividad'];							
				$sqBD7="INSERT INTO `actividad_acceso`(`Id_Persona`, `Id_Actividad`, `Estado`) VALUES ($fila[0],	
				$ver,						
				0)";						
				mysql_query($sqBD7,$Conn2)or die(mysql_error());	
			}			
			?>    
			<script>
			$( function(){ apprise('Bienvenido ', {'animate':true});});	
			alert("Usuario Registrado.");	
			</script><?php	 	

			$estado="correcto";		
			desconectar($Conn);		
			desconectar2($Conn2);	
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";	

			}catch(Exception $e){			
				?>			
				<script language="JavaScript" type="text/javascript">	
				alert("Error al intentar llenar este registro.");		
				</script>  					
				<?php  				
				$estado="ERROR";  
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";       
			}			
			}else{		
				?>							
				<script language="JavaScript" type="text/javascript">	
				alert("Fecha Incorrecta.");					
				</script>  		
				<?php  			
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";		
			}				
				
			return $estado;		
			} 
			
			
	function registrarUsuaActivi($cedula,$contrato,$email,$Usuario,$contra,$idRol,$Finicio,$Ffin,$TipoUsuario,$actividades)	{  	
		include ("..//Datos/Conexion.php");			
			
		$estado="";					
		
		
		if($Finicio < $Ffin){
		try{	
		$Conn2 = conectar2();
		$id_=$_SESSION['ID'];
		$sqBD2="SELECT * FROM `persona` WHERE Cedula='$cedula'";
		$resultado = mysql_query($sqBD2,$Conn2)or die(mysql_error());	
		$fila= mysql_fetch_row($resultado);	
		$rool= $fila[0];			
		$TipoDocumento=$fila[2];	
		$apellido=$fila[3];			
		$apellido2=$fila[4];		
		$nombre=$fila[5];			
		$nombre2=$fila[6];			
		$FNacimiento=$fila[7];		
		$Pais=$fila[8];				
		$ciudad=$fila[9];		
		$sexo=$fila[10];		
		$etnia=$fila[11];		
		
		
					$Conn2 = conectar2();
					$id_=$_SESSION['ID'];
					$datos="".$cedula." ".$TipoDocumento." ".$apellido." ".$apellido2." ".$nombre." ".$nombre2." ".$FNacimiento." ".$Pais." ".$ciudad." ".$sexo." ".$etnia;
					$ip=$_SERVER['REMOTE_ADDR'];
					$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id_'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona = $row['Id_Persona'];				
					 
					$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','persona','Insert','-','$datos','$ip'); ";
					mysql_query($sql22,$Conn2)or die(mysql_error()); 
					
					
					$datos2="Usuario: ".$Usuario."- Contraseña ".$contra;
					$sql222="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','Acceso','Insert','-','$datos2','$ip'); ";
					mysql_query($sql222,$Conn2)or die(mysql_error()); 
					//Historial
					//	$historial="INSERT INTO historial(Id_Modulo , Id_Persona, Fecha , Descripcion) VALUES (4,'$idpersona',now(), 'Registro de actividades, usuario y contraseña a un usuario ya inscrito del idrd.') ";
					//	mysql_query($historial,$Conn2)or die(mysql_error());
		
		$Conn2 = conectar2();	
		$id_=$_SESSION['ID'];	
		////aca voy
		$Conn = conectar();	
		$sql="CALL SP_RegistroUsuario('$cedula','$contrato','$nombre','$apellido','$email','$idRol','$Usuario','ttyurwey','$Finicio','$Ffin');";
		mysql_query($sql,$Conn)or die(mysql_error()); 	
		
		$sqBD3="INSERT INTO `persona_tipo`(`Id_Tipo`, `Id_Persona`) VALUES ($TipoUsuario,$rool)";
		mysql_query($sqBD3,$Conn2)or die(mysql_error());

			$Conn2 = conectar2();
			$sqBD5="INSERT INTO `acceso`(`Id_Persona`, `Usuario`, `Contrasena`) VALUES ($fila[0],'$Usuario',SHA1('$contra'))";
			mysql_query($sqBD5,$Conn2)or die(mysql_error());		

			$Datos3="";
		if(isset($actividades))			
		{ 				
		$postre = $actividades;	
		$n = count($postre);	
		$i = 0;				
			while ($i < $n)		
			{					
				$sqBD5="INSERT INTO `actividad_acceso`(`Id_Persona`, `Id_Actividad`, `Estado`) VALUES ($fila[0],
				$postre[$i],	
				1)";		
				mysql_query($sqBD5,$Conn2)or die(mysql_error());
				$i++;					
			}		
		}

		$sqBD6="SELECT DISTINCT A.Id_Actividad FROM actividades A, actividad_acceso B WHERE A.Id_Actividad NOT IN ( SELECT Id_Actividad FROM actividad_acceso WHERE Id_Persona=$fila[0]) AND A.`Id_Modulo`=3";
		$resultado2 = mysql_query($sqBD6,$Conn2)or die(mysql_error());		
		$i=0;								
			while ($row = mysql_fetch_array($resultado2)){ 		
				$ver=$row['Id_Actividad'];							
				$sqBD7="INSERT INTO `actividad_acceso`(`Id_Persona`, `Id_Actividad`, `Estado`) VALUES ($fila[0],	
				$ver,						
				0)";						
				mysql_query($sqBD7,$Conn2)or die(mysql_error());	
			}	


			//seguridad Activivades
					
					$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$cedula'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona2 = $row['Id_Persona'];
					
					$id=$_SESSION['ID'];
								$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona1 = $row['Id_Persona'];					
					$ActNuevas="SELECT B.Nombre_Actividad , A.Estado FROM `actividad_acceso` A, `actividades` B WHERE A.Id_Actividad= B.Id_Actividad AND  A.Id_Persona='$idpersona2' AND A.Id_Actividad IN (SELECT Id_Actividad FROM `actividades` WHERE Id_Modulo=3);";				
					$resultadoActn = mysql_query($ActNuevas,$Conn2)or die(mysql_error());
				
					$ActiNuevas="";
					while ($rown = mysql_fetch_array($resultadoActn)){ 
							$ActiNuevas=$ActiNuevas." ".$rown['Nombre_Actividad']."=".$rown['Estado']." , ";
					}
					$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona1','actividad_acceso','Insert','--','$ActiNuevas','$ip'); ";
						mysql_query($sql22,$Conn2)or die(mysql_error());
			
			?>    
			<script>
			$( function(){ apprise('Bienvenido ', {'animate':true});});	
			alert("Usuario Registrado.");	
			</script><?php	 	
			$estado="correcto";		
			desconectar($Conn);		
			desconectar2($Conn2);	
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";	
			}catch(Exception $e){			
				?>			
				<script language="JavaScript" type="text/javascript">	
				alert("Error al intentar llenar este registro.");		
				</script>  					
				<?php  				
				$estado="ERROR";  
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";       
			}			
			}else{		
				?>							
				<script language="JavaScript" type="text/javascript">	
				alert("Fecha Incorrecta.");					
				</script>  		
				<?php  			
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";		
			}				
				
			return $estado;		
			} 

			
	function registrarUsuaSuperA($cedula,$contrato,$email,$idRol,$Finicio,$Ffin,$TipoUsuario){  	
		include ("..//Datos/Conexion.php");			
			
		$estado="";					
		
		
		if($Finicio < $Ffin){
		try{	
		
		$Conn2 = conectar2();
		$id_=$_SESSION['ID'];
		$sqBD2="SELECT * FROM `persona` WHERE Cedula='$cedula'";
		$resultado = mysql_query($sqBD2,$Conn2)or die(mysql_error());	
		$fila= mysql_fetch_row($resultado);	
		$rool= $fila[0];			
		$TipoDocumento=$fila[2];	
		$apellido=$fila[3];			
		$apellido2=$fila[4];		
		$nombre=$fila[5];			
		$nombre2=$fila[6];			
		$FNacimiento=$fila[7];		
		$Pais=$fila[8];				
		$ciudad=$fila[9];		
		$sexo=$fila[10];		
		$etnia=$fila[11];		
		
		
					$Conn2 = conectar2();
					$id_=$_SESSION['ID'];
					$datos="".$cedula." ".$TipoDocumento." ".$apellido." ".$apellido2." ".$nombre." ".$nombre2." ".$FNacimiento." ".$Pais." ".$ciudad." ".$sexo." ".$etnia;
					$ip=$_SERVER['REMOTE_ADDR'];
					$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id_'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona = $row['Id_Persona'];				
					 
					$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','persona','Insert','-','$datos','$ip'); ";
					mysql_query($sql22,$Conn2)or die(mysql_error()); 
					
					
						
							 
					$datos2="Usuario: ".$Usuario."- Contraseña ".$contra;
					$sql222="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','Acceso','Insert','-','$datos2','$ip'); ";
					mysql_query($sql222,$Conn2)or die(mysql_error()); 
					//Historial
					//	$historial="INSERT INTO historial(Id_Modulo , Id_Persona, Fecha , Descripcion) VALUES (4,'$idpersona',now(), 'Registro de actividades, usuario y contraseña a un usuario ya inscrito del idrd.') ";
					//	mysql_query($historial,$Conn2)or die(mysql_error());
		
							 
							 
							 $sqlid1="SELECT  Id_Persona FROM persona WHERE Cedula ='$cedula'";
							 $result1=mysql_query($sqlid1,$Conn2);
							 $row = mysql_fetch_array($result1);
							 $idpersona1= $row['Id_Persona'];
							 $sqlid="SELECT * FROM acceso WHERE `Id_Persona`='$idpersona1'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $Usua = $row['Usuario'];
							 
		$id_=$_SESSION['ID'];	
		////aca voy
		$Conn = conectar();	
		$sql="CALL SP_RegistroUsuario('$cedula','$contrato','$nombre','$apellido','$email','$idRol','$Usua','','$Finicio','$Ffin');";
		mysql_query($sql,$Conn)or die(mysql_error()); 	
		

							
			




			//seguridad Activivades
					
					$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$cedula'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona2 = $row['Id_Persona'];
					
					$id=$_SESSION['ID'];
								$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id'";
							 $result=mysql_query($sqlid,$Conn2);
							 $row = mysql_fetch_array($result);
							 $idpersona1 = $row['Id_Persona'];					
					$ActNuevas="SELECT B.Nombre_Actividad , A.Estado FROM `actividad_acceso` A, `actividades` B WHERE A.Id_Actividad= B.Id_Actividad AND  A.Id_Persona='$idpersona2' AND A.Id_Actividad IN (SELECT Id_Actividad FROM `actividades` WHERE Id_Modulo=3);";				
					$resultadoActn = mysql_query($ActNuevas,$Conn2)or die(mysql_error());
				
					$ActiNuevas="";
					while ($rown = mysql_fetch_array($resultadoActn)){ 
							$ActiNuevas=$ActiNuevas." ".$rown['Nombre_Actividad']."=".$rown['Estado']." , ";
					}
					$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona1','actividad_acceso','Insert','--','$ActiNuevas','$ip'); ";
						mysql_query($sql22,$Conn2)or die(mysql_error());
			
			?>    
			<script>
			$( function(){ apprise('Bienvenido ', {'animate':true});});	
			alert("Usuario Registrado.");	
			</script><?php	 	
			$estado="correcto";		
			desconectar($Conn);		
			desconectar2($Conn2);	
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";	
			}catch(Exception $e){			
				?>			
				<script language="JavaScript" type="text/javascript">	
				alert("Error al intentar llenar este registro.");		
				</script>  					
				<?php  				
				$estado="ERROR";  
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";       
			}			
			}else{		
				?>							
				<script language="JavaScript" type="text/javascript">	
				alert("Fecha Incorrecta.");					
				</script>  		
				<?php  			
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroUsuarios.php\">";		
			}				
				
			return $estado;		
			} 
}
else
{
	//echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";
}
?>