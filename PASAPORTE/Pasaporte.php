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
  <title></title>
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
        <h1><font color="#FF0000" size="6"><center>.: Pasaporte Vital :.</center></font></h1>
      </center>
      <div class="uno" id="dos"></div>
      <div id="accordion" style="background:#E60000" onmouseover="this.style.background = '#E60000'">
        
                            <h3><font color="black">ORIGEN</font></h3>
                            <div style="background:#E60000">
                              <p style="color: #ffffff;"> El pasaporte fue creado mediante el Acuerdo 06 de 1997 del Concejo de Bogot&aacute; y busca el acceso gratuito o con descuentos a servicios y espect&aacute;culos recreativos, deportivos, tur&iacute;sticos y culturales.</p>
                            </div>
							
                            <h3><font color="black">OBJETIVO</font></h3>
                            <div style="background:#E60000">
                              <p style="color: #ffffff;"> El objetivo principal del Pasaporte Vital es ofrecer servicios en recreaci&oacute;n, deporte, cultura y turismo, a trav&eacute;s de la tarjeta Pasaporte Vital para los adultos hombres mayores de 60 a&ntilde;os, mujeres mayores de 55 y pensionados sin distingo de edad de Bogot&aacute; D.C. vinculando para ello a entidades p&uacute;blicas y privadas, en calidad de aportantes y prestadores de servicios.
                              </p>
                              <p><center> <img src="Imagenes/logoPasaporte.jpg" alt="" width="416" height="296" /></center></p>
                            </div>
							
                            <h3><font color="black">SUPERCADES</font></h3>
                            <div style="background:#E60000">
                              <p style="color: #ffffff;"> Para obtener su Pasaporte Vital dirijase a Supercades ubicados en:</p>
                              <ul style="color: #ffffff;">
                                <li>20 de Julio (Costado Suroriental de la iglesia 20 de julio)</li>
                                <li>Suba (Calle 146A N&deg; 105 &ndash; 95)</li>
                                <li> Catastro (Carrera 30 N&deg; 25 - 90)</li>
                                <li> Am&eacute;ricas (Avenida Carrera 86 N&deg; 43 - 55 sur)</li>
                                <li> Bosa (Calle 57Q sur N&deg; 72D-12 Autopista Sur frente al portal T.)</li>
                              </ul>
                              <p style="color: #ffffff;">En los horarios de 7:00 am a 7:00 pm en jornada continua de lunes a viernes y s&aacute;bados de 8:00 am a 11 a.m.</p>
                              <p style="color: #ffffff;">Oficina de Pasaporte Vital (UDS: Av. 68 Calle 63) de 8:00 am a 12 pm y 2:00 a 4:00 pm de lunes a viernes. Presentar c&eacute;dula de ciudadan&iacute;a actualizada.</p>
                            </div>
							
                            <h3><font color="black">CONTACTOS</font></h3>
                            <div style="background:#E60000">
                              <p style="color: #ffffff;">Instituto Distrital de Recreaci&oacute;n y Deporte IDRD<br />
                                Calle 63 No. 47-06<br />
                                PBX: 6605400 Ext. 5213 - 5216<br />
                                pasaporte.vital@idrd.gov.co<br />
                                Supercades<br />
                                Oficina de atenci&oacute;n: U.D.S.<br />
                                Tel. 2315260</p>
                            </div>
							
                            <h3><font color="black">BENEFICIOS</font></h3>
                            <div style="background:#E60000">
                              <p style="color: #ffffff;">El Instituto Distrital de Recreacion y Deporte con ayuda de empresas vinculadas, presta  a trav&eacute;s de Pasaporte Vital un conjunto de beneficios que el adulto mayor puede obtener. </p>
                            </div>
							
                            <h3><font color="black">PROYECCION OPTICA</font></h3>
                            <div style="background:#E60000">
                              <p><center><img src="Imagenes/UNO.png" alt="" width="416" height="396" /></center></p>
                            </div>
							
                            <h3><font color="black">TURISMO</font></h3>
                            <div style="background:#E60000">
                              <p><img src="Imagenes/DOS.png" alt="" width="300" height="380" />
                              <img src="Imagenes/TRES.png" alt="" width="300" height="380" /></center></p>
                            </div>
							
                            <h3><font color="black">VARIOS</font></h3>
                            <div style="background:#E60000">
                              <p><CENTER><img src="Imagenes/CUATRO.png" alt="" width="300" height="380" />
                              </center></p>
                            </div>
							
                            <h3><font color="black">CULTURA</font></h3>
                            <div style="background:#E60000">
                              <p><img src="Imagenes/SIETE.png" alt="" width="300" height="380" />
                              <img src="Imagenes/OCHO.png" alt="" width="300" height="380" /></center></p>
                            </div>
							
                            <h3><font color="black">RECREACION Y SECTOR SOLIDARIO</font></h3>
                            <div style="background:#E60000">
                              <p><img src="Imagenes/SEIS.png" alt="" width="300" height="380" />
                              <img src="Imagenes/CINCO.png" alt="" width="300" height="380" /></center></p>
                            </div>
							
                             <h3><font color="black">SALUD</font></h3>
                            <div style="background:#E60000">
                              <p><img src="Imagenes/NUEVE.png" alt="" width="300" height="380" />
                              <img src="Imagenes/DIEZ.png" alt="" width="300" height="380" /></center></p>
                            </div>
                            
      </div>
	  <br><br><br>
	   <div align="justify" style="background:#E60000" >                  
                          <FONT FACE="courier" SIZE=3 ><p align="justify"> <?php echo "".htmlentities($var); ?> </p>
<p  align="justify" style="color: #ffffff;">
		El plegable de beneficios que ofrece el programa Pasaporte Vital lo podr&aacute; encontrar en el siguiente link:
	  <br><center>
	  <a style="color: #ffffff;" href="../Imagenes/PLEGABLE PASAPORTE 1.jpg">DESPLEGABLE UNO</a></p></font>
	  <a  style="color: #ffffff;" href="../Imagenes/PLEGABLE PASAPORTE 2.jpg">DESPLEGABLE DOS</a></p></font>
	  </center>
</p>

						</div>
						
	  
                          <p>&nbsp;</p>
                          <p><br> 
                          </p>
                         <center>
						  <h1>&nbsp;</h1>
						  <p>&nbsp;</p>
						  <p>&nbsp;</p>
      </center>
    </div>    
					   
            


</div>

</div>
</body></html>
