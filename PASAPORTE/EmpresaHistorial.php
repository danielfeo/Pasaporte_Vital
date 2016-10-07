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
    
            <li><a href="index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
          <?php 
			if(isset($_SESSION['estado'])){	
				if ($_SESSION['estado']=="correcto"){
					?>
                    <li><a href="menu.php"><span>MENÚ</span></a>
                        <ul class="menu-hover">
                            <?php if($_SESSION['rol']==1)
						{?>
                        <li><a href="consultarpasaporte.php" >Consultar Pasaportes</a></li>						
                        <li><a href="SupervisionOperario.php">Supervision Operario</a></li> 
                        <li><a href="ConsultarOperario.php"  >Consultar Operarios</a></li>
                        <li><a href="numeroregistros.php"    >Registros Pasaporte</a></li>
                        
                        <li><a href="GestionarUsuarios.php"  >Gestionar Usuarios</a></li>
                        <li><a href="listadopasaportes.php"  >Listado Pasaportes</a></li>
                        <li><a href="eliminaroperario.php"   >Eliminar Operarios</a></li>
                        <li><a href="registrousuarios.php"   >Registro Usuarios</a></li>
                        <li><a href="eliminarempresas.php"   >Eliminar Empresas</a></li>
                        <li><a href="Registroempresa.php"    >Regsitro Empresa</a></li>
                        <li><a href="Exportarexcel.php"      >Reporte Excel</a></li>                        <li><a href="Reportes.php"           >Reportes</a></li>
                        
                        
                        
						<?php 													
							} 
							 if($_SESSION['rol']==2)
						{?> 
                        <li><a href="RenovacionUsuario.php"> Renovar Pasaporte</a></li>
                        <li><a href="internetusuario.php">Usuario Internet</a></li>
                        <li><a href="modificacion_datos.php">Modificar Datos</a></li>
                        <li><a href="consultarpasaporte.php"> Consultar</a></li>
                        <li><a href="registro.php"> Registro</a></li>
							<?php 													
							} if($_SESSION['rol']==3)
						{?> 
                        <li><a href="consultarpasaporte.php"> Consultar</a></li>
                        <li><a href="EmpresaHistorial.php"> Registro</a></li>
							<?php 													
							} ?>
                        </ul>
                    </li>
                    
                    <li><a href="Logica/Cerrar_sesion.php">CERRAR SESIÓN</a><?php
				}
				}else{?>
                	 <li><a href="pasaporte.php">PASAPORTE</a></li>
         			 <li><a href="registro.php" name="dili" value="diligenciar" >DILIGENCIAR</a></li>
                     <li><a href="Renovacion_Pasaporte.php">RENOVACION</a></li>
                     <?php
					}
					include ("Datos/Conexion.php");
                         $Conn = conectar();
						 $sql1="SELECT Empresa FROM empresavinculadatipo;";					
							 $resultado1 = mysql_query($sql1,$Conn)or die(mysql_error());
							 desconectar($Conn);
     				?>
        </li>
			
		</ul>
  </div>
 <table width="960" height="39" >
  <tr>
    <td>
	<a href="http://idrd.gov.co/htms/seccion-idrd_1.html"><img src="../Imagenes/Logo_Idrd.png" ></A> &nbsp
	<a href="http://www.idrd.gov.co/htms/seccion-programacin-deportes-conjunto_3110.html"><img src="../Imagenes/Juegos_Comunales.png" ></A> 
	<a href="http://idrd.gov.co/htms/seccion-noticias_1207.html"><img src="../Imagenes/Prensa.png" ></A> 
	<a href="http://idrd.gov.co/htms/seccion-sala-de-prensa_3200.html"><img src="../Imagenes/Sala_Prensa.png" ></A> 
	<a href="http://www.sided.idrd.gov.co/"><img src="../Imagenes/Sided.png" ></A>
	<a href="https://twitter.com/IDRD"><img src="../Imagenes/Twitter.png" ></A> 
	<a href="http://idrd.gov.co/htms/seccion-suprate-con-el-deporte_42.html"><img src="../Imagenes/Superate.png" ></A>	</td>
  </tr>
