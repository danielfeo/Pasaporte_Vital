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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/apprise.js"></script>
<link rel="stylesheet" href="css/apprise.css" type="text/css" />
 <link type="text/css" rel="stylesheet" href="CSS/usuarioformulario.css">


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
  <img src="imagenes/prueba.png" href="" width="961" height="280" align="absbottom" longdesc="12345"  title="PASAPORTE VITAL"/
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
						   <br>  <br>
						<center>
						  <h1><font color="#FF0000" size="6">.: CAMBIO CONTRASEÑA :.</font></h1>
					     </center>
					<form id="formInscripcion" action="Logica/cambiocontra.php" method="post" onsubmit="return checkForm(this);" >	 
					<div align="center" style="background:#FFD2D3 " >           
                        <justify> <FONT FACE="courier" color="#190707" SIZE=3 >
						<label><righ>Contraseña Actual:</label>
						<input type="password" name="TB_CActual" size="30" maxlength="10" title="ESCRIBA LA CONTRASEÑA ACTUAL."/>
						<br>
						<label>Contraseña Nueva:</label>
						<input type="password" name="TB_CNueva"  size="30" maxlength="10" title="INGRESE LA NUEVA CONTRASEÑA. Maximo 10 digitos."/>
						<br>
						<label>Confirmacion:</label>
						<input type="password" name="TB_CNueva2"   size="30" maxlength="10" title="CONFIRME CONTRASEÑA. "/>
						<br><br>
						<input type="submit" name="B_Registro"  value="CAMBIAR" class="button medium red">
						 </justify></FONT>
					</div>
					</form>
						<br><br><br><br><br>
						
                       
    </div>    
		

</div>

</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
</script>
</body></html>
