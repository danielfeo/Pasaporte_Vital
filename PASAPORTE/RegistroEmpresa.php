<?php
session_start();
if(isset($_SESSION['ID'])){
	$vector = $_SESSION['permisos'];
			if(isset($_SESSION['ID'])&&$vector[5]==1){
				
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="" xml:lang="en"><head><title>Pasaporte Vital</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><!-- **** stylesheet **** --><link rel="stylesheet" type="text/css" href="style.css">


<link rel="shortcut icon" type="image/x-icon" href="http://lwis.net/free-css-drop-down-menu/css/dropdown/themes/nvidia.com/images/favicon.ico">
<link href="Css/helper.css" media="screen" rel="stylesheet" type="text/css">

<!-- Beginning of compulsory code below -->

<link href="Css/dropdown.css" media="screen" rel="stylesheet" type="text/css">
<link href="Css/default.advanced.css" media="screen" rel="stylesheet" type="text/css">

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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="es" />
<script type="text/javascript" src="js/jquery_1.4.js"></script>
<script type="text/javascript" src="js/jquery_validate.js"></script><script type="text/javascript">
$(function(){
	$('#formInscripcion').validate({
		rules: {
	
		'email': { required: true, email: true },
		'tipo_identidad': 'required',
		'deportes[]': { required: true, minlength: 1 }
		},
		messages: {
		'nombre': 'Debe ingresar el nombre',
		'apellido': 'Debe ingresar el apellido',
		'numero_identidad': { required: 'Debe ingresar el número de documento de identidad', number: 'Debe ingresar un número' },
		'email': { required: 'Debe ingresar un correo electrónico', email: 'Debe ingresar el correo electrónico con el formato correcto. Por ejemplo: u@localhost.com' },
		'tipo_identidad': 'Debe ingresar el número de documento',
		'deportes[]': 'Debe seleccionar mínimo un deporte'
		},
		debug: true,
		/*errorElement: 'div',*/
		//errorContainer: $('#errores'),
		submitHandler: function(form){
			alert('El formulario ha sido validado correctamente!');
		}
	});
});
</script>
</head>
<body>

<script>
	
	function Solo_Numerico(variable){
			Numer=parseInt(variable);
			if (isNaN(Numer)){
				return "";
			}
			return Numer;
		}
	function ValNumero(Control){
			Control.value=Solo_Numerico(Control.value);
		}
	
	function tipoDocumento(){
		var indice = document.formularioRegistro.DDL_Documento.selectedIndex
		return indice
		}
	
</script>
<div id="main">
  <div id="logo"> <a id="" href="http://www.bogota.gov.co/"><img src="../style/bogota.png" width="119" height="21"></a>    </div>
	<div id="encabezado"></div>
	    
   <div id="Menu_principal" >
		<ul class="menu">
            <li><a href="index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
        
                    <li><a href="menu.php"><span>MENÚ</span></a>
                        
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
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                          <br> <br>  
                         <center>
						  <h1>&nbsp;</h1>
					     </center>
						   
                   		 
                        <div class="dochead">
                	<span class="dhead">Registro de Operario </span>
                </div>
                                     <div class="post">
                                     <div class="margen_flotante">&nbsp;&nbsp;</div>
            	
                                       <form id="formInscripcion" action="Logica/empresaRegistro.php" method="post" >
                                      <fieldset>
                                       <div class="box margin_r_15">
        <div class="box_top"></div>
        <div class="box_content">
          <h2>NUEVA EMPRESA VINCULADA</h2>
          <table width="100%" border="0">
   <tr>
    <td width="32%" align="right"><h4>Tipo de Empresa: </h4></td>
    <td width="65%"><select name="DDL_TipoEmpresa" >
    <option>Recreación</option>
    <option>Salud</option>
    <option>Cultura</option>
    <option>Turismo</option>
    <option>Varios</option>
    </select></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" align="right"><h4>Nombre Empresa: </h4></td>
    <td width="65%"><span id="sprytextfield1">
      <label for="TB_Cedula"></label>
      <input type="text" name="TB_NomEmpresa"  title="Ingrese el numero de documento" maxlength="10" size="40" id="textarea"  />
      </span></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" align="right"><h4>Numero Nit: </h4>
    <td><span id="sprytextfield2">
    <label for="TB_Contrato"></label>
    <input type="text" name="TB_Nit" title="Ingrese el numero de nit" maxlength="10" size="40" id="textarea" onkeyUp="return ValNumero(this);" />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" align="right"><h4>Nombre Delegado: </h4>
    <td><span id="sprytextfield3">
    <label for="TB_Nombre"></label>
    <input type="text" name="TB_NomDelegado" title="Ingrese el nombre del delegado." maxlength="30" size="40" id="textarea" />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" align="right"><h4>Apellido Delegado: </h4>
    <td><span id="sprytextfield4">
    <label for="TB_Apellido"></label>
    <input type="text" name="TB_ApeDelegado" title="Ingrese el apellido del usuario" maxlength="30" size="40" id="textarea" />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" align="right"><h4>Email: </h4>
    <td><span id="sprytextfield5">
    <label for="TB_Email"></label>
    <input type="text" name="TB_Email" id="TB_Email" value="@" maxlength="30" size="40" title="Ingrese el correo del usuario."  />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" align="right"><h4>Direccion: </h4>    
    <td>
    <label for="TB_Direccion"></label>
    <input type="text" name="TB_Direccion" id="TB_Email"  maxlength="30" size="40" title="Ingrese el correo del usuario."  />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" align="right"><h4>Telefono:</h4>
    <td><span id="sprytextfield6">
    <label for="TB_Telefono"></label>

  <meta charset="utf-8" />
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
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
    <input name="TB_Telefono" type="text" size="40" id="datepicker" title="Fecha Inicio Contrato."/>
   </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" align="right"><h4>Fecha Inicio</h4></td>
    <td><span id="sprytextfield7">
      <input type="text" name="TB_Inicio" size="40" id="datepicker1" title="Fecha Fin Contrato"  />
      </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" align="right"><h4>Descripcion</h4></td>
    <td><input type="text" name="TB_Descripcion"  size="40 "id="TB_Descripcio" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="B_Registro"  value="REGISTRAR" class="button medium red"></td>
    <td>&nbsp;</td>
  </tr>
</table>

          
          <div class="button_01"></div>
          
        </div>
        
        <div class="box_bottom"></div>
      </div>
      </fieldset>
                                       </form>
                                        
                                     </div>
                                     
                                  
                       
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
</script>
</body></html>
<?php				
				
				
				
				
				}else
				{
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://idrd.gov.co/SIM/\">";
					}	
	
	}else
				{
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://idrd.gov.co/SIM/\">";
					}	
	

?>