</table>
  <p>&nbsp;</p>
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                          <br> <br>  
                          <br> 
                         <center>
						  <h1><font color="#FF0000" size="6">.: REGISTRO BENEFICIO:.</font></h1>
						  <p>Elija la empresa que va prestar el servicio:</p>
						  <p><center>
                           <?php
 
    $combobit="";
    while ($fila = mysql_fetch_array($resultado1, MYSQL_NUM)) 
    {
        $combobit .=" <option>".$fila[0]."</option>"; 
    }

							   ?>
                               Empresa:
                               <select name="DDL_Sexo">
                                <?php echo $combobit; ?>
                                </select></center>
								Cedula:
								<input type="text" name="TB_Documento"  id="TB_Documento" size="30" maxlength="10" title="ESCRIBA AQUÍ EL NUMERO DE DOCUMENTO"/>
                          </p>
						  <p>&nbsp;</p>
						  <p>&nbsp;</p>
					     </center>
						   <br>  <br>
                   	
                       
    </div>    
					   
					   <div id="templatemo_header_2"><br><br>
               <a href="http://gustavopetro.com/"><img src="../Imagenes/petro.jpg" ></A>        
               <br><br>
               <a href="http://www.bogotahumana.gov.co/"><img src="../Imagenes/bogotahumana.png" ></A>               <br><br>       
               <a href="http://www.123bogota.gov.co/"><img src="../Imagenes/humana.png" ></A><br><br>	              
                <a href="http://www.bogota.gov.co/direccion/e6.htm"><img src="../Imagenes/defensor.jpg" ></A><br><br>            
				    <a href="http://mapas.bogota.gov.co/geoportal/"><img src="../Imagenes/gia.jpg" ></A><br><br>                <a href="http://www.alcaldiabogota.gov.co/sisjur/index.jsp"><img src="../Imagenes/consulta.jpg" ></A>


    </div>             


</div>
<div id="pie_pagina">
          <br>
          <table width="960" border="0">
  <tr>
    <td width="261" id="F_vinculos" ><a href="http://www.idrd.gov.co/htms/seccion-idrd_1.html"><font color="#000000">&gt;&gt;Informacion institucional</font></a></td>
    <td width="354" id="F_vinculos"><a href="http://www.idrd.gov.co/htms/seccion-organigrama_11.html#"><font color="#000000">&gt;&gt;Directorio de Entidades</font></a></td>
    <td width="331" id="F_vinculos"><a href="http://www.idrd.gov.co/htms/seccion-organigrama_11.html#"><font color="#000000">&gt;&gt;Instituto Distrital de Recreacion y Deporte</font></a></td>
  </tr>
  <tr>
    <td id="F_vinculos"><a href="http://www.idrd.gov.co/htms/seccion-contratacin-a-la-vista_6.html"><font color="#000000">&gt;&gt;Contratación</font></a></td>
    <td>&nbsp;</td>
    <td id="F_PiePag"><p><font color="#000000">Calle 63 No 47-06 PBX 6605400<br />
Bogota DC Colombia</font></p></td>
  </tr>
  <tr>
    <td> <br><center><a href="https://www.facebook.com/prensa.idrd"><img src="../Imagenes/facebook.png" width="46" height="46"><a href="https://twitter.com/IDRD"><img src="../Imagenes/twitter.png" width="46" height="46"><a href="https://youtube.com/"><img src="../Imagenes/youtube.png" width="46" height="46"></center></td>
    <td><br>
    <a href="http://www.presidencia.gov.co/">  <center><img src="../Imagenes/escudo_colombia.png" width="46" height="46"><a href="http://www.bogota.gov.co"><img src="../Imagenes/boghumana.png" width="120" height="46" /><a href="http://www.gobiernoenlinea.gov.co/web"><img src="../Imagenes/govenlinea.png" width="60" height="46"></center>
    </td>
    <td><center><img src="../Imagenes/icontec9001.png" width="36" height="46">&nbsp;&nbsp;<img src="../Imagenes/icontec.png" width="46" height="46"></center></td>
  </tr>

  
</table>
<table width="960" border="0">
  <tr>
    <td id="F_PiePag1">&nbsp;</td>
  </tr>
  <tr>
    
    <td id="F_PiePag1"><center>
      <font color="#000000">nstituto distrital de Recreación y Deporte 2012 - Derechos Reservados</font>
    </center></td>
  </tr>
<tr>
<td id="F_PiePag1"> <center>
  <font color="#000000">Agenda IDRD | <a href="http://www.idrd.gov.co/htms/seccion-quejas-y-soluciones_523.html"><font color="#000000">Quejas y reclamos</font></a> | Contratacion<a href="http://www.idrd.gov.co/htms/seccion-contratacin_6.html"></a> | Normatividad<a href="http://www.idrd.gov.co/htms/seccion-normatividad-idrd_665.html
"> <font color="#000000">IDRD</font></a> | FAQ<a href="http://www.idrd.gov.co/htms/seccion-faq_513.html"></a> | Centro de Documentacion<a href="http://www.idrd.gov.co/htms/seccion-centro-de-documentacin_514.html "></a></font>
</center></td>
</tr>
</table>

  </div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
</script>
</body></html>
