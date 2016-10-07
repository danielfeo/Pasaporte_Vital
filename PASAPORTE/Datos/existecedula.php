<?php
include ("..//Datos/Conexion.php");
session_start();


   $cedula = $_REQUEST['cedula'];
   
 $_SESSION['cedu']=$cedula;  
		$Conn2 = conectar2();
		$sql0="SELECT DISTINCT A.Id_Actividad FROM actividades A, actividad_acceso B WHERE A.Id_Actividad  IN (SELECT Id_Actividad FROM actividad_acceso WHERE Id_Persona=(SELECT Id_Persona FROM persona WHERE Cedula='$cedula')) AND A.`Id_Modulo`=3;";
		$resultado10 = mysql_query($sql0,$Conn2)or die(mysql_error());
		desconectar($Conn2);

	if(mysql_num_rows($resultado10)==null){
   
		$Conn2 = conectar2();
		$sql1="SELECT * FROM persona a, acceso b  WHERE a.Cedula='$cedula' AND b.`Id_Persona`=(SELECT Id_Persona FROM persona WHERE Cedula='$cedula');";
		$resultado1 = mysql_query($sql1,$Conn2)or die(mysql_error());
		desconectar($Conn2);

			if(mysql_num_rows($resultado1) > 0){
				echo '<div id="Error" align="justify">
				El Usuario ya se encuentra registrado en algún módulo de SIM, posee usuario y contraseña, 
				si desea que tenga acceso al modulo de pasaporte vital de clic en siguiente y registre sus actividades de pasaporte vital.
				<br><br>';
				echo '<td><a href=\'../PASAPORTE/RegistroUsuarios.php?var=2\'>SIGUIENTE -></a></td>
				<br><br>
				</div>';
			}
			else{
				$Conn2 = conectar2();
				$sql11="SELECT * FROM  acceso WHERE  Id_Persona=(SELECT Id_Persona FROM persona WHERE Cedula='$cedula');";
				$resultado11 = mysql_query($sql11,$Conn2)or die(mysql_error());
				desconectar($Conn2);
				
					if(mysql_num_rows($resultado11) > 0){
						
						echo "nooooo";
						
					}else{
					
						$Conn2 = conectar2();
						$sql1111="SELECT * FROM persona WHERE Cedula='$cedula';";
						$resultado1111 = mysql_query($sql1111,$Conn2)or die(mysql_error());
						desconectar($Conn2);
						
						if(mysql_num_rows($resultado1111) > 0){
							echo '<div id="Error" align="justify">
							El Usuario tiene los datos en nuestra base de datos pero si quiere ingresar al SIM debe tener usuario , contraseña y actividades, si deseas 
							hacer esta operación da clic en siguiente.
							<br><br>';
							echo '<td><a href=\'../PASAPORTE/RegistroUsuarios.php?var=3\'>SIGUIENTE -></a></td>
							<br><br>
							</div>';
						}else{
							echo '<div id="Error" align="justify">
							El Usuario puede seguir su registro normal dando clic en siguiente.
							<br><br>';
							echo '<td><a href=\'../PASAPORTE/RegistroUsuarios.php?var=1 \'>SIGUIENTE -></a></td>
							<br><br>
							
							</div>';
							
							
							
						}
					}
				}
	}else{
	
		$Conn = conectar();
		
		$sql0="SELECT * FROM `pasaporte_login` WHERE idUsuario='$cedula';";
		$resultado10 = mysql_query($sql0,$Conn)or die(mysql_error());
		desconectar($Conn);
		if(mysql_num_rows($resultado10) > 0){
		
			echo '<div id="Error" align="justify">
			El Usuario ya se encuentra inscrito en pasaporte vital si desea cambiar alguna actividad vaya a cambio de actividad.
			<br><br></div>';
			
		}else{
		
			echo '<div id="Error" align="justify">
			El Usuario fue registrado por el super administrador, y por tanto necesita ingresar unos datos para su activacion.
			<br><br>';
			echo '<td><a href=\'../PASAPORTE/RegistroUsuarios.php?var=4 \'>SIGUIENTE -></a></td>
			<br><br>
			
			</div>';
		
	    }
	}
	
   
?>