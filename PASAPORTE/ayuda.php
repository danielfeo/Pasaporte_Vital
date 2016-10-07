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
			<li><a href="Menu.php"><span>MENÚ</span></a></li>   
            <li><a href="Logica/Cerrar_sesion.php">CERRAR SESIÓN</a></li>
			<?php }else{ ?>
			<li><a href="Registro.php">REGISTRO</a></li>
			<li><a href="Renovacion_Pasaporte.php">RENOVACIÓN</a></li>
			<li><a href="Pasaporte.php">PASAPORTE</a></li>
			<?php } ?>
			
		</ul>
  </div>
   
  <p>&nbsp;</p>
  <div id="site_contentidrd" style="margin:auto;  width:700px;>

                       <div id="templatemo_header_3">
                          <br> <br>  
                          <br> 
                         <center>
						  <h1><font color="#FF0000" size="6">.: AYUDA<br/> MÓDULO DE PASAPORTE VITAL :.</font></h1>
					     </center>
						   
						   <br>  <br>
                        
                       <div id="ingreso">
                         <table width="100%" height="296" border="0">
                           <tr>
                             <td width="53%" height="95">&nbsp;</td>
                             <td width="36%">&nbsp;</td>
                             <td width="11%">&nbsp;</td>
                           </tr>
                           <tr>
                             <td height="97">&nbsp;</td>
                             <td>
                            <?php 
							if(isset($_SESSION['rol'])){	
							if($_SESSION['rol']==1)
						    {
						    ?>		
                            <p><font color="#FF0000" size="3">DESCARGA TU INSTRUCTIVO         
                            <a href="../Documentos/Manual de Administrador.pdf">admin AQUI</a></p></font>	
							<?php 													
							} else{
							?>
                                <?php if($_SESSION['rol']==2)
						        {
						        ?>
							     <p><font color="#FF0000" size="3">DESCARGA TU INSTRUCTIVO         
                                  <a href="../Documentos/Manual Operario.pdf">operario AQUI</a></p></font>
							
							    <?php 													
							    } 			
							} 
							}else{?>
							<p><font color="#FF0000" size="3">DESCARGA TU INSTRUCTIVO         
                            <a href="../Documentos/Manual Internet.pdf">AQUI</a></p></font> 	
							
                            <?php }
							?>
                               
                             </td>
                             <td>&nbsp;</td>
                           </tr>
                           <tr>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                           </tr>
                         </table>
                          
							
				         </div>
                         
                        
    </div>    
				


</div>

</div>
</body></html>
