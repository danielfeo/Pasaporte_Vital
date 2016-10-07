<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="" xml:lang="en"><head><title>Pasaporte Vital</title><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!-- **** stylesheet **** --><link rel="stylesheet" type="text/css" href="style.css">
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

</head>
<body>

<div id="main">
    <div id="logo"> <a id="" href="http://www.bogota.gov.co/"><img src="../style/bogota.png" width="119" height="21"></a>    </div>
	<div id="encabezado"></div>  
    

  <div></div>
  <div id="Menu_principal">
  	
	<ul class="menu">
	
            <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
            <?php if(isset($_SESSION['ID'])){ ?>
			<li><a href="Menu.php"><span>MENU</span></a></li>   
            <li><a href="Logica/Cerrar_sesion.php">CERRAR SESION</a></li>
			<?php }else{ ?>
			<li><a href="Registro.php">REGISTRO</a></li>
			<li><a href="Renovacion_Pasaporte.php">RENOVACION</a></li>
			<li><a href="Pasaporte.php">PASAPORTE</a></li>
			<?php } ?>
			
		</ul>
	
  </div>
 
  <p>&nbsp;</p>
  <div id="site_contentidrd" style="margin:auto;  width:700px;">

                       <div id="templatemo_header_3">
                          <br> <br>  
                          <br> 
                      
						   
						   <br>  <br>
                 
				 <?php if(isset($_SESSION['ID'])){ 
				 $var="Bienvenido a la herramienta autom&aacute;tica de pasaporte vital diseñada para la organización de la información.";
				 $va = utf8_decode($var);
				 
				 ?>
							<center>
						  <h1><font color="#FF0000" size="6">.: SISTEMA DE INFORMACI&Oacute;N MISIONAL<br/> MÓDULO DE PASAPORTE VITAL :.</font></h1>
					     </center>
                         <div align="justify" style="background:#E60000" >                  
                          <FONT FACE="courier" SIZE=3 color="#ffffff"><p align="justify"> <?php echo $var; ?> </p>
<p  align="justify">Con esta herramienta usted podrá gestionar el trámite del pasaporte vital, además podrá crear, eliminar y consultar usuarios. También a partir de la información podrá generar reportes.</p>
<p align="justify">Esta herramienta pretende sistematizar la mayor parte de procedimientos aprobados. Si tuviera alguna duda del funcionamiento podrá encontrar en la parte de ayuda del aplicativo un PDF con toda la información necesaria que lo guiara paso a paso por el aplicativo. </p></FONT>
						</div>
				<?php }else{ ?>
				
						<center>
						  <h1><font color="#FF0000" size="6">.: PASAPORTE VITAL :.</font></h1>
					     </center>
						 
					<div align="justify" style="background:#E60000; border-radius:9px;-moz-border-radius: 9px; -webkit-border-radius : 9px; padding: 20px 20px 20px 20px;" >           
                         <br> <FONT FACE="courier" color="#ffffff" SIZE=3 ><justify>Pasaporte Vital ofrece servicios en recreación, deporte, cultura y turismo, a través de la tarjeta Pasaporte Vital para los adultos hombres mayores de 60 años, mujeres mayores de 55 y pensionados sin distingo de edad de Bogotá D.C. vinculando para ello  a entidades públicas y privadas, en calidad de aportantes y prestadores de servicios. </justify></FONT><br>
					</div>
						<br>
						<center><img  src="../Imagenes/pasaportevital.jpg" width='320' height='250'> <center>
                 <?php } ?>             
							
            <br><br><br><br><br>           
    </div>    
				


</div>

</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
</script>
</body></html>
