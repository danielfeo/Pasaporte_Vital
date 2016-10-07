
<?php
session_start();
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="../js/apprise.js"></script>
<link rel="stylesheet" href="../css/apprise.css" type="text/css" />
<script>
				function preguntar() {
				  apprise('¿Color rojo?', {'verify':true}, function(r) {
					if(r) { <?php
        		//echo "<meta http-equiv=\"refresh\" content=\"0;URL=../menu.php\">";	?>
					} else {
					  document.getElementById("colores").style.backgroundColor='#FF0';
					}
				  });
				}
				</script>
                
<?php
include ("../Datos/Conexion.php");
$Conn = conectar();


$usuario= $_POST['TB_Usuario'];
$contraseña= $_POST['TB_Password'];

$sql= "CALL SP_Login('$usuario')";

$resultado = mysql_query($sql,$Conn)or die(mysql_error());

desconectar($Conn);
if (!$resultado) {
	?> 
        <script language="JavaScript" type="text/javascript">
		alert("La pagina solicitada no esta disponible, intentelo nuevamente.");
		</script>         
		<?php
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
	
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
}
$fila= mysql_fetch_row($resultado);
	

if(!empty($fila)){


     if($fila[4] == "ACTIVO"){		

		if(md5($contraseña)== $fila[3]){
		
			$_SESSION['estado']="correcto";
			$_SESSION['id']=$fila[1];
			
			if($fila[0]==2){
				$Conn = conectar();
				$sql2= "SELECT * FROM pasaporte_usuario WHERE idUsuario='$usuario'";
				$resultado2 = mysql_query($sql2,$Conn)or die(mysql_error());
				desconectar($Conn);
				$fila2= mysql_fetch_row($resultado2);
			$_SESSION['nombre']=$fila2[2]." ".$fila2[3];
			
			$fecha = strtotime($fila2[5]);
			$newformat = date('Y-m-d',$fecha);
			$dias=2;
			$nuevafecha =strtotime ( '-8 day' , strtotime ( $newformat ) ) ;
			$hoy = date('Y-m-d');
			if($hoy> date('Y-m-d',$nuevafecha)&&$hoy< date('Y-m-d',$fecha))
			{
				?> 
        <script language="JavaScript" type="text/javascript">
		alert("Faltan menos de 8 dias para que finalize su contrato");
		</script>         
		<?php
				
				}
			}else{
				$_SESSION['nombre']="ADMINISTARDOR";
				}
			
			
			$_SESSION['rol']=$fila[0];
			$_SESSION['actualizacion']=0;
			$_SESSION['alerts']=0;
			
			$Conn = conectar();
			$accion=utf8_decode("Inicio Sesion");			
			$sql= "CALL SP_RegistrarLogin('$fila[1]','$fila[0]','$usuario','$accion','--')";
			
			mysql_query($sql,$Conn)or die(mysql_error());
			desconectar($Conn);
		
			if($fila[0]== 1){
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";	//apprise('Hello', {'animate':true});
			}
			if($fila[0]== 2){				
        		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";								
			}
			if($fila[0]== 3){				
        		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";				
			}
				
		}
		else{
		?> 
        <script language="JavaScript" type="text/javascript">
		alert("Contraseña Incorrecta");
		</script>         
		<?php
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";		

		}
	 }

      else{
		  
		?> 
        <script language="JavaScript" type="text/javascript">
		alert("En estos momentos usted se encuentra inacitvo");
		</script>         
		<?php
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";		
		  
		  }		
	
}
else{
	
		?> 
        <script language="JavaScript" type="text/javascript">
		alert("Usuario Incorrecto");
		</script>         
		<?php
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php\">";

}




?>