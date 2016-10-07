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

<meta charset="utf-8" />
  <title>jQuery UI Accordion - No auto height</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  });
  </script>
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
			<li><a href="Menu.php"><span>MEN�</span></a></li>   
            <li><a href="Logica/Cerrar_sesion.php">CERRAR SESI�N</a></li>
			<?php }else{ ?>
			<li><a href="Registro.php">REGISTRO</a></li>
			<li><a href="Renovacion_Pasaporte.php">RENOVACION</a></li>
			<li><a href="Pasaporte.php">PASAPORTE</a></li>
			<?php } ?>
			
	</ul>
  </div>
 
  <p>&nbsp;</p>
  <div id="site_contentidrd" style="margin:auto;  width:700px;>


    <div id="templatemo_header_3">
      <center>
        <h1><font color="#FF0000" size="6"><center>
          <h1><font color="#FF0000" size="6">.: RENOVACI&Oacute;N DEL PASAPORTE</font></h1>
          <h1><font color="#FF0000" size="6">VITAL:.</font></h1>
        </center></font></h1>
      </center>
      <div class="uno" id="dos"></div>
      <div align="justify" style="background:#E60000; border-radius:9px;-moz-border-radius: 9px; -webkit-border-radius : 9px; padding: 20px 20px 20px 20px;" >
        <p align="justify" style="color: #ffffff;"> <FONT FACE="courier" SIZE=3 color="#ffffff">Se&ntilde;or usuario si usted ha perdido por alg&uacute;n motivo su carnet de pasaporte vital usted puede renovar su carnet de esta manera:</p>
        <p  align="justify" style="color: #ffffff;"> 1. Ingrese su n&uacute;mero de c&eacute;dula aqu&iacute;: </p>
      </div>
      <form id="form1" method="post" action="Logica/renovacion.php">
        <p>
          <label for="TB_Cedula" style="color: #000000;">C&eacute;dula:</label>
          <input type="text" name="TB_Cedula" id="TB_Cedula" />
          <input type="submit" name="BT_Cedula" id="BT_Cedula" value="Solicitar" />
        </p>
        <p>&nbsp;</p>
      </form>
      <p><?php
      if(!empty($_SESSION['R_nombre'])){

            $nombre = $_SESSION['R_nombre'];
			$cedula= $_SESSION['R_cedula'];
			$apellido = $_SESSION['R_apellido'];
			
			echo " <center>".$cedula."    ".$nombre." ".$apellido."</center>";
			$_SESSION['R_nombre'] = ""; 
	  	$_SESSION['R_cedula'] = "";
		$_SESSION['R_apellido'] = "";
			?>
      <p>      
      <div class="uno" id="dos"></div>
      <div align="justify" style="background:#E60000" >
        <p align="justify" style="color: #ffffff;"> 2 . Usted actualmente se encuentra en la base de datos de nuestro sistema y se puede acercarse a alguno de nuestros supercade para solicitar el servicio de renovacion de nuestro carnet Pasaporte Vital.</p>
        <p align="justify" style="color: #ffffff;">Puntos donde usted se puede acercar a reclamarlo:</p>
        <p align="justify" style="color: #ffffff;">20 de Julio (Costado Suroriental de la iglesia 20 de julio) </p>
        <p align="justify" style="color: #ffffff;"> Suba (Calle 146A N&deg; 105 &ndash; 95)  Catastro (Carrera 30 N&deg; 25 - 90)  </p>
        <p align="justify" style="color: #ffffff;">Am&eacute;ricas (Avenida Carrera 86 N&deg; 43 - 55 sur)</p>
        <p align="justify" style="color: #ffffff;"> Bosa (Calle 57Q sur N&deg; 72D-12 Autopista Sur frente al portal T.) </p>
        <p align="justify" style="color: #ffffff;">&nbsp;</p>
        <p align="justify" style="color: #ffffff;">En los horarios de 7:00 am a 7:00 pm en jornada continua de lunes a viernes y s&aacute;bados de 8:00 am a 11 a.m. Oficina de Pasaporte Vital (UDS: Av. 68 Calle 63) de 8:00 am a 12 pm y 2:00 a 4:00 pm de lunes a viernes. Presentar c&eacute;dula de ciudadan&iacute;a actualizada.</p>
      </div>      
            
            <?php
	  }else{
		  if(!empty($_SESSION['no'])){
	  	?>
  <div align="justify" style="background:#E60000" >
        <p align="justify"> <FONT FACE="courier" SIZE=3 color="#ffffff">El n&uacute;mero de c&eacute;dula ingresado no se encuentra en nuestra base de datos por lo tanto debe diligenciar el siguiente formulario o acercarse a alguno de nuestros supercades. <a href="Registro.php">FORMULARIO</a></p>
      </div>

		<?php
		$_SESSION['no']=null;
		  }
	  }
			?>
      <br> 
                          </p>
                         <center>
						  <h1>&nbsp;</h1>
      </center>
    </div>    
					   
				


</div>
</div>
</body></html>
