<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="" xml:lang="en"><head><title>Pasaporte Vital</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" type="text/css" href="style.css">
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
 <meta charset="UTF-8" />
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
				<img src="imagenes/prueba.png" href="" width="961" height="280" align="absbottom" longdesc="12345"  title="PASAPORTE VITAL"/>
                </div>
			 <?php	
				}	
			?>                                   
  
    
    

  <div></div>
  <div id="Menu_principal">
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
                          <br> <br>  
                          <br> 
                         <center>
						  <h1><font color="#FF0000" size="6">.: REGISTRO DEL SERVICIO<br/> MODULO DE PASAPORTE VITAL :.</font></h1>
					     </center>
						   
						   <br>  <br>
                        <div align="justify" style="background:#FFD2D3" >                  
                         <FONT FACE="courier" SIZE=3 >
                         <p align="justify">
                          Bienvenido a la herramienta automática de pasaporte vital diseñada para la organización de la información.</p>
							<p  align="justify">Con esta aplicación la empresa vinculada podrá registrar el servicio adquirido por el adulto mayor. </p>
							 <form action="Logica/ResgistroServicio.php" method="POST">
									<center><label>Cedula:</label>
									<input type="text" name="Cedula" id="Cedula"/>
									<input type="submit" name="BT_Ver" id="BT_Ver" value="REGISTRAR SERVICIO" /></center>
							 </form>
 </p></FONT> 
						</div>
                                                
               <br><br><br><br>         
    </div>    
					 


</div>
</div>
</body>
</html>
