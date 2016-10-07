<?php
session_start();
if(isset($_SESSION['ID']))
{
	if(isset($_SESSION['ID']))
	{	
		
		function registrarPasaporte($tipoDocumento,$numDocumento,$apellidos,$nombres,$fechaNacimiento,$paisNacimiento,$email,$localidad,$estrato,$direccion,
		$telFijo,$telCelular,$nivelEstudios,$pensionado,$enfermedad,$actividadesInteres,
		$tipoSeguridad,$descripcionSeguridad,$contactoNom,$contactoTel,$contactoCel,
		$observaciones,$supercade,$sexo,$apellido_dos,$nombres_2 ,$ciudad , $etnia,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$DDL_Habilidad) {  
		include ("../Datos/Conexion.php");
		
		$idOperario=$_SESSION['ID'];
		$Conn1 = conectar();
		
		$sql1="CALL SP_ConsultarUsuario('$numDocumento');";
		$sql2="CALL SP_ConsusltarOperario('$idOperario');";
		
		$resultado1 = mysql_query($sql1,$Conn1)or die(mysql_error());
		desconectar($Conn1);
		
			$estado="";
			$row=mysql_fetch_array($resultado1);
				if (mysql_num_rows($resultado1)>0)
				{
					?>	
						<script language="JavaScript" type="text/javascript">
						alert("El documento que acaba de ingresar ya se encuentra registrado. ");
					</script>  
						<?php  
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Registro.php\">";
				}else{  	
				    echo $row; 
						$Conn2 = conectar();	
						$resultado2 = mysql_query($sql2,$Conn2)or die(mysql_error());
					    $row2=mysql_fetch_array($resultado2);
						desconectar($Conn2);
						$oper = $row2['nombreUsuario'];
	//1
						$sql="CALL SP_Registro('$numDocumento','$tipoDocumento','$apellidos','$nombres','$fechaNacimiento','$paisNacimiento','$email','$localidad',$estrato,'$direccion','$telFijo',		
						'$telCelular','$nivelEstudios','$pensionado','$enfermedad','$actividadesInteres','$tipoSeguridad','$descripcionSeguridad','$contactoNom','$contactoTel','$contactoCel','$observaciones','$idOperario','$oper','$supercade','$sexo','$DDL_Habilidad');";
				
						$sql_BD2="INSERT INTO `persona`(`Cedula`, `Id_TipoDocumento`, `Primer_Apellido`, `Segundo_Apellido`, `Primer_Nombre`, `Segundo_Nombre`, `Fecha_Nacimiento`, `Id_Pais`, `Nombre_Ciudad`, `Id_Genero`, `Id_Etnia`) 
						VALUES ('$numDocumento','$tipoDocumento','$apellidos','$apellido_dos','$nombres','$nombres_2','$fechaNacimiento','$paisNacimiento','$ciudad','$sexo','$etnia');";
					
					
						$Conn2 = conectar2();
						$id_=$_SESSION['ID'];
						$datos="".$numDocumento." ".$tipoDocumento." ".$apellidos." ".$nombres." ".$fechaNacimiento." ".$paisNacimiento." ".$ciudad." ".$sexo." ".$etnia;
						$ip=$_SERVER['REMOTE_ADDR'];
						$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id_'";
								 $result=mysql_query($sqlid,$Conn2);
								 $row = mysql_fetch_array($result);
								 $idpersona = $row['Id_Persona'];				
						 
						$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','persona,pasaporte','Insert','-','$datos','$ip'); ";
						mysql_query($sql22,$Conn2)or die(mysql_error()); 
						
						
								
					
					
									try{
										
										$Conn = conectar();
									mysql_query($sql,$Conn)or die(mysql_error()); 
										
													if($pregunta1!="0"&&$pregunta2!="0"&&$pregunta3!="0"&&$pregunta4!="0")
													{
														$sql_encuesta="INSERT INTO pasaporte_encuesta (documento,pasaporte,tramite_solicitud,tramite_agilidad,horario,fecha)VALUES('$numDocumento','$pregunta1','$pregunta2','$pregunta3','$pregunta4',NOW())";
														mysql_query($sql_encuesta,$Conn)or die(mysql_error()); 
													}
										
										
										
										desconectar($Conn);
										
										$Conn = conectar2();
										mysql_query($sql_BD2,$Conn)or die(mysql_error()); 
										$_SESSION['id2']=$numDocumento;
										$sqlid2="SELECT  Id_Persona FROM persona WHERE Cedula ='$numDocumento'";
												 $result2=mysql_query($sqlid2,$Conn2);
												 $row2 = mysql_fetch_array($result2);
												 $idpersonacliente = $row2['Id_Persona'];
												$sql222="INSERT INTO `persona_tipo`(`Id_Tipo`, `Id_Persona`) VALUES ('6','$idpersonacliente')";
												mysql_query($sql222,$Conn2)or die(mysql_error());
										?>	
										<script language="JavaScript" type="text/javascript">
										alert("Datos Almacenados");
										
										</script>  
														
										<?php
										$estado="correcto";
										desconectar2($Conn);
										 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Carnet2.php\">";
											
									 }catch(Exception $e){
										?>	
										<script language="JavaScript" type="text/javascript">
										   alert("Error al intentar llenar este registro.");
										</script>  
										<?php  
										$estado="ERROR";              
										echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Registro.php\">";                
								
									 }
				}
		
		return $estado;
		} 
		
		function consultar($documento)
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

		function ConsultarNombre($documento)
		{
			include ("Datos/Conexion.php");
			$Conn = conectar();
			$sql="SELECT usuario FROM pasaporte_login WHERE idUsuario='$documento';";
			
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
		
		function MofificarPasaporte($apellidos,$nombres,$fechaNacimiento,$paisNacimiento,$email,$localidad,$estrato,$direccion,$telFijo,$telCelular,$nivelEstudios,$enfermedad,$descripcionSeguridad,$contactoNom,$contactoTel,$contactoCel,$observaciones) {  
		include ("../Datos/Conexion.php");
		

			$cedula  = $_SESSION['M_Cedula'];

			
				$sql="CALL SP_ModificarRegistro('$apellidos','$nombres','$fechaNacimiento','$paisNacimiento','$email','$localidad','$estrato','$direccion','$telFijo','$telCelular','$nivelEstudios','$enfermedad','$descripcionSeguridad','$contactoNom','$contactoTel','$contactoCel','$observaciones','$cedula');";
				
				try{
					$Conn = conectar();
					mysql_query($sql,$Conn)or die(mysql_error()); 
					?>	
					<script language="JavaScript" type="text/javascript">
					alert("Datos Modificados Con Exito.");
					</script>  
									
					<?php
					$estado="correcto";
					desconectar($Conn);
					 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Modificacion_Datos.php\">";
						
				 }catch(Exception $e){
					?>	
					<script language="JavaScript" type="text/javascript">
					   alert("Error al intentar llenar este registro.");
					</script>  
					<?php  
					$estado="ERROR";              
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Modificacion_Datos.php\">";                
			
				 }
				
		


		
		return $estado;
		} 

		function RegistroServicio($cedula, $id_Empresa){		
		include ("Conexion.php");
		
		$Conn = conectar();	
		$sql="SELECT * FROM `empresavinculadatipo` WHERE Cedula_Delegado='$id_Empresa';";	
		$resultado = mysql_query($sql,$Conn)or die(mysql_error());	
		$row2=mysql_fetch_array($resultado);
		desconectar($Conn);	
			if (mysql_num_rows($resultado)>0) {
				$Conn1 = conectar();	
				$sql1="SELECT * FROM `pasaporte_pasaporte` WHERE `documento`='$cedula';";	
				$resultado1 = mysql_query($sql1,$Conn1)or die(mysql_error());	
				desconectar($Conn);	
				if (mysql_num_rows($resultado1)>0) {
					$Id_empresa = $row2['Cedula_Delegado'];	
					$Nom_empresa = $row2['Empresa'];	
					$Conn = conectar();	
					$descrpcion="El Servicio fue presatdo por la empresa ".$Nom_empresa;
					$sql2="INSERT INTO servicioempresa(documento, Id_Empresa, Fecha , Descripcion) VALUE('$cedula','$Id_empresa',CURRENT_TIMESTAMP,'$descrpcion');";
					$resultado2 = mysql_query($sql2,$Conn)or die(mysql_error());
					desconectar($Conn);	
					?> 
					<script language="JavaScript" type="text/javascript">	
					alert("Servicio Registrado con exito.");
					</script>
					<?php	
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroServicioEmpresa.php\">";
				}else{
					?> 
					<script language="JavaScript" type="text/javascript">	
					alert("El numero de cédula ingresado no existe en el sistema de pasaporte vital, por favor verifique y vuelva a intentar.");
					</script>
					<?php	
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroServicioEmpresa.php\">";
				}

			}else{
				?> 	
				<script language="JavaScript" type="text/javascript">	
				alert("el usuario no es una empresa vinculada que puede registrar el servicio.");
				</script>
				<?php	
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=../RegistroServicioEmpresa.php\">";	
				exit;	
			}
		}
		
	}else{
		echo "<meta http-equiv=\"refresh\" content=\"0;URL../=index.php\">";                		
	}
}
else
{
	if($_SESSION['internet']==1){

function registrarPasaporte($tipoDocumento,$numDocumento,$apellidos,$nombres,$fechaNacimiento,$paisNacimiento,$email,$localidad,$estrato,$direccion,$telFijo,$telCelular,$nivelEstudios,$pensionado,$enfermedad,$actividadesInteres,$tipoSeguridad,$descripcionSeguridad,$contactoNom,$contactoTel,$contactoCel,$observaciones,$supercade,$sexo,$apellido_dos,$nombres_2 ,$ciudad , $etnia,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$DDL_Habilidad ) {  
			include ("../Datos/Conexion.php");
			$Conn1 = conectar();
			$sql1="CALL SP_ConsultarUsuario('$numDocumento');";
			$resultado1 = mysql_query($sql1,$Conn1)or die(mysql_error());
			desconectar($Conn1);
		    $estado="";
		    $row=mysql_fetch_array($resultado1);
	  
			if (mysql_num_rows($resultado1)>0)
			{
				$Conn2 = conectar2();
				$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$numDocumento'";
				$resultado12 = mysql_query($sqlid,$Conn2)or die(mysql_error());
				desconectar2($Conn2);
				$row=mysql_fetch_array($resultado12);
				if (mysql_num_rows($resultado12)>0)
					{
							?>	
								<script language="JavaScript" type="text/javascript">
								alert("El documento que acaba de ingresar ya se encuentra registrado. ");
							</script>  
								<?php  
								echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Registro.php\">";
					}else{

									$Conn2 = conectar2();
									$id_=$_SESSION['ID'];
									$datos="".$numDocumento." ".$tipoDocumento." ".$apellidos." ".$nombres." ".$fechaNacimiento." ".$paisNacimiento." ".$ciudad." ".$sexo." ".$etnia;
									$ip=$_SERVER['REMOTE_ADDR'];
									$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id_'";
											 $result=mysql_query($sqlid,$Conn2);
											 $row = mysql_fetch_array($result);
											 $idpersona = $row['Id_Persona'];				
									 
									$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','persona,pasaporte','Insert','-','$datos','$ip'); ";
									mysql_query($sql22,$Conn2)or die(mysql_error()); 
									$sql_BD2="INSERT INTO `persona`(`Cedula`, `Id_TipoDocumento`, `Primer_Apellido`, `Segundo_Apellido`, `Primer_Nombre`, `Segundo_Nombre`, `Fecha_Nacimiento`, `Id_Pais`, `Nombre_Ciudad`, `Id_Genero`, `Id_Etnia`) 
									VALUES ('$numDocumento','$tipoDocumento','$apellidos','$apellido_dos','$nombres','$nombres_2','$fechaNacimiento','$paisNacimiento','$ciudad','$sexo','$etnia');";
								
								
								try{
									
											$Conn2 = conectar2();
											mysql_query($sql_BD2,$Conn2)or die(mysql_error()); 
											//			Historial
											$sqlid2="SELECT  Id_Persona FROM persona WHERE Cedula ='$numDocumento'";
											 $result2=mysql_query($sqlid2,$Conn2);
											 $row2 = mysql_fetch_array($result2);
											 $idpersona = $row2['Id_Persona'];
								
											$historial="INSERT INTO historial(Id_Modulo , Id_Persona, Fecha , Descripcion) VALUES (3,'$idpersona',now(), 'Registro de usuario por internet.') ";
											mysql_query($historial,$Conn2)or die(mysql_error()); 
											$sql222="INSERT INTO `persona_tipo`(`Id_Tipo`, `Id_Persona`) VALUES ('6','$idpersona')";
											mysql_query($sql222,$Conn2)or die(mysql_error());		
											?>	
											<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
											<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

											<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
											  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
											  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
											  <link rel="stylesheet" href="/resources/demos/style.css" />
											  <script>
												  $(function() {
													$( "#dialog-message" ).dialog({
													  modal: true, 
													  buttons: {
														Ok: function() {
															window.location = "../Registro.php";
														  $( this ).dialog( "close" );
														}
													  }	
													});
												  });
				 							  </script>
				  
								
																	<div id="dialog-message" title="Inscripcion Exitosa" >
													  <p>
													  <?php 
																	  $var =  "Usted puede acercarse a alguno de los SUPERCAES para reclamar su carnet <b> Pasaporte Vital</b>";
																	  echo utf8_decode( $var ); ?>
													  </p>
													  <p>
													    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
														<?php 
																	  $var =  "20 de Julio (Costado Suroriental de la iglesia 20 de julio). ";
																	  echo utf8_decode( $var ); ?>
													  
													  </p>
													  <p>
													    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
													  <?php 
																	  $var =  "Suba (Calle 146A N° 105 – 95).";
																	  echo utf8_decode( $var ); ?>
													  </p>
													  <p>
													    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
														 <?php 
																	  $var =  "Bosa (Calle 57Q sur N° 72D-12 Autopista Sur frente al portal T.)";
																	  echo utf8_decode( $var ); ?>
													  
													  </p>  
													 <p>
													    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
														<?php 
																	  $var =  "Catastro (Carrera 30 N° 25 - 90).";
																	  echo utf8_decode( $var ); ?>
													  
													  </p> 
													  <p>
													    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
														<?php 
																	  $var =  "Américas (Avenida Carrera 86 N° 43 - 55 sur).";
																	  echo utf8_decode( $var ); ?>
													  
													  </p> 
													</div>   
													
													<?php
													$estado="correcto";
													desconectar($Conn);
													desconectar2($Conn2);
										
								 }catch(Exception $e){
													?>	
													<script language="JavaScript" type="text/javascript">
													   alert("Error al intentar llenar este registro.");
													</script>  
													<?php  
													$estado="ERROR";              
													echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Registro.php\">";                
							
								 }

					}
				
			}else{  
			
					$Conn2 = conectar2();
					$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$numDocumento'";
					$resultado12 = mysql_query($sqlid,$Conn2)or die(mysql_error());
					desconectar2($Conn2);
				    $row=mysql_fetch_array($resultado12);
				if (mysql_num_rows($resultado12)>0)
					{
									    $Conn2 = conectar2();
										$id_=$_SESSION['ID'];
										$datos="".$numDocumento." ".$tipoDocumento." ".$apellidos." ".$nombres." ".$fechaNacimiento." ".$paisNacimiento." ".$ciudad." ".$sexo." ".$etnia;
										$ip=$_SERVER['REMOTE_ADDR'];
										$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id_'";
												 $result=mysql_query($sqlid,$Conn2);
												 $row = mysql_fetch_array($result);
												 $idpersona = $row['Id_Persona'];				
										 
										$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','persona,pasaporte','Insert','-','$datos','$ip'); ";
										mysql_query($sql22,$Conn2)or die(mysql_error()); 
										
										//2			
										
										$sql="CALL SP_Registro('$numDocumento','$tipoDocumento','$apellidos','$nombres','$fechaNacimiento','$paisNacimiento','$email','$localidad',$estrato,'$direccion','$telFijo',		
										'$telCelular','$nivelEstudios','$pensionado','$enfermedad','$actividadesInteres','$tipoSeguridad','$descripcionSeguridad','$contactoNom','$contactoTel','$contactoCel','$observaciones','0','Internet','$supercade','$sexo','$DDL_Habilidad');";
									
										//			Historial
											$sqlid2="SELECT  Id_Persona FROM persona WHERE Cedula ='$numDocumento'";
											 $result2=mysql_query($sqlid2,$Conn2);
											 $row2 = mysql_fetch_array($result2);
											 $idpersona = $row2['Id_Persona'];
								
										$historial="INSERT INTO historial(Id_Modulo , Id_Persona, Fecha , Descripcion) VALUES (3,'$idpersona',now(), 'Registro de usuario por internet.') ";
										mysql_query($historial,$Conn2)or die(mysql_error()); 
						
								try{
									
												$Conn = conectar();
												mysql_query($sql,$Conn)or die(mysql_error());
												?>	
							                    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
												<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

												<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
												  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
												  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
												  <link rel="stylesheet" href="/resources/demos/style.css" />
												  <script>
												  $(function() {
												    $( "#dialog-message" ).dialog({
												      modal: true, 
												      buttons: {
												        Ok: function() {
															window.location = "../Registro.php";
												          $( this ).dialog( "close" );
												        }
												      }	
												    });
												  });
												 
												  </script>
							  
												<div id="dialog-message" title="Inscripcion Exitosa" >
												  <p>
												   Usted puede acercarce a alguno de los supercaes para reclamar su carnet <b> Pasaporte Vital .</b>.
												  </p>
												  <p>
												    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
												  20 de Julio (Costado Suroriental de la iglesia 20 de julio) 
												  </p>
												  <p>
												    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
																<?php 
																  $var =  "Suba (Calle 146 A  105 - 95)";
																  echo utf8_decode( $var ); ?>
												  </p>
												  <p>
												    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
												  Bosa (Calle 57Q sur N° 72D-12 Autopista Sur frente al portal T.)
												  </p>  
												 <p>
												    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
												  Catastro (Carrera 30 N° 25 - 90)
												  </p> 
												  <p>
												    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
												  Américas (Avenida Carrera 86 N° 43 - 55 sur)
												  </p> 
												</div>  
																
												<?php
												$estado="correcto";
												desconectar($Conn);
												desconectar2($Conn2);
										
								 }catch(Exception $e){
											?>	
											<script language="JavaScript" type="text/javascript">
											   alert("Error al intentar llenar este registro.");
											</script>  
											<?php  
											$estado="ERROR";              
											echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Registro.php\">";                
							
								 }
				 }else{
				
						  $Conn2 = conectar2();
							$id_=$_SESSION['ID'];
							$datos="".$numDocumento." ".$tipoDocumento." ".$apellidos." ".$nombres." ".$fechaNacimiento." ".$paisNacimiento." ".$ciudad." ".$sexo." ".$etnia;
							$ip=$_SERVER['REMOTE_ADDR'];
							$sqlid="SELECT  Id_Persona FROM persona WHERE Cedula ='$id_'";
									 $result=mysql_query($sqlid,$Conn2);
									 $row = mysql_fetch_array($result);
									 $idpersona = $row['Id_Persona'];				
							 
							$sql22="CALL SP_Insetar_Seguridad(3,now(),'$idpersona','persona,pasaporte','Insert','-','$datos','$ip'); ";
							mysql_query($sql22,$Conn2)or die(mysql_error()); 
							//3		
								$sql="CALL SP_Registro('$numDocumento','$tipoDocumento','$apellidos','$nombres','$fechaNacimiento','$paisNacimiento','$email','$localidad',$estrato,'$direccion','$telFijo',		
							'$telCelular','$nivelEstudios','$pensionado','$enfermedad','$actividadesInteres','$tipoSeguridad','$descripcionSeguridad','$contactoNom','$contactoTel','$contactoCel','$observaciones','0','Internet','$supercade','$sexo','$DDL_Habilidad');";
								
								$sql_BD2="INSERT INTO `persona`(`Cedula`, `Id_TipoDocumento`, `Primer_Apellido`, `Segundo_Apellido`, `Primer_Nombre`, `Segundo_Nombre`, `Fecha_Nacimiento`, `Id_Pais`, `Nombre_Ciudad`, `Id_Genero`, `Id_Etnia`) 
								VALUES ('$numDocumento','$tipoDocumento','$apellidos','$apellido_dos','$nombres','$nombres_2','$fechaNacimiento','$paisNacimiento','$ciudad','$sexo','$etnia');";
				
				
				
								try{
									
													$Conn2 = conectar2();
													mysql_query($sql_BD2,$Conn2)or die(mysql_error()); 
													
													//			Historial
																$sqlid2="SELECT  Id_Persona FROM persona WHERE Cedula ='$numDocumento'";
																			 $result2=mysql_query($sqlid2,$Conn2);
																			 $row2 = mysql_fetch_array($result2);
																			 $idpersona = $row2['Id_Persona'];
																
														$historial="INSERT INTO historial(Id_Modulo , Id_Persona, Fecha , Descripcion) VALUES (4,'$idpersona',now(), 'Registro de usuario por internet.') ";
														mysql_query($historial,$Conn2)or die(mysql_error()); 
														
													$Conn = conectar();
													mysql_query($sql,$Conn)or die(mysql_error());
													?>	
								                    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
													<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

													<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
													  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
													  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
													  <link rel="stylesheet" href="/resources/demos/style.css" />
													  <script>
													  $(function() {
													    $( "#dialog-message" ).dialog({
													      modal: true, 
													      buttons: {
													        Ok: function() {
																window.location = "../Registro.php";
													          $( this ).dialog( "close" );
													        }
													      }	
													    });
													  });
													 

													  </script>
													  
																	
													<div id="dialog-message" title="Inscripcion Exitosa" >
													  <p>
													  <?php 
																	  $var =  "Usted puede acercarse a alguno de los SUPERCAES para reclamar su carnet <b> Pasaporte Vital</b>";
																	  echo utf8_decode( $var ); ?>
													  </p>
													  <p>
													    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
														<?php 
																	  $var =  "20 de Julio (Costado Suroriental de la iglesia 20 de julio). ";
																	  echo utf8_decode( $var ); ?>
													  
													  </p>
													  <p>
													    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
													  <?php 
																	  $var =  "Suba (Calle 146A N° 105 95).";
																	  echo utf8_decode( $var ); ?>
													  </p>
													  <p>
													    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
														 <?php 
																	  $var =  "Bosa (Calle 57Q sur N° 72D-12 Autopista Sur frente al portal T.)";
																	  echo utf8_decode( $var ); ?>
													  
													  </p>  
													 <p>
													    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
														<?php 
																	  $var =  "Catastro (Carrera 30 N° 25 - 90).";
																	  echo utf8_decode( $var ); ?>
													  
													  </p> 
													  <p>
													    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
														<?php 
																	  $var =  "Américas (Avenida Carrera 86 N° 43 - 55 sur).";
																	  echo utf8_decode( $var ); ?>
													  
													  </p> 
													</div>  
																	
													<?php
													$estado="correcto";
													desconectar($Conn);
													desconectar2($Conn2);
										
								 }catch(Exception $e){
											?>	
											<script language="JavaScript" type="text/javascript">
											   alert("Error al intentar llenar este registro.");
											</script>  
											<?php  
											$estado="ERROR";              
											echo "<meta http-equiv=\"refresh\" content=\"0;URL=../Registro.php\">";                
							
								 }
				 
				 
				 		}
				}
		


		
		return $estado;
		} 


	}else{
		echo "<meta http-equiv=\"refresh\" content=\"0;URL../=index.php\">"; 
	}
	
	}
?>