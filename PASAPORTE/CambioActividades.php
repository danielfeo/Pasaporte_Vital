<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="" xml:lang="en"><head><title>Pasaporte Vital</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><!-- **** stylesheet **** --><link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
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
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/apprise.js"></script>
<link rel="stylesheet" href="css/apprise.css" type="text/css" />
<link type="text/css" rel="stylesheet" href="Css/usuarioformulario.css">
</head>
<body>

<div id="main">
    <div id="logo"> <a id="" href="http://www.bogota.gov.co/"><img src="../style/bogota.png" width="119" height="21"></a>    </div>
	<div id="encabezado"></div>
	
  
	       <?php 
			if(isset($_SESSION['rol'])){
				}	
			else{?>
				<div id="visor">
				<img src="Imagenes/prueba.png" href="" width="961" height="280" align="absbottom" longdesc="12345"  title="PASAPORTE VITAL"/>
                </div>
			 <?php	
				}	
			?>                                   
  
  
    
    

  <div></div>
  <div id="Menu_principal">
  <ul class="menu">
         <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
            <?php if(isset($_SESSION['ID'])){ ?>
			<li><a href="Menu.php"><span>MENÚ</span></a></li>   
            <li><a href="Logica/Cerrar_sesion.php">CERRAR SESIÓN</a></li>
			<?php }else{ ?>
			<li><a href="Registro.php">REGISTRO</a></li>
			<li><a href="Renovacion_Pasaporte.php">RENOVACION</a></li>
			<li><a href="Pasaporte.php">PASAPORTE</a></li>
			<?php } ?>
			
		</ul>
  </div>
  
  <p>&nbsp;</p>
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                          <br> <br>  
                          <br> 
                         <center>
						  <h1><font color="#FF0000" size="6">.: CAMBIO DE ACTIVIDADES :.</font></h1>
					     </center>
						 <?php
						   if(empty($_POST['CT_ID'])){?>
						   <form id="form1" method="post" action="CambioActividades.php">
						  <center>
						     <label>Cedula: 
								<input type="text" name="CT_ID" id="CT_ID" />
				               <input type="submit" name="BT_Ver" id="BT_Ver" value="Usuario" />
						     
					         <p>&nbsp;</p>
                          </center>
					     </form>
						 <?php
						   }?>
						   <br>  <br>
                        
				<form id="form1" method="post" action="Logica/CamActividades.php">
                       
  <?php
				$id=$_POST['CT_ID'];
						include ("Datos/Conexion.php");
						$Conn = conectar2();
					  if(!empty($_POST['CT_ID'])){
						 	
						$id=$_POST['CT_ID'];
						
					    $sql="SELECT  A.`Id_Actividad` ,  B.`Nombre_Actividad` , A.`Estado` FROM actividad_acceso A , actividades B WHERE A.Id_Persona=(SELECT Id_Persona FROM persona WHERE Cedula='$id') AND A.Id_Actividad IN (SELECT Id_Actividad FROM `actividades` WHERE Id_Modulo=3) AND B.`Id_Modulo`=3 AND A.`Id_Actividad`=B.`Id_Actividad`;";  
					      
					 $result=mysql_query($sql); 
					 if($result!=NULL){ 
					    if(mysql_num_rows($result)>0){
						
						$sqBD2="SELECT * FROM `persona` WHERE Cedula='$id'";				
						$resultado = mysql_query($sqBD2,$Conn)or die(mysql_error());	
						$fila= mysql_fetch_row($resultado);
						$nombre1= $fila[5];
						$nombre2= $fila[6];
						$apellido1= $fila[3];
						$apellido2= $fila[4];
						echo "<label>El Usuario al que intenta cambiar activiades es :".$nombre1." ".$nombre2." ".$apellido1." ".$apellido2."<br>Si desea cambiar las activiades seleccione las actividades en la siguiente tabla y luego dar clic en el boton Modificar, si no desea modificar ir al boton Menu.<br><br></label>";
							?>
						 <table width="100%" border="1" id="customers">
							<tr>
							<th>ACTIVIDAD</th>
							<th>SELECCIONAR</th>
							</tr>
						 <?php
						$var=1;
					    while($row=mysql_fetch_array($result)){ 
						if($var % 2==0){
						    echo "<tr class=\"alt\">";
						}else{
							echo "<tr align=\"center\">";
							}
						echo "<td >".$row['Nombre_Actividad']."</td>";					
						//echo "<td><a href='Datos/EliminarEmpresa.php?id=".$row['Nit']."'>Eliminar</a></td>";
						$var2 = $row['Estado'];
						
						if($var2==1){
							echo "<td><input name=\"postre[]\" type=\"checkbox\" value='".$row['Id_Actividad']."'
							checked onClick=\"habilitaDeshabilita(this.form)\">
							</td>";
							echo "</tr>";
						}else{
							echo "<td><input name=\"postre[]\" type=\"checkbox\" value='".$row['Id_Actividad']."' \">
							</td>";
							echo "</tr>";
						}
						$var++;
					     } 
						 ?>
							<center>
								<input type="text" name="CT_ID2" readonly="readonly" id="CT_ID2" value=" <?php echo "".$id ?> " />
							   <input type="submit" name="BT_Modificar" id="BT_Modificar" value="Modificar" />
							   <br><br>
                          </center>
						 <?php 
						 }else{ 
					  ?>	
						 <script>
							alert("No se encontro ningun usuario con el numero de cedula ingresado.");
						</script>  
						<?php  
						echo "<meta http-equiv=\"refresh\" content=\"0;URL=../PASAPORTE/CambioActividades.php\">";
						} 
						mysql_free_result($result); 
					 } 
					 desconectar($Conn);
					 
					 }
					?>
					</table>
					
					<br><br><br><br><br>
				</form>
                         
                        
    </div>    
					
</div>

</div>

</body></html>
