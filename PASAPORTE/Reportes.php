<?php
session_start();
if(isset($_SESSION['ID'])){
	$vector = $_SESSION['permisos'];
			if(isset($_SESSION['ID'])&&$vector[9]==1){
				
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
<script type="text/javascript" src="js/jquery_validate.js"></script>

</head>
<body>
 <meta charset="utf-8" />
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
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
  $(function(componente) {
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
 
<div id="main">
    <div id="logo"> <a id="" href="http://www.bogota.gov.co/"><img src="../style/bogota.png" width="119" height="21"></a>    </div>
	<div id="encabezado"></div>
	    
  <div id="Menu_principal" >
		<ul class="menu">
            <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
        
                    <li><a href="Menu.php"><span>MEN&Uacute;</span></a>
                        
                    </li>
                    
                    <li><a href="Logica/Cerrar_sesion.php">CERRAR SESI&Oacute;N</a>
        </li>
			
		</ul>
  </div>

  <div id="site_contentidrd">

                       <div id="templatemo_header_3">  						   
                   		 
                        <div class="dochead">
                	<span class="dhead">Reportes</span>
                </div>
                                     <div class="post">
                                     <div class="margen_flotante">&nbsp;&nbsp;</div>
            	
                                       <form id="frmReporte" target="_blank" action="Logica/Reporte.php" method="post" >
                                      <fieldset>
                                       <div class="box margin_r_15">
        <div class="box_top"></div>
        <div class="box_content">
          <h2>Reportes En PDF</h2>
          <table width="100%" border="0">
            <tr>
   <ul></ul>
    <td width="32%" rowspan="9" align="right" ><h3> Seleccione :</h3></td>
    <td width="5%" ><input name="radiobutton" type="radio" value="cbxGenero" checked="checked" title="Generar reporte por genero" />
      <label for="cbxGenero"></label></td>
    <td width="63%" align="left" valign="middle" > Genero</td>
   </tr>
   <tr>
    <td ><input name="radiobutton" type="radio" title="Generar reporte por personas pensionadas o no pensiondas" value="cbxPensionado" />
      <label for="cbxPensionado"></label></td>
    <td align="left" valign="middle" >Pensionados</td>
  </tr>
  <tr>
    <td height="21" ><input name="radiobutton" type="radio" value="cbxPais" title="Generar reporte por pais de nacimiento" />
      <label for="cbxPais"></label></td>
    <td align="left" valign="middle" >Pa&iacute;s</td>
  </tr>
  <tr>
    <td ><input name="radiobutton" type="radio" value="cbxLocalidad" title="Generar reporte por localidad en la que vive el usuario" />
      <label for="cbxLocalidad" ></label></td>
    <td align="left" valign="middle" >Localidad</td>
  </tr>
  <tr>
    <td ><input name="radiobutton" type="radio" value="cbxEstrato" title="Generar reporte por estrato" />
      <label for="cbxEstrato"></label></td>
    <td align="left" valign="middle" >Estrato</td>
  </tr>
  <tr>
    <td ><input name="radiobutton" type="radio" value="cbxEstudios" title="Generar reporte por nivel de estudios"/>
      <label for="cbxEstudios"></label></td>
    <td align="left" valign="middle" >Nivel de Estudios</td>
  </tr>
  <tr>
    <td ><input name="radiobutton" type="radio" value="cbxEnfermedad" title="Generar reporte por porcentaje o cantidad de personas enfermas o saludables" />
      <label for="cbxEnfermedad"></label></td>
    <td align="left" valign="middle" >Enfermo - Saludable</td>
  </tr>  
  <tr>
    <td ><input name="radiobutton" type="radio" value="cbxSeguridad" title="Generar reporte por el tipo de seguridad que posee el usuario" />
      <label for="cbxSeguridad"></label></td>
    <td align="left" valign="middle" >Tipo de seguridad</td>
  </tr>
  <tr>
    <td ><input name="radiobutton" type="radio" value="cbxSupercade" title="Generar reporte por supercade en el que se registro el usuario" />
      <label for="cbxSupercade"></label></td>
    <td align="left" valign="middle" >Supercade</td>
  </tr>
  <tr>
   <td></td>
    <td ><input name="radiobutton" type="radio" value="cbxActividades" title="Generar reporte por actividades de interes " /></td>
    <td align="left" valign="middle" >Actividades de inter&eacute;s </td>
  </tr>
  <tr>
   <td></td>
    <td ><input name="radiobutton" type="radio" value="cbxDocumento" title="Generar reporte por tipo de documento " /></td>
    <td align="left" valign="middle" >Tipo de documento </td>
  </tr>
  <tr>
    <td align="right" >&nbsp;</td>
    <td >&nbsp;</td>
    <td align="left" valign="middle" >&nbsp;</td>
  </tr>
  <tr colspan="3" >
    <td  >&nbsp;</td>
    <td  ><input type="checkbox" name="cbxFecha" id="cbxFecha" value="cbxFecha" checked="checked" title="Si marca esta opcion el reporte generado estara comprendido entre las fechas seleccionadas"/></td><td align="left">Especificar fechas para el reporte</td>
  </tr>
  <tr>
    <td align="right" >Desde:</td>
    <td colspan="2" align="left" ><span id="sprytextfield1">
      <label for="tbxInicio"></label>
      <input name="datepicker" type="text"  id="datepicker"  />
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
  <tr>
    <td align="right" >&nbsp;</td>
    <td >&nbsp;</td><td >&nbsp;</td>
    <td align="left" valign="middle" >&nbsp;</td>
  </tr>
  <tr>
    <td align="right" >Hasta:</td>
    <td colspan="2" align="left" ><span id="sprytextfield2">
      <label for="cbxFin"></label>
      <input name="datepicker1" type="text" id="datepicker1"  />
      <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
    </tr>
  <tr>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td align="left" valign="middle" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" ><input type="submit" name="btnGenerar" title="Haga clic para generar el reporte" value="Generar Reporte" class="button medium red" /></td>
    </tr>
  <tr>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td align="left" valign="middle" ></td>
  </tr>
  
</table>
<h2>Graficas</h2>
<h3 align="left">Seleccione:</h3>
<table width="100%">
<tr>
<td >
<ol id="selectable" >
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Genero</li>
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Pensionados</li>
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Pa&iacute;s de origen</li>
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Localidad</li>
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Estrato</li>
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Nivel de estudios</li>
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Tipo de seguridad</li>
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Supercade</li>
  Resultados Encuesta
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Como se enter&oacute; del paraporte?</li>
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Atenci&oacute;n recibida por el personal</li>
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Agilidad del tramite</li>
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Cumplimiento del horario</li>
  Otros
  <li class="ui-widget-content" style="text-align:left; cursor:pointer">Uso del pasaporte por empresa</li>
</ol>
<input type="hidden" id="select-result" value="0" name="select-result" />


</td>
</tr>
</table>

<table width="100%">
<tr>
<td align="center">
<input type="button" id="Pop" class="button medium red" onclick="setPopupGrafica();goTop();" value="Grafica" />
</td>
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
					   
            


</div>

</div>

 <script language="javascript" type="text/javascript" 
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js">
    </script>
    <!-- Load Google JSAPI -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", { packages: ["corechart"] });
        google.setOnLoadCallback(drawChart);

        function drawChart() {
            var jsonData = $.ajax({
                url: "Logica/GraficaGenero.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'CONSOLIDADO POR GENERO',
				width:600,
				height:400
            };

            var chart = new google.visualization.PieChart(
                        document.getElementById('chartGenero'));
            chart.draw(data, options);
			
			//---- pensionados
			
			var jsonData = $.ajax({
                url: "Logica/GraficaPensionado.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'CONSOLIDADO PENSIONADOS',
				width:600,
				height:400
            };

            var chart = new google.visualization.ColumnChart(
                        document.getElementById('chartPensionados'));
            chart.draw(data, options);
			
			//--- Pais-- 
			
			var jsonData = $.ajax({
                url: "Logica/GraficaPais.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'CONSOLIDADO POR PAIS',
				colors: ['#c7cfc7', '#b2c8b2'],
				width:600,
				height:400
            };

            var chart = new google.visualization.ColumnChart(
                        document.getElementById('chartPais'));
            chart.draw(data, options);
			
			//--- Localidad -- 
			
			var jsonData = $.ajax({
                url: "Logica/GraficaLocalidad.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'CONSOLIDADO POR LOCALIDAD',
				width:600,
				height:400
            };

            var chart = new google.visualization.PieChart(
                        document.getElementById('chartLocalidad'));
            chart.draw(data, options);
			
			//--- Estrato -- 
			
			var jsonData = $.ajax({
                url: "Logica/GraficaEstrato.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'CONSOLIDADO POR ESTRATO',
				width:600,
				height:400
            };

            var chart = new google.visualization.PieChart(
                        document.getElementById('chartEstrato'));
            chart.draw(data, options);
			
			//--- Estudios -- 
			
			var jsonData = $.ajax({
                url: "Logica/GraficaEstudios.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'CONSOLIDADO POR NIVEL DE ESTUDIOS',
				width:600,
				height:400
            };

            var chart = new google.visualization.ColumnChart(
                        document.getElementById('chartEstudios'));
            chart.draw(data, options);
			
			//--- Seguridad -- 
			
			var jsonData = $.ajax({
                url: "Logica/GraficaSeguridad.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'CONSOLIDADO POR TIPO DE SEGURIDAD',
				width:600,
				height:400
            };

            var chart = new google.visualization.PieChart(
                        document.getElementById('chartSeguridad'));
            chart.draw(data, options);
			
			//--- sUPERCADE -- 
			
			var jsonData = $.ajax({
                url: "Logica/GraficaSupercade.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'CONSOLIDADO POR SUPERCADE',
				width:600,
				height:400
            };

            var chart = new google.visualization.PieChart(
                        document.getElementById('chartSupercade'));
            chart.draw(data, options);
			
			
			//--- Pregunta 1 -- 
			
			var jsonData = $.ajax({
                url: "Logica/GraficaPregunta1.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: '�Como se enter� del servicio de pasaporte vital?',
				width:600,
				height:400
            };

            var chart = new google.visualization.PieChart(
                        document.getElementById('pregunta1'));
            chart.draw(data, options);
			
			//--- Pregunta 2 -- 
			
			var jsonData = $.ajax({
                url: "Logica/GraficaPregunta2.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'Agilidad en el tramite del pasaporte vital',
				width:600,
				height:400
            };

            var chart = new google.visualization.PieChart(
                        document.getElementById('pregunta2'));
            chart.draw(data, options);
			
			//--- Pregunta 3 -- 
			
			var jsonData = $.ajax({
                url: "Logica/GraficaPregunta3.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'Atenci�n recibida por los funcionarios',
				width:600,
				height:400
            };

            var chart = new google.visualization.PieChart(
                        document.getElementById('pregunta3'));
            chart.draw(data, options);
			
			//--- Pregunta 4 -- 
			
			var jsonData = $.ajax({
                url: "Logica/GraficaPregunta4.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'Cumplimiento del horario por parte del personal',
				width:600,
				height:400
            };

            var chart = new google.visualization.PieChart(
                        document.getElementById('pregunta4'));
            chart.draw(data, options);
			
			//------------EMPRESA--------------
			
			var jsonData = $.ajax({
                url: "Logica/GraficaEmpresa.php",
                dataType: "json",
                async: false
            }).responseText;

            var obj = jQuery.parseJSON(jsonData);
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'Registro del uso del pasaporte por empresa',
				width:600,
				height:400
            };

            var chart = new google.visualization.PieChart(
                        document.getElementById('empresa'));
            chart.draw(data, options);
			
			
        }

    </script>




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");

function goTop()
{
 $('body,html').animate({
                scrollTop: 0
            }, 800);
                	

}
;

var f = new Date();//a�o mes dia

document.getElementById('datepicker').value =  f.getFullYear()+ "/" + (f.getMonth()-1) + "/" + f.getDate();

document.getElementById('datepicker1').value = f.getFullYear()+ "/" + f.getMonth() + "/" + f.getDate();

  
  function setPopupGrafica()
  {
	  var result = $( "#select-result" ).val();
	  if(result==0)
	  {
		  
	  }else{
		  document.getElementById('PopUp').style.display="block";
		  document.getElementById('PopUp').style.visibility="visible";
		  
		  document.getElementById('btnPop').style.display="block";
		  document.getElementById('btnPop').style.visibility="visible";
		  
		  if(result==1){ 
		  document.getElementById('chartGenero').style.display="block";
		  document.getElementById('chartGenero').style.visibility="visible";
		  document.getElementById('bgenero').style.display="block";
		  document.getElementById('bgenero').style.visibility="visible";
		  }
		  if(result==2){ document.getElementById('chartPensionados').style.visibility="visible";
		  document.getElementById('chartPensionados').style.display="block";
		  document.getElementById('bpensionados').style.display="block";
		  document.getElementById('bpensionados').style.visibility="visible";
		  }
		  if(result==3){ document.getElementById('chartPais').style.visibility="visible";
		  document.getElementById('chartPais').style.display="block";
		  document.getElementById('bpais').style.display="block";
		  document.getElementById('bpais').style.visibility="visible";
		  }
		  if(result==4){ document.getElementById('chartLocalidad').style.visibility="visible";
		  document.getElementById('chartLocalidad').style.display="block";
		  document.getElementById('blocalidad').style.display="block";
		  document.getElementById('blocalidad').style.visibility="visible";
		  }
		  if(result==5){ document.getElementById('chartEstrato').style.visibility="visible";
		  document.getElementById('chartEstrato').style.display="block";
		  document.getElementById('bestrato').style.display="block";
		  document.getElementById('bestrato').style.visibility="visible";
		  }
		  if(result==6){ document.getElementById('chartEstudios').style.visibility="visible";
		  document.getElementById('chartEstudios').style.display="block";
		  document.getElementById('bestudios').style.display="block";
		  document.getElementById('bestudios').style.visibility="visible";
		  }
		  if(result==7){ document.getElementById('chartSeguridad').style.visibility="visible";
		  document.getElementById('chartSeguridad').style.display="block";
		  document.getElementById('bseguridad').style.display="block";
		  document.getElementById('bseguridad').style.visibility="visible";
		  }
		  if(result==8){ document.getElementById('chartSupercade').style.visibility="visible";
		  document.getElementById('chartSupercade').style.display="block";
		  document.getElementById('bsupercade').style.display="block";
		  document.getElementById('bsupercade').style.visibility="visible";
		  }
		  if(result==9){ document.getElementById('pregunta1').style.visibility="visible";
		  document.getElementById('pregunta1').style.display="block";
		  document.getElementById('bpregunta1').style.display="block";
		  document.getElementById('bpregunta1').style.visibility="visible";
		  }
		  if(result==10){ document.getElementById('pregunta2').style.visibility="visible";
		  document.getElementById('pregunta2').style.display="block";
		  document.getElementById('bpregunta2').style.display="block";
		  document.getElementById('bpregunta2').style.visibility="visible";
		  }
		  if(result==11){ document.getElementById('pregunta3').style.visibility="visible";
		  document.getElementById('pregunta3').style.display="block";
		  document.getElementById('bpregunta3').style.display="block";
		  document.getElementById('bpregunta3').style.visibility="visible";
		  }
		  if(result==12){ document.getElementById('pregunta4').style.visibility="visible";
		  document.getElementById('pregunta4').style.display="block";
		  document.getElementById('bpregunta4').style.display="block";
		  document.getElementById('bpregunta4').style.visibility="visible";
		  }
		  if(result==13){ document.getElementById('empresa').style.visibility="visible";
		  document.getElementById('empresa').style.display="block";
		  document.getElementById('bempresa').style.display="block";
		  document.getElementById('bempresa').style.visibility="visible";
		  }
        
		  
		  
		  }
  }
    function HiddePopupGrafica()
  {
	  var result = $( "#select-result" ).val();
	  document.getElementById('PopUp').style.display="none";
	  document.getElementById('PopUp').style.visibility="hidden";
	  
	  document.getElementById('btnPop').style.display="none";
	  document.getElementById('btnPop').style.visibility="hidden";
	  
	if(result==1){
	document.getElementById('chartGenero').style.visibility="hidden";
	document.getElementById('chartGenero').style.display="none";
	document.getElementById('bgeero').style.visibility="hidden";
	document.getElementById('bgenero').style.display="none";
	}
	if(result==2){ document.getElementById('chartPensionados').style.visibility="hidden";
	document.getElementById('chartPensionados').style.display="none";
	document.getElementById('bpensionados').style.visibility="hidden";
	document.getElementById('bpensionados').style.display="none";
	
	}
	if(result==3){ document.getElementById('chartPais').style.visibility="hidden";
	document.getElementById('chartPais').style.display="none";
	document.getElementById('bpais').style.visibility="hidden";
	document.getElementById('bpais').style.display="none";
	}
	if(result==4){ document.getElementById('chartLocalidad').style.visibility="hidden";
	document.getElementById('chartLocalidad').style.display="none";
	document.getElementById('blocalidad').style.visibility="hidden";
	document.getElementById('blocalidad').style.display="none";
	}
	if(result==5){ document.getElementById('chartEstrato').style.visibility="hidden";
	document.getElementById('chartEstrato').style.display="none";
	document.getElementById('bestrato').style.visibility="hidden";
	document.getElementById('bestrato').style.display="none";
	}
	if(result==6){ document.getElementById('chartEstudios').style.visibility="hidden";
	document.getElementById('chartEstudios').style.display="none";
	document.getElementById('bestudios').style.visibility="hidden";
	document.getElementById('bestudios').style.display="none";
	}
	if(result==7){ document.getElementById('chartSeguridad').style.visibility="hidden";
	document.getElementById('chartSeguridad').style.display="none";
	document.getElementById('bseguridad').style.visibility="hidden";
	document.getElementById('bseguridad').style.display="none";
	}
	if(result==8){ document.getElementById('chartSupercade').style.visibility="hidden";
	document.getElementById('chartSupercade').style.display="none";
	document.getElementById('bsupercade').style.visibility="hidden";
	document.getElementById('bsupercade').style.display="none";
	}
	
	if(result==9){ document.getElementById('pregunta1').style.visibility="hidden";
	document.getElementById('pregunta1').style.display="none";
	document.getElementById('bpregunta1').style.visibility="hidden";
	document.getElementById('bpregunta1').style.display="none";
	}
	if(result==10){ document.getElementById('pregunta2').style.visibility="hidden";
	document.getElementById('pregunta2').style.display="none";
	document.getElementById('bpregunta2').style.visibility="hidden";
	document.getElementById('bpregunta2').style.display="none";
	}
	if(result==11){ document.getElementById('pregunta3').style.visibility="hidden";
	document.getElementById('pregunta3').style.display="none";
	document.getElementById('bpregunta3').style.visibility="hidden";
	document.getElementById('bpregunta3').style.display="none";
	}
	if(result==12){ document.getElementById('pregunta4').style.visibility="hidden";
	document.getElementById('pregunta4').style.display="none";
	document.getElementById('bpregunta4').style.visibility="hidden";
	document.getElementById('bpregunta4').style.display="none";
	}
	if(result==13){ document.getElementById('empresa').style.visibility="hidden";
	document.getElementById('empresa').style.display="none";
	document.getElementById('bempresa').style.visibility="hidden";
	document.getElementById('bempresa').style.display="none";
	}
	
	  
  }
  $(function() {
    $( "#selectable" ).selectable({
      stop: function() {
        $( ".ui-selected", this ).each(function() {
          var index = $( "#selectable li" ).index( this );
		   $( "#select-result" ).val(index + 1 );
        });
      }
    });
  });

$(function() {
    $( document ).tooltip();
  });
  
   function imprSelec(nombre)

  {

  var ficha = document.getElementById(nombre);

  var ventimp = window.open(' ', 'popimpr');

  ventimp.document.write( ficha.innerHTML );

  ventimp.document.close();

  ventimp.print( );

  ventimp.close();

  } 
  
</script>
 <style>
  #feedback { font-size: 1.4em; }
  #selectable .ui-selecting { background: #FECA40; }
  #selectable .ui-selected { background: #F39814; color: white; }
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
  </style>
  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
</body>


</html>
<div id="btnPop" class="botonPop">
<table width="100%"><tr><td align="center">
<input type="submit" name="btnCerrar" id="btnCerrar" title="Haga clic para cerrar la grafica" onclick="HiddePopupGrafica();" value="cerrar" class="button medium red"/>
</td></tr></table>
</div>
<div id="bgenero" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('chartGenero');" value="Imprimir" class="button medium red"/>
</div>
<div id="bpensionados" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('chartPensionados');" value="Imprimir" class="button medium red"/>
</div>
<div id="bestudios" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('chartEstudios');" value="Imprimir" class="button medium red"/>
</div>
<div id="blocalidad" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('chartLocalidad');" value="Imprimir" class="button medium red"/>
</div>
<div id="bpais" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('chartPais');" value="Imprimir" class="button medium red"/>
</div>
<div id="bseguridad" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('chartSeguridad');" value="Imprimir" class="button medium red"/>
</div>
<div id="bsupercade" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('chartSupercade');" value="Imprimir" class="button medium red"/>
</div>
<div id="bestrato" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('chartEstrato');" value="Imprimir" class="button medium red"/>
</div>

<div id="bpregunta1" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('pregunta1');" value="Imprimir" class="button medium red"/>
</div>
<div id="bpregunta2" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('pregunta2');" value="Imprimir" class="button medium red"/>
</div>
<div id="bpregunta3" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('pregunta3');" value="Imprimir" class="button medium red"/>
</div>
<div id="bpregunta4" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('pregunta4');" value="Imprimir" class="button medium red"/>
</div>
<div id="bempresa" class="boton1Pop" style=" visibility:hidden">
<input type="button" name="Imprimir" id="Imprimir" title="Imprimir" onclick="imprSelec('empresa');" value="Imprimir" class="button medium red"/>
</div>


<div id="PopUp" class="backPopup"></div>
<div id="chartGenero" class="divPop" style=" visibility:hidden"></div>
<div id="chartPensionados" class="divPop" style=" visibility:hidden"></div>
<div id="chartEstudios" class="divPop" style=" visibility:hidden"></div>
<div id="chartLocalidad" class="divPop" style=" visibility:hidden"></div>
<div id="chartPais" class="divPop" style=" visibility:hidden"></div>
<div id="chartSeguridad" class="divPop" style=" visibility:hidden"></div>
<div id="chartSupercade" class="divPop" style=" visibility:hidden"></div>
<div id="chartEstrato" class="divPop" style=" visibility:hidden"></div>

<div id="pregunta1" class="divPop" style=" visibility:hidden"></div>
<div id="pregunta2" class="divPop" style=" visibility:hidden"></div>
<div id="pregunta3" class="divPop" style=" visibility:hidden"></div>
<div id="pregunta4" class="divPop" style=" visibility:hidden"></div>

<div id="empresa" class="divPop" style=" visibility:hidden"></div>
<!--
<div id="Ventana" class="divPop">
	<table width="100%" height="100%">
    	<tr>
        	<td>
            <div id="chartGenero" style=" visibility:hidden"></div>
            <div id="chartPensionados"  style=" top:10%;visibility:hidden"></div>
            <div id="chartEstudios" style="visibility:hidden"></div>
            <div id="chartLocalidad" style="visibility:hidden"></div>
            <div id="chartPais" style="visibility:hidden"></div>
            <div id="chartSeguridad" style="visibility:hidden"></div>
            <div id="chartSupercade" style="visibility:hidden"></div>
            <div id="chartEstrato" style="visibility:hidden"></div>
            
            </td>
        </tr>
        <tr>
        	<td align="center" style="vertical-align:top"><input type="submit" name="btnCerrar" id="btnCerrar" title="Haga clic para cerrar la grafica" onclick="HiddePopupGrafica();" value="cerrar" class="button medium blue"/></td>
        </tr>
    </table>

</div>
-->

<!--

<div id="chart_div"></div>
<div  style="z-index:500; top:50%; left:50%">
<input type="submit" name="btnCerrar" title="Haga clic para cerrar la grafica" value="cerrar" class="bottom red"/>
</div>
-->

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