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

<style>
#iframe
    {
    overflow:auto;
    width:700px;
    height:200px;
    }
#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#customers td, #customers th 
{
	
font-size:1em;
border:1px solid #C00;
padding:3px 7px 2px 7px;
}
#customers th 
{
font-size:1.1em;
text-align:center;
padding-top:5px;
padding-bottom:4px;
background-color:#FF3300;
color:#ffffff;
}
#customers tr.alt td 
{
color:#000000;
text-align:center;
background-color:#F6CECE;
}
</style>
<link type="text/css" rel="stylesheet" href="Css/usuarioformulario.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/apprise.js"></script>
<link rel="stylesheet" href="css/apprise.css" type="text/css" />

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  
 <script>
  $(function() {
    $( "#dialog-message" ).dialog({
      modal: true, 
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }	
    });
  });
 

  </script>
  
   <script>
  $(function() {
    $( "#datepicker" ).datepicker(
	{
      showOn: "button",
      buttonImage: "../Imagenes/calendar.gif",
      buttonImageOnly: true,
	  dateFormat: 'yy-mm-dd'
    }
	);
	
  });
  $(function() {
    $( "#datepicker1" ).datepicker(
	{
      showOn: "button",
      buttonImage: "../Imagenes/calendar.gif",
      buttonImageOnly: true,
	  dateFormat: 'yy-mm-dd'
    }
	);
  });
  </script>
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
            <ul class="menu">
            <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
        
                    <li><a href="Menu.php"><span>MENÚ</span></a>
                        
                    </li>
                    
                    <li><a href="Logica/Cerrar_sesion.php">CERRAR SESIÓN</a>
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
						  <h1><font color="#FF0000" size="6">.: NUMERO DE REGISTROS:.</font></h1>
					     </center>
						   
					     <p>&nbsp;</p>
						 <form id="form1" method="post" action="Numero Registros.php">
						  <center>
						    <p>SuperCADE:  
						      <select name="DDL_Cade" id="DDL_Cade" title="SELECCIONE EL SUPER CADE">
                                <option>SuperCADE Américas</option>
                                <option>SuperCADE Bosa</option>
                                <option>SuperCADE CAD</option>
                                <option>SuperCADE Calle 13</option>
                                <option>SuperCADE Movilidad</option>
                                <option>SuperCADE Suba</option>
                                <option>SuperCADE 20 de Julio</option>
                                
                                </select>
						    </p>
						    <p>
						      Fecha inicio: 
						      <input name="TB_FInicio" type="text" id="datepicker" title="Fecha Inicio."/>
					        </p>
						    <p>
						      Fecha final:  
						      <input name="TB_FFin" type="text" id="datepicker1" title="Fecha Fin."/>
						    </p>
						    <p>
						      <input type="submit" name="BT_Ver" id="BT_Ver" value="VER REGISTRO" />
					        </p>
					         <p>&nbsp;</p>
                          </center>
					     </form>
						   <p><br>  
                           <div id="iframe">
                           <table width="100%" border="1" id="customers">
							<tr>
							<th>Usuario</th>
							<th>Fecha Expedicion</th>
							<th>Hora</th>
                            <th>SuperCADE</th>
							</tr>
  <?php
					include ("Datos/Conexion.php");
			$Conn = conectar();
					  
					  if(!empty($_POST['TB_FInicio'])){
						$supercade=$_POST['DDL_Cade'];
						$fechafin=$_POST['TB_FFin'];
						$fecha = $_POST['TB_FInicio'];
					    $sql="SELECT * FROM pasaporte_pasaporte  A WHERE A.`fechaExpedicion`>='$fecha' AND A.`fechaExpedicion`<='$fechafin' AND supercade='$supercade'";   
					  }else{
						
						$sql="SELECT * FROM pasaporte_pasaporte;"; 
				      }
					  
					    $result=mysql_query($sql); 
					    if($result!=NULL){ 
						?>
							<div align="justify" style="background:#FFD2D3" >                  
                         <p align="justify"> <FONT FACE="courier" SIZE=3 >
                         <?php
						echo "El numero de registros actuales son: ".mysql_num_rows($result);
						?>
							 </p></FONT>
</div>
<?php
					    if(mysql_num_rows($result)>0){ 
						$var=1;
					    while($row=mysql_fetch_array($result)){ 
						if($var % 2==0){
						    echo "<tr class=\"alt\">";
						}else{
							echo "<tr align=\"center\">";
							}
					    
						
						echo "<td >".$row['documento']."</td><td>".$row['fechaExpedicion']."</td><td>".$row['horaExpedicion']."</td><td>".$row['supercade']."</td>";									
						
						$var++;
					     } 
						 }else{ 
						 
  ?>
<div id="dialog-message" title="Búsqueda Fallida" >
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
 No hay ninguna coincidencia en la búsqueda del usuario.
  </p>
  
</div><?php
						 } 
						 mysql_free_result($result); 
						 } 
						 desconectar($Conn);
					?>
</table>
</div>                          
               
						     <br>
					     </p>
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
</body></html>
