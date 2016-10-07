<?php
session_start();

$alt = "class='alt'";

if(isset($_SESSION['ID'])){	
$vector=$_SESSION['permisos'];
}else
{
	if(isset($_POST['vector_modulo']))
	{
		$vector = $_POST['vector_modulo'];
	
	$vector = urldecode($vector);
	$vector = unserialize($vector);
	$j = sizeof($vector);
	//echo "-> ".$j;
	//echo "<br> mira 2 ".$vector[0]."<br>";
	
	$con=0;
	for($i = 0; $i < $j ; $i++){
		//echo $vector[$i] . " ";
		if($i>0&&$vector[$i]==1)
		{
			$vector_permisos[$con]=$i;		
			//echo $vector_permisos[$con]." ";
			$con++;
		}
		
	}
	
		
		
			
	include ("Datos/Conexion.php");
			
			$Conn2 = conectar2();
			$usuar="SELECT Usuario, Id_Persona FROM `acceso` WHERE `Id_Persona`='$vector[0]'";
			$resultado0 = mysql_query($usuar,$Conn2)or die(mysql_error());
			desconectar($Conn2);
			$ver= mysql_fetch_row($resultado0);
			
			
			$Conn = conectar();
			$sql="SELECT usuario,estadoUsuario, idUsuario, idRol FROM pasaporte_login WHERE usuario=\"$ver[0]\" ";
			$resultado = mysql_query($sql,$Conn)or die(mysql_error());
			
			
			if (!$resultado) {
				?> 
					<script language="JavaScript" type="text/javascript">
					alert("La pagina solicitada no esta disponible, intentelo nuevamente.");
					</script>         
					<?php
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://idrd.gov.co/SIM/\">";
				echo 'No se pudo ejecutar la consulta: ' . mysql_error();
				exit;
			}
			
			
			$fila= mysql_fetch_row($resultado);
			desconectar($Conn);
			
	if($fila[1]=="ACTIVO")
	{
		$_SESSION['NombreUsuario']=$fila[0];
		$_SESSION['permisos']=$vector;
		$_SESSION['ID']=$fila[2];
		$_SESSION['rol']=$fila[3];
			$Conn = conectar();
			$accion="Inicio Sesion";	

			$sql="INSERT INTO pasaporte_registrologin(idUsuario,idRol,usuario,accion,fecha,hora,descripcion) VALUES('$fila[2]','$fila[3]','$fila[0]','$accion',CURDATE(),CURTIME(),'--');";
			//$sql= "CALL SP_RegistrarLogin('$fila[2]','$fila[3];','$fila[0]','$accion','--')";

		
			mysql_query($sql,$Conn)or die(mysql_error());
			desconectar($Conn);

		
		}else
		{
			?>
            
			<script language="JavaScript" type="text/javascript">
		alert("El usuario no se encuentra activo.");
		</script>
         
        <?php
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://idrd.gov.co/SIM/\">";
			}
			
		
		}else
		{
		
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://idrd.gov.co/SIM/\">";
			
		}
	
	
	

}
	

						 
			if(isset($_SESSION['ID'])){	
					?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="" xml:lang="en"><head><title>Pasaporte Vital</title><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!-- **** stylesheet **** --><link rel="stylesheet" type="text/css" href="style.css">

<link rel="shortcut icon" type="image/x-icon" href="http://lwis.net/free-css-drop-down-menu/css/dropdown/themes/nvidia.com/images/favicon.ico">
<link href="Css/helper.css" media="screen" rel="stylesheet" type="text/css">

<!-- Beginning of compulsory code below -->

<link href="Css/dropdown.css" media="screen" rel="stylesheet" type="text/css">
<link href="Css/default.advanced.css" media="screen" rel="stylesheet" type="text/css">

<style type="text/css">

.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } 
.datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #00ade6; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
.datagrid table td, 
.datagrid table th { padding: 3px 10px; }
.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #FF0000), color-stop(1, #80141C) );background:-moz-linear-gradient( center top, #00ade6 5%, #00ade6 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#991821', endColorstr='#80141C');background-color:#00ade6; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #B01C26; } 
.datagrid table thead th:first-child { border: none; }
.datagrid table tbody td { color: #80141C; border-left: 1px solid #00ade6;font-size: 12px;font-weight: normal; }
.datagrid table tbody .alt td { background: #F7CDCD; color: #80141C; }
.datagrid table tbody td:first-child { border-left: none; }
.datagrid table tbody tr:last-child td { border-bottom: none; }

a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
body {
	background-image: url(../style/white_leather.png);
}

#contenedor_centrado {
	position: absolute;
	top: 211px;
	left: 704px;
	height: 400px;
	width: 600px;
	margin-top: 220px; /* El margin top es la mitad del alto de nuestro contenedor, en este ejemplo 400px/2=200px */
	margin-left: -300px /* El margin left es la mitad del ancho, en este ejemplo 600px/2=300px*/
}
</style>
<style type="text/css">


.button_example{
border:0px solid #72021c; -webkit-border-radius: 5px; -moz-border-radius: 5px;border-radius: 5px;font-size:14px;font-family:palatino linotype, palatino, serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
 background-color: #a90329; background-image: -webkit-gradient(linear, left top, left bottom, from(#a90329), to(#6d0019));
 background-image: -webkit-linear-gradient(top, #a90329, #6d0019);
 background-image: -moz-linear-gradient(top, #a90329, #6d0019);
 background-image: -ms-linear-gradient(top, #a90329, #6d0019);
 background-image: -o-linear-gradient(top, #a90329, #6d0019);
 background-image: linear-gradient(to bottom, #FA5858, #FA5858);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#a90329, endColorstr=#6d0019);
width:250px; 
}

.button_example:hover{
 border:1px solid #450111;
 background-color: #77021d; background-image: -webkit-gradient(linear, left top, left bottom, from(#77021d), to(#3a000d));
 background-image: -webkit-linear-gradient(top, #77021d, #3a000d);
 background-image: -moz-linear-gradient(top, #77021d, #3a000d);
 background-image: -ms-linear-gradient(top, #77021d, #3a000d);
 background-image: -o-linear-gradient(top, #77021d, #3a000d);
 background-image: linear-gradient(to bottom, #77021d, #3a000d);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#77021d, endColorstr=#3a000d);
 width:250px;
}
</style>


</head>


<body>
  
  
<div id="main">
    <div id="logo"> <a id="" href="http://www.bogota.gov.co/"><img src="../style/bogota.png" width="119" height="21"></a>    </div>
	<div id="encabezado"></div>
	
 
	
	    
<div id="Menu_principal" >
		<ul class="menu">
            <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
            <li><a href="Menu.php"><span>MENÚ</span></a></li>                    
            <li><a href="Logica/Cerrar_sesion.php">CERRAR SESIÓN</a></li>
			
		</ul>
  </div>
 
  <p>&nbsp;</p>
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
						                     		
                <div class="dochead">
                	<span class="dhead">Bienvenido <?php echo strtoupper(utf8_encode($_SESSION['NombreUsuario']));?></span>
                </div>

				<div>
                	<table width="100%"  border="0">
   <tr>
   <br><br><br>
   <br><br><br>
   <td> 
   </table>
                </div>
      
                                                      
                         
				
				<div class="datagrid"><table style="background:#F8E0E0">
				<thead><tr><th>Actividades</th><th>Descripción</th></tr></thead>
				<tbody>
						
						<?php
						$j = sizeof($vector);
						
						$a=1;
                          if($vector[1]==1)
						  {
						   ?>   
							<tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>  > 
							<td>						   
                               <form action="RegistroUsuarios.php"  >
                                 <p>
                                   <input type="submit" name="B_Registro_operario"  value="REGISTRO USUARIO" class="button_example" />
                                 </p>
                               </form>
							</td>
							
							<td>
							<justify>Registra diferentes usuarios como lo son administradores, operarios y empresas. Esta actividad solo puede ser utilizada por administradores del aplicativo.</justify>
							</td>
							    <?php
							  }
							  if($vector[2]==1)
						  		{
						   ?> 
						   
							<tr <?php if (($a % 2) == 0){echo $alt;}  $a++;?> >
							<td>
                                 <form action="EliminarOperario.php"  >
                                   <p>
                                     <input type="submit" name="B_Eliminacion_operario2"  value="ELIMINAR USUARIO" class="button_example" />
                                   </p>
                                 </form>
							</td>
							
							<td>
							<justify>Elimina toda clase de usuarios operarios, empresas y administradores del aplicativo.</justify>
							</td>
								  <?php
							  }
							  if($vector[3]==1)
						  		{
						   ?> 
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>> 
							<td>
                                 <form action="GestionarUsuarios.php"  >
                                   <p>
                                     <input type="submit" name="B_Consulta2"  value="GESTIONAR USUARIOS" class="button_example" />
                                   </p>
                                 </form>
							</td>
							
							<td>
							<justify>Activa y desactiva operarios (usuarios) de los Súper CADE.</justify>
							</td>
					
								  <?php
							  }
							  if($vector[4]==1)
						  		{
						   ?> 
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>
                                 <form action="ConsultarOperario.php"  >
								 <p>
                                 <input type="submit" name="B_Consulta"  value="INFORMACIÓN USUARIO" class="button_example" />
								 </p>
                                 </form>
						    </td>
							
							<td>
							<justify>Muestra la información de todos los usuarios operarios de los súper CADE.</justify>
							</td>

							<?php
							  }
							  if($vector[5]==1)
						  		{
						   ?> 
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>
                                 <form action="SupervisionOperario.php"  >
                                   <p>
                                     <input type="submit" name="B_Consulta2"  value="SUPERVISIÓN HORARIOS" class="button_example"/>
                                   </p>
                                 </form>
						    </td>
							
							<td>
							<justify>Muestra el horario de inicio y cierre de sesión de cada uno de los usuarios en los súper CADE</justify>
 <?php
							  }
							  if($vector[6]==1)
						  		{
						   ?> 
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>
                               <form action="EliminarEmpresas.php"  >
                                 <p>
                                     <input type="submit" name="B_Consulta"  value="ELIMINAR EMPRESAS" class="button_example" />
                                 </p>
                           </form>
						    </td>
							
							<td>
							<justify>Elimina las empresas vinculadas a pasaporte vital.</justify>
							</td>
				
								  <?php
							  }
							  if($vector[7]==1)
						  		{
						   ?>   
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>
                                 <form action="NumeroRegistros.php"  >
                                 <p>
                                     <input type="submit" name="B_Consulta"  value="NÚMERO REGISTROS" class="button_example" />
                                 </p>
                                 </form>
							</td>
							
							<td>
							<justify>Indica el número de registros hechos por el operario del Súper-CADE en determinada fecha.</justify>
							</td>

								  <?php
							  }
							  if($vector[8]==1)
						  		{
						   ?> 	 
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>
								<form action="ListadoPasaportes.php"  >
								<p>
								<input type="submit" name="B_Consulta"  value="LISTADO PASAPORTES" class="button_example" />
                                 </p>
                           </form>
						    </td>
							
							<td>
							<justify>Muestra un listado de los pasaportes registrados de todos los súperCADE.</justify>
							</td>
				
                                 <?php
							  }
							  if($vector[9]==1)
						  		{
						   ?> 
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>
                               <form action="Reportes.php"  >
                                 <p>
                                   <input type="submit" name="B_Eliminacion_operario"  value="CREACIÓN REPORTES" class="button_example" />
                                 </p>
                               </form>
							</td>
							
							<td>
							<justify>
							  <p>Son un grupo de reportes dinámicos donde el administrador  del sitio tiene la posibilidad de combinar información.</p>
							</justify></td>
					
							    <?php
							  }
							  if($vector[10]==1)
						  		{
						   ?> 
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>
                               <form action="ExportarExcel.php"  >
                                   <p>
                                     <input type="submit" name="B_Consulta3_"  value="     REPORTE EXCEL   " class="button_example" />
                                   </p>
                           </form>
						    </td>
							
							<td>
							<justify>Grupo de reportes en un formato especifico conocido con la extensión .xls.</justify>
							</td>
					
                                <?php
							  }
							  if($vector[11]==1)
						  		{
						   ?> 
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>
                                 <form action="Consultarpasaporte.php"  >
                                   <p>
                                     <input type="submit" name="B_Consulta3"  value="CONSULTA USUARIO" class="button_example" />
                                   </p>
                                 </form>
						    </td>
							
							<td>
							<justify>
							  <p>Verifica si el usuario está vinculado al servicio de  pasaporte vital.</p>
							</justify></td>
					                          
						    <?php
							  }
							  if($vector[12]==1)
						  		{
						   ?> 
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>
                          <form action="RenovacionUsuario.php"  >
                                         <p>
                                     <input type="submit" name="Renovacion_Carnet"  value="RENOVACIÓN CARNÉ" class="button_example">
                                         </p>
                           </form>
						    <td>
							<justify>El usuario podrá solicitar de nuevo su carné sin tener que inscribirse de nuevo a nuestra base de datos.</justify>
							</td>
					
                                   <?php
							  }
							  if($vector[13]==1)
						  		{
						   ?>      
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td> 
                                       <form action="InternetUsuario.php"  >
                                         <p>
                                     <input type="submit" name="B_Internet_usuario"  value="INTERNET USUARIO" class="button_example">
                                         </p>
                                       </form>
							<td>
							<justify>
							  <p>El usuario que se haya inscrito por internet tendrá que  reclamar su carné en alguno de los súperCADE por medio de esta opción.</p>
							</justify></td>
				
									    <?php
							  }
							  if($vector[14]==1)
						  		{
						   ?> 
						    <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>
                                       <form action="Modificacion_Datos.php"  >
                                         <p>
                                     <input type="submit" name="B_Modificacion_usuario"  value="MODIFICACIÓN DATOS" class="button_example">
                                         </p>
                                       </form>
						    <td>
							<justify>Modifica los datos de un usuario por medio de su número de documento.</justify></td>
				
									    <?php
							  }
							  if($vector[15]==1)
						  		{
						   ?> 
                            <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>             
                                        <form action="cambiocontra.php"  >
                             <p>
                                     <input type="submit" name="B_Registro_usuario"  value="RESTABLECER CONTRASEÑA" class="button_example">
                             </p>
                           </form>
						    <td>
							<justify>
							  <p>El usuario debe cambiar su clave periódicamente desde esta opción.</p>
							</justify></td>
			
                                        <?php
							  }
							  if($vector[16]==1)
						  		{
						   ?> 
                            <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>             
                                        <form action="Registro.php"  >
                             <p>
                                     <input type="submit" name="B_Registro_Pasaporte"  value="REGISTRO PASAPORTE" class="button_example">
                             </p>
                           </form>
						    <td>
							<justify>Se registraran los adultos mayores y pensionados en el pasaporte vital desde esta opción.</justify></td>
			
                                        <?php
							  }
							  if($vector[17]==1)
						  		{
						   ?> 
                            <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>             
                                        <form action="RegistroServicioEmpresa.php"  >
                             <p>
                                     <input type="submit" name="B_Renovacion_Pasaporte"  value="REGISTRO SERVICIO EMPRESA " class="button_example">
                             </p>
                           </form>
						    <td>
							<justify>La empresa vinculada podrá registrar el uso del servicio por parte de los usuarios inscritos a pasaporte vital.</justify>
							</td>
                                        <?php
							  }
							  if($vector[18]==1)
						  		{
						   ?> 
                            <tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
							<td>             
                                        <form action="CambioActividades.php"  >
                             <p>
                                     <input type="submit" name="B_Renovacion_Pasaporte"  value="CAMBIO DE ACTIVIDADES " class="button_example">
                             </p>
                           </form>
						    <td>
							<justify>
							  <p>El administrador del lugar podrá cambiar actividades a  cualquiera de los usuarios inscritos al modulo de pasaporte vital.</p>
							</justify></td>
                                        <?php
							  }
						   
						   ?>
						<tr <?php if (($a % 2) == 0){echo $alt;} $a++; ?>>
						<td> 
						<td>
							
						</td>
					</tbody>
					</table></div>
     
                                   
                         
                          
   </td>
    </tr>
</table>
          
 <br><br><br>
 <br><br>
</div>
<div>
 <br><br><br>
 <br><br>
  </div>
</div>

<script type="text/javascript">
</script>
</body></html>
<?php
				
				}else{
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://idrd.gov.co/SIM/\">";
					}
			
							?>