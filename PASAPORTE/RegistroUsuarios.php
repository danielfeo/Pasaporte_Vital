<?php
session_start();
include ("Logica/BD2_Registro.php");
$_SESSION['InserUsuario']=0;
if(isset($_SESSION['ID'])){

if(isset($_SESSION['cedu'])){
$cedu = $_SESSION['cedu'];
}
  
  
$vector = $_SESSION['permisos'];


			if(isset($_SESSION['ID'])&&$vector[1]==1){	
				
					?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="" xml:lang="en"><head><title>Pasaporte Vital</title><!-- **** stylesheet **** --><link rel="stylesheet" type="text/css" href="style.css">
  
  <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <link type="text/css" rel="stylesheet" href="Css/usuarioformulario.css">
 
<script type="text/javascript">
            $(document).ready(function(){
                $('#TB_Pais').change(function(){
                    var id=$('#TB_Pais').val();
                    $('#estados').load('Logica/BD2_Ciudad.php?id='+id);
                });    
            });
			
			$(document).ready(function(){
                $('#DDL_TipoUsuario').change(function(){
                    var id=$('#DDL_TipoUsuario').val();
                    $('#estados2').load('Logica/BD2_TipoUsuario.php?id='+id);
                });    
            });
        </script>


        <script type="text/javascript">
$(document).ready(function() {	
	$('#username').blur(function(){
		
		$('#Info').html('<img src="Imagenes/loader.gif" alt="" />').fadeOut(1000);

		var username = $(this).val();		
		var dataString = 'username='+username;
		
		$.ajax({
            type: "POST",
            url: "Datos/existeusuario.php",
            data: dataString,
            success: function(data) {
				$('#Info').fadeIn(1000).html(data);
				//alert(data);
            }
        });
    });              
});    



$(document).ready(function() {	
	$('#cedula').blur(function(){
		
		$('#Info').html('<img src="Imagenes/loader.gif" alt="" />').fadeOut(1000);

		var cedula = $(this).val();		
		var dataString = 'cedula='+cedula;
		
		$.ajax({
            type: "POST",
            url: "Datos/existecedula.php",
            data: dataString,
            success: function(data) {
				$('#Info2').fadeIn(1000).html(data);
				//alert(data);
            }
        });
    });              
});    
</script>
  


<script type="text/javascript">

  function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/;
    return re.test(str);
  }

  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
   
    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(!checkPassword(form.pwd1.value)) {
        alert("The password you have entered is not valid!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pwd1.focus();
      return false;
    }
    return true;
  }

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
  
  $(function() {
    $( "#datepicker2" ).datepicker(
	{
      showOn: "button",
      buttonImage: "../Imagenes/calendar.gif",
      buttonImageOnly: true,
	  dateFormat: 'yy-mm-dd'
    }
	);
  });
  
  
  </script>
  
<script type="text/javascript">
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


<style type="text/css">
body{
	font-family: tahoma, verdana, sans-serif;
}
.capacalendario{
	width: 219px;
	position: absolute;
	display: none;
	background-color: #fff;
}
.capacalendarioborde{
	padding: 3px;
	border: 1px solid #ddd;
}
.diassemana{
	overflow: hidden;
	background: #339;
	margin: 3px 0;
	clear: both;
}
.diasmes{
	overflow: hidden;
}
.diassemana span, .diasmes span{
	margin: 3px;
	width: 25px;
	display: block;
	float: left;
	text-align: center;
	height: 1.5em;
	line-height: 1.5em;
	font-size: 0.875em;
}
.diassemana span{
	text-transform: uppercase;
	color: #fff;
	font-weight: bold;
	height: 1.8em;
	line-height: 1.8em;
}
.diasmes span{
	background: #ddd;
	cursor: pointer;
}
.diasmes span.diainvalido{
	background: #aaa;
	cursor: default;
}
.diasmes span.domingo{
	color: #c00;
}
.capacalendario span.primero{
	margin-left:0 !important;
}
.capacalendario span.ultimo{
	margin-right:0 !important;
}

a.botoncal{
	margin-left: 5px;
	background: transparent url(calendario.png) no-repeat;
}
a.botoncal span{
	display: inline-table;
	width: 16px;
	height: 16px;
}
a.botonmessiguiente{
	float: right;
	background: transparent url(105.png) no-repeat;
	margin: 5px 5px 0 5px;
}
a.botonmessiguiente span, a.botonmesanterior span, a.botoncambiaano span{
	display: inline-table;
	width: 10px;
	height: 10px;
}
a.botonmesanterior{
	float: left;
	background: transparent url(106.png) no-repeat;
	margin: 5px 5px 0 5px;
}
a.botoncambiaano{
	background: transparent url(193.png) no-repeat;
	margin: 5px 5px 0 5px;
	font-size: 0.8em;
}
.textomesano{
	background-color: #dfd;
	overflow: hidden;
	padding: 2px;
	font-size: 0.8em;
	font-weight: bold;
	text-align: center
}
.mesyano{
	margin-top: 3px;
}
.visualmesano{
	display: inline;
}
.capacerrar{
	background-color: #ddf;
	overflow: hidden;
	padding: 2px;
	font-size: 0.5em;
}
a.calencerrar{
	float: right;
	background: transparent url(101.png) no-repeat;
	margin: 2px 5px 0 5px;
}
a.calencerrar span{
	display: inline-table;
	width: 10px;
	height: 10px;
}
.capaselanos{
	width: 50px;
	display: none;
	font-size: 0.8em;
	text-align: center;
	position: absolute;
	background-color: #fff;
	border: 1px solid #ddd;
}
.capaselanos a{
	display: block;
	text-decoration: none;
	border-bottom: 1px solid #ddd;
	padding: 2px 0;
}
.capaselanos a.seleccionado{
	background-color: #eef;
	font-weight: bold;
}
.capaselanos a.ultimo{
	border: 0;
}

</style>
	<script language="javascript" src="jquery-1.4.4.min.js"></script>
<script language="javascript" type="text/javascript">
	
jQuery.fn.calendarioDW = function() {
   this.each(function(){
		//saber si estoy mostrando el calendario
		var mostrando = false;
		//variable con el calendario
		var calendario;
		//variable con los días del mes
		var capaDiasMes;
		//variable para mostrar el mes y ano que se está viendo
		var capaTextoMesAnoActual = $('<div class="visualmesano"></div>');
		//iniciales de los días de la semana
		var dias = ["l", "m", "x", "j", "v", "s", "d"];
		//nombres de los meses
		var nombresMes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
		
		//elemento input
		var elem = $(this);
		//creo un enlace-botón para activar el calendario
		var boton = $("<a class='botoncal' href='#'><span></span></a>");
		//inserto el enlace-botón después del campo input
		elem.after(boton);
		
		//evento para clic en el botón
		boton.click(function(e){
			e.preventDefault();
			mostrarCalendario();
		});
		//evento para clic en el campo
		elem.click(function(e){
			this.blur();
			mostrarCalendario();
		});
		
		//función para mostrar el calendario
		function mostrarCalendario(){
			if(!mostrando){
				mostrando = true;
				//es que hay que mostrar el calendario
				//dias de la semana
				var capaDiasSemana = $('<div class="diassemana"></div>');
				$(dias).each(function(indice, valor){
					var codigoInsertar = '<span';
					if (indice==0){
						codigoInsertar += ' class="primero"';
					}
					if (indice==6){
						codigoInsertar += ' class="domingo ultimo"';
					}
					codigoInsertar += ">" + valor + '</span>';
					
					capaDiasSemana.append(codigoInsertar);
				});
				
				//capa con los días del mes
				capaDiasMes = $('<div class="diasmes"></div>');
				
				//un objeto de la clase date para calculo de fechas
				var objFecha = new Date();
				//miro si en el campo INPUT tengo alguna fecha escrita
				var textoFechaEscrita = elem.val();
				if (textoFechaEscrita!= ""){
					if (validarFechaEscrita(textoFechaEscrita)){
						var arrayFechaEscrita = textoFechaEscrita.split("/");
						//hago comprobación sobre si el año tiene dos cifras
						if(arrayFechaEscrita[2].length == 2){
							if (arrayFechaEscrita[2].charAt(0)=="0"){
								arrayFechaEscrita[2] = arrayFechaEscrita[2].substring(1);
							}
							arrayFechaEscrita[2] = parseInt(arrayFechaEscrita[2]);
							if (arrayFechaEscrita[2] < 50)
								arrayFechaEscrita[2] += 2000;
						}
						objFecha = new Date(arrayFechaEscrita[2], arrayFechaEscrita[1]-1, arrayFechaEscrita[0])
					}
				}
				
				//mes y año actuales
				var mes = objFecha.getMonth();
				var ano = objFecha.getFullYear();
				//muestro los días del mes y año dados
				muestraDiasMes(mes, ano);
				
				//control para ocultar el calendario
				var botonCerrar = $('<a href="#" class="calencerrar"><span></span></a>');
				botonCerrar.click(function(e){
					e.preventDefault();
					calendario.hide("slow");
				})
				var capaCerrar = $('<div class="capacerrar"></div>');
				capaCerrar.append(botonCerrar)
				
				//controles para ir al mes siguiente / anterior
				var botonMesSiguiente = $('<a href="#" class="botonmessiguiente"><span></span></a>');
				botonMesSiguiente.click(function(e){
					e.preventDefault();
					mes = (mes + 1) % 12;
					if (mes==0)
						ano++;
					capaDiasMes.empty();
					muestraDiasMes(mes, ano);
				})
				var botonMesAnterior = $('<a href="#" class="botonmesanterior"><span></span></a>');
				botonMesAnterior.click(function(e){
					e.preventDefault();
					mes = (mes - 1);
					if (mes==-1){
						ano--;
						mes = 11
					}	
					capaDiasMes.empty();
					muestraDiasMes(mes, ano);
				})
				var botonCambioAno = $('<a href="#" class="botoncambiaano"><span></span></a>')
				botonCambioAno.click(function(e){
					e.preventDefault();
					var botonActivoSelAnos = $(this);
					//creo una capa con una serie de años para elegir
					var capaAnos = $('<div class="capaselanos"></div>');
					//genero 10 años antes y 10 después
					for (var i=ano-10; i<=ano+10; i++){
						var codigoEnlace = '<a href="#"';
						if (i==ano)
							codigoEnlace += ' class="seleccionado"';
						if (i==ano+10)
							codigoEnlace += ' class="ultimo"';
						codigoEnlace += '><span>' + i + '</span></a>';
						var opcionAno = $(codigoEnlace);
						opcionAno.click(function(e){
							e.preventDefault();
							ano = parseInt($(this).children().text());
							capaDiasMes.empty();
							muestraDiasMes(mes, ano);
							capaAnos.slideUp();
							capaAnos.detach();
						})
						capaAnos.append(opcionAno);
					}
					//coloco la capa en la página
					$(document.body).append(capaAnos);
					//posiciono la capa
					capaAnos.css({
						top: (botonActivoSelAnos.offset().top + 12) + "px",
						left: (botonActivoSelAnos.offset().left - 25) + "px"
					})
					capaAnos.slideDown();
				})
				
				//capa para mostrar el texto del mes y ano actual
				var capaTextoMesAno = $('<div class="textomesano"></div>');
				var capaTextoMesAnoControl = $('<div class="mesyano"></div>')
				capaTextoMesAno.append(botonMesSiguiente);
				capaTextoMesAno.append(botonMesAnterior);
				capaTextoMesAno.append(capaTextoMesAnoControl);
				capaTextoMesAnoControl.append(capaTextoMesAnoActual);
				capaTextoMesAnoControl.append(botonCambioAno);
				
				//calendario y el borde
				calendario = $('<div class="capacalendario"></div>');
				var calendarioBorde = $('<div class="capacalendarioborde"></div>');
				calendario.append(calendarioBorde);
				calendarioBorde.append(capaCerrar);
				calendarioBorde.append(capaTextoMesAno);
				calendarioBorde.append(capaDiasSemana);
				calendarioBorde.append(capaDiasMes);
				
				//inserto el calendario en el documento
				$(document.body).append(calendario);
				//lo posiciono con respecto al boton
				calendario.css({
					top: boton.offset().top + "px",
					left: (boton.offset().left + 20) + "px"
				})
				//muestro el calendario
				calendario.show("slow");
				
			}else{
				//es que el calendario ya se estaba mostrando...
				calendario.fadeOut("fast");
				calendario.fadeIn("fast");
				
			}
			
		}
		
		function muestraDiasMes(mes, ano){
			//console.log("muestro (mes, ano): ", mes, " ", ano)
			//muestro en la capaTextoMesAno el mes y ano que voy a dibujar
			capaTextoMesAnoActual.text(nombresMes[mes] + " " + ano);
			
			//muestro los días del mes
			var contadorDias = 1;
			
			//calculo la fecha del primer día de este mes
			var primerDia = calculaNumeroDiaSemana(1, mes, ano);
			//calculo el último día del mes
			var ultimoDiaMes = ultimoDia(mes,ano);
			
			//escribo la primera fila de la semana
			for (var i=0; i<7; i++){
				if (i < primerDia){
					//si el dia de la semana i es menor que el numero del primer dia de la semana no pongo nada en la celda
					var codigoDia = '<span class="diainvalido';
					if (i == 0)
						codigoDia += " primero";
					codigoDia += '"></span>';
				} else {
					var codigoDia = '<span';
					if (i == 0)
						codigoDia += ' class="primero"';
					if (i == 6)
						codigoDia += ' class="ultimo domingo"';
					codigoDia += '>' + contadorDias + '</span>';
					contadorDias++;
				}
				var diaActual = $(codigoDia);
				capaDiasMes.append(diaActual);
			}
			
			//recorro todos los demás días hasta el final del mes
			var diaActualSemana = 1;
			while (contadorDias <= ultimoDiaMes){
				var codigoDia = '<span';
				//si estamos a principio de la semana escribo la clase primero
				if (diaActualSemana % 7 == 1)
					codigoDia += ' class="primero"';
				//si estamos al final de la semana es domingo y ultimo dia
				if (diaActualSemana % 7 == 0)
					codigoDia += ' class="domingo ultimo"';
				codigoDia += '>' + contadorDias + '</span>';
				contadorDias++;
				diaActualSemana++;
				var diaActual = $(codigoDia);
				capaDiasMes.append(diaActual);
			}
			
			//compruebo que celdas me faltan por escribir vacias de la última semana del mes
			diaActualSemana--;
			if (diaActualSemana%7!=0){
				//console.log("dia actual semana ", diaActualSemana, " -- %7=", diaActualSemana%7)
				for (var i=(diaActualSemana%7)+1; i<=7; i++){
					var codigoDia = '<span class="diainvalido';
					if (i==7)
						codigoDia += ' ultimo'
					codigoDia += '"></span>';
					var diaActual = $(codigoDia);
					capaDiasMes.append(diaActual);
				}
			}
			
			//crear el evento para cuando se pulsa un día de mes
			//console.log(capaDiasMes.children());
			capaDiasMes.children().click(function(e){
				var numDiaPulsado = $(this).text();
				if (numDiaPulsado != ""){
					elem.val(ano + "-" + (mes+1) + "-" + numDiaPulsado);
					calendario.fadeOut();
				}
			})
		}
		//función para calcular el número de un día de la semana
		function calculaNumeroDiaSemana(dia,mes,ano){
			var objFecha = new Date(ano, mes, dia);
			var numDia = objFecha.getDay();
			if (numDia == 0) 
				numDia = 6;
			else
				numDia--;
			return numDia;
		}
		
		//función para ver si una fecha es correcta
		function checkdate ( m, d, y ) {
			// función por http://kevin.vanzonneveld.net
			// extraida de las librerías phpjs.org manual en http://www.desarrolloweb.com/manuales/manual-librerias-phpjs.html
			return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
		}
		
		//funcion que devuelve el último día de un mes y año dados
		function ultimoDia(mes,ano){ 
			var ultimo_dia=28; 
			while (checkdate(mes+1,ultimo_dia + 1,ano)){ 
			   ultimo_dia++; 
			} 
			return ultimo_dia; 
		} 
		
		function validarFechaEscrita(TB_FNacimiento){
			var arrayFecha = TB_FNacimiento.split("-");
			if (arrayFecha.length!=3)
				return false;
			return checkdate(arrayFecha[1], arrayFecha[0], arrayFecha[2]);
		}
		
		function validarFechaEscrita(TB_FInicio){
			var arrayFecha = TB_FInicio.split("-");
			if (arrayFecha.length!=3)
				return false;
			return checkdate(arrayFecha[1], arrayFecha[0], arrayFecha[2]);
		}
		
		function validarFechaEscrita(TB_FFin){
			var arrayFecha = TB_FFin.split("-");
			if (arrayFecha.length!=3)
				return false;
			return checkdate(arrayFecha[1], arrayFecha[0], arrayFecha[2]);
		}
		
   });
   return this;
};

$(document).ready(function(){
	$(".campofecha").calendarioDW();
})

</script>
 
 
<div id="main">
    <div id="logo"> <a id="" href="http://www.bogota.gov.co/"><img src="../style/bogota.png" width="119" height="21"></a>    </div>
	<div id="encabezado"></div>
	    
  <div id="Menu_principal" >
		<ul class="menu">
            <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
        
                    <li><a href="Menu.php"><span><?php echo "MENÚ" ?></span></a>
                    </li>
                    <li><a href="Logica/Cerrar_sesion.php"><?php echo 'CERRAR SESIÓN' ?></a>
        </li>
			
		</ul>
  </div>
  

<?php
if(isset($_GET["var"])){
$id=$_GET["var"];

if($id==1){
?>
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
            	
                                       <form id="formInscripcion" action="Logica/adminregistro.php" method="post" onsubmit="return checkForm(this);" accept-charset="UTF-8">
                                      <fieldset>
                                       <div class="box margin_r_15">
        <div class="box_top"></div>
        <div class="box_content">
          <h2>NUEVO USUARIO</h2>
          <table width="100%" border="0">
   <tr>
    <td width="32%" align="right"><label> Tipo de Usuario: </label></td>
    <td width="65%"><select name="DDL_TipoUsuario" id="DDL_TipoUsuario">
    <?php 
	
	$combobit = BD2(7);
	echo $combobit; 
	?>
    </select></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr id="estados2">
    
  </tr>
  <tr>

    <td width="32%" align="right"><label> Tipo de Documento: </label></td>
    <td width="65%"><select name="DDL_TipoDocumento" id="tipodocumen">
    <?php 
	
	$combobit = BD2(5);
	echo $combobit; 
	?>
    </select></td>
    <td width="3%">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label> <?php $str_utf8='Cédula:'; echo "".$str_utf8; ?></label></td>
    <td width="65%"><span id="sprytextfield1">
      <label for="TB_Cedula"></label>
      <input type="text" name="TB_Cedula" id="cedula1" title="Ingrese el número de documento" maxlength="10" value="<?php echo $cedu;?>"  readonly="readonly" onkeyUp="return ValNumero(this);"   required/>
	 
    <td width="3%">&nbsp;</td>
  </tr>

  <tr>
    <td width="32%" align="right"><label><?php $str_utf8='Número de Contrato:'; echo "".$str_utf8; ?> </label>
    <td><span id="sprytextfield2">
    <label for="TB_Contrato"></label>
    <input type="text" name="TB_Contrato" title="Ingrese el numero de contrato" maxlength="10"  onkeyUp="return ValNumero(this);" required/>
    </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" align="right"><label>Primer Nombre: </label>
    <td><span id="sprytextfield3">
    <label for="TB_Nombre"></label>
    <input type="text" name="TB_Nombre" title="Ingrese el nombre del usuario" maxlength="30" required />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label>Segundo Nombre: </label>
    <td><span id="sprytextfield3">
    <label for="TB_Nombre"></label>
    <input type="text" name="TB_Nombre2" title="Ingrese el segundo nombre del usuario" maxlength="30"  />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label>Primer Apellido: </label>
    <td><span id="sprytextfield4">
    <label for="TB_Apellido"></label>
    <input type="text" name="TB_Apellido" title="Ingrese el apellido del usuario" maxlength="30" required/>
    </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label>Segundo Apellido: </label>
    <td><span id="sprytextfield4">
    <label for="TB_Apellido2"></label>
    <input type="text" name="TB_Apellido2" title="Ingrese el segundo apellido del usuario" maxlength="30" />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label>Email: </label>
    <td><span id="sprytextfield5">
    <label for="TB_Email"></label>
    <input type="email" name="TB_Email" id="TB_Email" value="@" maxlength="30" size="40" title="Ingrese el correo del usuario." required />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  

  
  <tr>
   <td align="right"><label >Genero</label></td>
    <td>
    <select name="DDL_Sexo" id=select">
     <<?php 
	$combobit = BD2(4);
	echo $combobit; 
	?>
    </select></td>
    <td></td>
    </tr>
 
 
  
  
  <td align="right"><label >Pais: </label></td>
                                <td>
								<?php 
								
								$Conn = conectar2();
								$sql1="SELECT * FROM pais;";
								$resultado1 = mysql_query($sql1,$Conn)or die(mysql_error());
								desconectar2($Conn);
								?>
                                
                                <?php 
									echo "<select name='TB_Pais' id='TB_Pais'>";
									while ($fila = mysql_fetch_array($resultado1, MYSQL_NUM)) 
									{
												echo "<option value='".$fila[0]."'>". $fila[1] ."</option>";
									}
									echo "</select>"; 
								?>
								</td>
                                <td></td>
                              </tr>
							  
							  <tr>
                              	<td align="right"><label>Ciudad: </label></td>
                                <td>
							  <div id="estados">
							  <select name="edo" title="SELECCIONE CIUDAD" required>
							  <option value=""> Seleccione una Ciudad </option>
							  </select>
							  </div>
								<td></td>
                              </tr>

   <tr>
    <td align="right"><label >ETNIA:</label></td>
    <td><select name="DDL_Etnia" title="SELECCIONE EL TIPO DE ETNIA " id=select" required>
    <?Php
     $combobit = BD2(3);
	echo $combobit; 
    ?>
    </select></td>
    <td></td>
    </tr>
	
   <tr>
    <td width="32%" align="right"><label>Fecha Nacimiento</label></td>
    <td><span id="sprytextfield7">
      <input type="text" name="TB_FNacimiento" class="campofecha" size="12" value="1975-02-01"  title="Fecha de nacimiento"  required/>
     </span></td>
    <td>&nbsp;</td>
  </tr>
		
  <tr>
    <td width="32%" align="right"><label>Fecha Inicio:</label>
    <td><span id="sprytextfield6">
    <label for="TB_Telefono"></label>
    <input name="TB_FInicio" type="text" class="campofecha" size="12" value="1975-02-01"   title="Fecha Inicio Contrato."  required/>
   </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label>Fecha Final</label></td>
    <td><span id="sprytextfield7">
      <input type="text" name="TB_FFin" type="text" class="campofecha" size="12" title="Fecha Fin Contrato"   required/>
     </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  
   <tr>
    <td width="32%" align="right"><label>Usuario: </label>
    <td><span id="sprytextfield4">
    <label for="TB_Apellido2"></label>
    <input type="text" name="TB_Usuario"  id="username" title="Ingrese usuario." maxlength="30"  required/>
	<div id="Info"></div>
    </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label><?php $str_utf8='Contraseña:'; echo "".$str_utf8; ?></label>
    <td><span id="sprytextfield4">
    <label for="TB_Apellido2"></label>
    <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}" name="pwd12" onchange="form.pwd2.pattern = this.value" title="Ingrese contraseña. Mayusculas, minusculas y numeros. Eje. Carlos12" maxlength="10" />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label><?php $str_utf8='Confirme Contraseña:'; echo "".$str_utf8; ?> </label>
    <td><span id="sprytextfield4">
    <label for="TB_Apellido2"></label>
    <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}" name="pwd2" title="Confirme Contraseña" maxlength="30" />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  
  
  </tr>
</tr>
<td>
<br>
</td>
  
 <table width="100%" border="1" id="customers">
							<tr>
							<th>ACTIVIDAD</th>
							<th>SELECCIONAR</th>
							</tr>
  <?php
					
						$Conn = conectar2();
					    $sql="SELECT * FROM actividades where Id_Modulo=3;";   
					    $result=mysql_query($sql); 
					    if($result!=NULL){ 
					    if(mysql_num_rows($result)>0){ 
						$var=1;
					    while($row=mysql_fetch_array($result)){ 
						if($var % 2==0){
						    echo "<tr class=\"alt\">";
						}else{
							echo "<tr align=\"center\">";
							}
						echo "<td >".$row['Nombre_Actividad']."</td>";					
						//echo "<td><a href='Datos/EliminarEmpresa.php?id=".$row['Nit']."'>Eliminar</a></td>";
						echo "<td><input name=\"postre[]\" type=\"checkbox\" value='".$row['Id_Actividad']."'></td>";
						echo "</tr>";
						$var++;
					     } 
						 }else{ 
  ?>
<div id="dialog-message" title="Búsqueda Fallida" >
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
 No hay ninguna coincidencia en la búsqueda.
  </p>
</div><?php
						 } 
						 mysql_free_result($result); 
						 } 
						 desconectar($Conn);
					?>
</table>
</tr>
</tr>
<td>
<br>
</td>
<tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="B_Registro"  value="REGISTRAR" class="button medium red"></td>
    <td>&nbsp;</td>
</tr>
</table>
</form>
  <?php 
  }
  
  
  
  
  
  
  
  
  if($id==2){
?>
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                          <br> <br>  
                         <center>
						  <h1>&nbsp;</h1>
					     </center>
						   
                   		 
                        <div class="dochead">
                	<span class="dhead">Registro de Actividades </span>
                </div>
                                     <div class="post">
                                     <div class="margen_flotante">&nbsp;&nbsp;</div>
            	
                                       <form id="formInscripcion" action="Logica/adminregistroactividades.php" method="post" onsubmit="return checkForm(this);" >
                                      <fieldset>
                                       <div class="box margin_r_15">
        <div class="box_top"></div>
        <div class="box_content">
          <h2>REGISTRO DE ACTIVIDADES</h2>
          <table width="100%" border="0">
   <tr>
    <td width="32%" align="right"><label><?php $str_utf8=' Tipo de Usuario:'; echo "".$str_utf8; ?> </label></td>
    <td width="65%"><select name="DDL_TipoUsuario" id="DDL_TipoUsuario">
    <?php 
	
	$combobit = BD2(7);
	echo $combobit; 
	?>
    </select></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr id="estados2">  
  <tr>
    <td width="32%" align="right"><label><?php $str_utf8='Cédula:'; echo "".$str_utf8; ?> </label></td>
    <td width="65%"><span id="sprytextfield1">
      <label for="TB_Cedula"></label>
      <input type="text" name="TB_Cedula" id="cedula1" title="Ingrese el némero de documento" maxlength="10" value="<?php echo $cedu;?>"  readonly="readonly"  onkeyUp="return ValNumero(this);"  required/>
	 
    <td width="3%">&nbsp;</td>
  </tr>
   <tr>
    <td width="32%" align="right"><label>  <?php $str_utf8='Número Contrato:'; echo "".$str_utf8; ?></label>
    <td><span id="sprytextfield2">
    <label for="TB_Contrato"></label>
    <input type="text" name="TB_Contrato" title="Ingrese el némero de contrato" maxlength="10"  onkeyUp="return ValNumero(this);" required/>
    </span></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td width="32%" align="right"><label><?php $str_utf8='Email:'; echo "".$str_utf8; ?>  </label>
    <td><span id="sprytextfield5">
    <label for="TB_Email"></label>
    <input type="email" name="TB_Email" id="TB_Email" value="@" maxlength="30" size="40" title="Ingrese el correo del usuario." required />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
 <tr>
    <td width="32%" align="right"><label><?php $str_utf8=utf8_decode('Fecha Inicio:'); echo "".$str_utf8; ?> </label>
    <td><span id="sprytextfield6">
    <label for="TB_Telefono"></label>
	
	<input type="text" name="TB_FInicio" type="text" class="campofecha" size="12" title="Fecha Fin Contrato"   required/>
   </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label><?php $str_utf8=utf8_decode('Fecha Final:'); echo "".$str_utf8; ?></label></td>
    <td><span id="sprytextfield7">
	 <input type="text" name="TB_FFin" type="text" class="campofecha" size="12" title="Fecha Fin Contrato"   required/>
      
     </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  
  
  </tr>
</tr>
<td>
<br>
</td>
  
 <table width="100%" border="1" id="customers">
							<tr>
							<th>ACTIVIDAD</th>
							<th>SELECCIONAR</th>
							</tr>
  <?php
					
						$Conn = conectar2();
					    $sql="SELECT * FROM actividades where Id_Modulo=3;";   
					    $result=mysql_query($sql); 
					    if($result!=NULL){ 
					    if(mysql_num_rows($result)>0){ 
						$var=1;
					    while($row=mysql_fetch_array($result)){ 
						if($var % 2==0){
						    echo "<tr class=\"alt\">";
						}else{
							echo "<tr align=\"center\">";
							}
						echo "<td >".utf8_encode($row['Nombre_Actividad'])."</td>";					
						//echo "<td><a href='Datos/EliminarEmpresa.php?id=".$row['Nit']."'>Eliminar</a></td>";
						echo "<td><input name=\"postre[]\" type=\"checkbox\" value='".$row['Id_Actividad']."'></td>";
						echo "</tr>";
						$var++;
					     } 
						 }else{ 
  ?>
<div id="dialog-message" title="Búsqueda Fallida" >
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
 No hay ninguna coincidencia en la búsqueda.
  </p>
</div><?php
						 } 
						 mysql_free_result($result); 
						 } 
						 desconectar($Conn);
					?>
</table>
</tr>
</tr>
<td>
<br>
</td>
<tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="B_Registro"  value="REGISTRAR" class="button medium red"></td>
    <td>&nbsp;</td>
</tr>
</table>
</form>
  <?php 
  }
  
  
  
  
  
  
  
  
  if($id==3){
?>
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                          <br> <br>  
                         <center>
						  <h1>&nbsp;</h1>
					     </center>
						   
                   		 
                        <div class="dochead">
                	<span class="dhead">Registro de Actividades </span>
                </div>
                                     <div class="post">
                                     <div class="margen_flotante">&nbsp;&nbsp;</div>
            	
                                       <form id="formInscripcion" action="Logica/adminregistroUsuaActivi.php" method="post" onsubmit="return checkForm(this);" >
                                      <fieldset>
                                       <div class="box margin_r_15">
        <div class="box_top"></div>
        <div class="box_content">
          <h2>REGISTRO DE ACTIVIDADES</h2>
          <table width="100%" border="0">
   <tr>
    <td width="32%" align="right"><label> Tipo de Usuario: </label></td>
    <td width="65%"><select name="DDL_TipoUsuario" id="DDL_TipoUsuario">
    <?php 
	
	$combobit = BD2(7);
	echo $combobit; 
	?>
    </select></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr id="estados2">  
  <tr>
    <td width="32%" align="right"><label> <?php $str_utf8=utf8_decode('Cédula:'); echo "".$str_utf8; ?>  </label></td>
    <td width="65%"><span id="sprytextfield1">
      <label for="TB_Cedula"></label>
      <input type="text" name="TB_Cedula" id="cedula1" title="Ingrese el número de documento" maxlength="10"  value="<?php echo $cedu;?>"  readonly="readonly" onkeyUp="return ValNumero(this);"  required/>
	 
    <td width="3%">&nbsp;</td>
  </tr>
   <tr>
    <td width="32%" align="right"><label> <?php $str_utf8=utf8_decode('Número Contrato:'); echo "".$str_utf8; ?> </label>
    <td><span id="sprytextfield2">
    <label for="TB_Contrato"></label>
    <input type="text" name="TB_Contrato" title="Ingrese el número de contrato" maxlength="10"  onkeyUp="return ValNumero(this);" required/>
    </span></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td width="32%" align="right"><label>  <?php $str_utf8=utf8_decode(' Email:'); echo "".$str_utf8; ?> </label>
    <td><span id="sprytextfield5">
    <label for="TB_Email"></label>
    <input type="email" name="TB_Email" id="TB_Email" value="@" maxlength="30" size="40" title="Ingrese el correo del usuario." required />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
 <tr>
    <td width="32%" align="right"><label>  <?php $str_utf8=utf8_decode('Fecha Inicio:'); echo "".$str_utf8; ?> </label>
    <td><span id="sprytextfield6">
    <label for="TB_Telefono"></label>
	 <input type="text" name="TB_FInicio" type="text" class="campofecha" size="12" title="Fecha Fin Contrato"   required/>
    
   </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label>  <?php $str_utf8=utf8_decode('Fecha Final:'); echo "".$str_utf8; ?> </label></td>
    <td><span id="sprytextfield7">
      
	   <input type="text" name="TB_FFin" type="text" class="campofecha" size="12" title="Fecha Fin Contrato"   required/>
     </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  
     <tr>
    <td width="32%" align="right"><label>  <?php $str_utf8=utf8_decode('Usuario:'); echo "".$str_utf8; ?> Usuario: </label>
    <td><span id="sprytextfield4">
    <label for="TB_Apellido2"></label>
    <input type="text" name="TB_Usuario"  id="username" title="Ingrese usuario." maxlength="30"  required/>
	<div id="Info"></div>
    </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label>  <?php $str_utf8=utf8_decode('Contraseña:'); echo "".$str_utf8; ?>  </label>
    <td><span id="sprytextfield4">
    <label for="TB_Apellido2"></label>
    <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}" name="pwd1" onchange="form.pwd2.pattern = this.value" title="Ingrese contraseña. Mayusculas, minusculas y numeros. Eje. Carlos12" maxlength="10" />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label>Confirme Contraseña: </label>
    <td><span id="sprytextfield4">
    <label for="TB_Apellido2"></label>
    <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}" name="pwd2" title="Confirme Contraseña" maxlength="30" />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  
  
  </tr>
</tr>
<td>
<br>
</td>
  
 <table width="100%" border="1" id="customers">
							<tr>
							<th>ACTIVIDAD</th>
							<th>SELECCIONAR</th>
							</tr>
  <?php
					
						$Conn = conectar2();
					    $sql="SELECT * FROM actividades where Id_Modulo=3;";   
					    $result=mysql_query($sql); 
					    if($result!=NULL){ 
					    if(mysql_num_rows($result)>0){ 
						$var=1;
					    while($row=mysql_fetch_array($result)){ 
						if($var % 2==0){
						    echo "<tr class=\"alt\">";
						}else{
							echo "<tr align=\"center\">";
							}
						echo "<td >".utf8_encode($row['Nombre_Actividad'])."</td>";					
						//echo "<td><a href='Datos/EliminarEmpresa.php?id=".$row['Nit']."'>Eliminar</a></td>";
						echo "<td><input name=\"postre[]\" type=\"checkbox\" value='".$row['Id_Actividad']."'></td>";
						echo "</tr>";
						$var++;
					     } 
						 }else{ 
  ?>
<div id="dialog-message" title="Búsqueda Fallida" >
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
 No hay ninguna coincidencia en la búsqueda.
  </p>
</div><?php
						 } 
						 mysql_free_result($result); 
						 } 
						 desconectar($Conn);
					?>
</table>
</tr>
</tr>
<td>
<br>
</td>
<tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="B_Registro"  value="REGISTRAR" class="button medium red"></td>
    <td>&nbsp;</td>
</tr>
</table>
</form>
  <?php 
  }
  
  
  
  
  
  
  
  
  
  
  
    if($id==4){
?>
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                          <br> <br>  
                         <center>
						  <h1>&nbsp;</h1>
					     </center>
						   
                   		 
                        <div class="dochead">
                	<span class="dhead">Registro de Actividades </span>
                </div>
                                     <div class="post">
                                     <div class="margen_flotante">&nbsp;&nbsp;</div>
            	
                                       <form id="formInscripcion" action="Logica/adminregistroUsuaSuperA.php" method="post" onsubmit="return checkForm(this);" >
                                      <fieldset>
                                       <div class="box margin_r_15">
        <div class="box_top"></div>
        <div class="box_content">
          <h2>REGISTRO DE ACTIVIDADES</h2>
          <table width="100%" border="0">
   <tr>
    <td width="32%" align="right"><label> Tipo de Usuario: </label></td>
    <td width="65%"><select name="DDL_TipoUsuario" id="DDL_TipoUsuario">
    <?php 
	
	$combobit = BD2(7);
	echo $combobit; 
	?>
    </select></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr id="estados2">  
  <tr>
    <td width="32%" align="right"><label><?php $str_utf8=utf8_decode('Cédula:'); echo "".$str_utf8; ?> </label></td>
    <td width="65%"><span id="sprytextfield1">
      <label for="TB_Cedula"></label>
      <input type="text" name="TB_Cedula" id="cedula1" title="Ingrese el número de documento" maxlength="10"  value="<?php echo $cedu;?>"  readonly="readonly" onkeyUp="return ValNumero(this);"  required/>
	 
    <td width="3%">&nbsp;</td>
  </tr>
   <tr>
    <td width="32%" align="right"><label><?php $str_utf8=utf8_decode('Nuúmero Contrato:'); echo "".$str_utf8; ?> </label>
    <td><span id="sprytextfield2">
    <label for="TB_Contrato"></label>
    <input type="text" name="TB_Contrato" title="Ingrese el número de contrato" maxlength="10"  onkeyUp="return ValNumero(this);" required/>
    </span></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td width="32%" align="right"><label><?php $str_utf8=utf8_decode('Email:'); echo "".$str_utf8; ?> </label>
    <td><span id="sprytextfield5">
    <label for="TB_Email"></label>
    <input type="email" name="TB_Email" id="TB_Email" value="@" maxlength="30" size="40" title="Ingrese el correo del usuario." required />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
 <tr>
    <td width="32%" align="right"><label> <?php $str_utf8=utf8_decode('Fecha Inicio:'); echo "".$str_utf8; ?></label>
    <td><span id="sprytextfield6">
    <label for="TB_Telefono"></label>
	
    
	 <input type="text" name="TB_FInicio" type="text" class="campofecha" size="12" title="Fecha Fin Contrato"   required/>
	
	
   </span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="32%" align="right"><label> <?php $str_utf8=utf8_decode('Fecha Final :'); echo "".$str_utf8; ?></label></td>
    <td><span id="sprytextfield7">
	  
	   <input type="text" name="TB_FFin" type="text" class="campofecha" size="12" title="Fecha Fin Contrato"   required/>
     </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  
<td>
<br>
</td>
<tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="B_Registro"  value="REGISTRAR" class="button medium red"></td>
    <td>&nbsp;</td>
</tr>
</table>
</form>
  <?php 
  }
  
  
  
  
  
  
  
  
  
  
 }else{
 ?>        
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
            	
                                      <fieldset>
                                       <div class="box margin_r_15">
        <div class="box_top"></div>
        <div class="box_content">
          <h2><?php echo 'VERIFICACIÓN DE USUARIO' ?></h2>
         <table width="100%" border="0">
		 <tr>
    <td width="32%" align="right"><label><?php $str_utf8=utf8_decode('Cedula:'); echo "".$str_utf8; ?> </label></td>
    <td width="65%"><span id="sprytextfield1">
      <label for="TB_Cedula"></label>
      <input type="text" name="TB_Cedula" id="cedula" title="Ingrese el número de documento" maxlength="10"  onkeyUp="return ValNumero(this);"  required/>
	  <div id="Info2"></div>
      </span></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" name="B_Registro"  value="Verificar" class="button medium red"></td>
    <td>&nbsp;</td>
</tr>
  </table>
  
		<?php 
 }
 ?>     
		  
 
          <div class="button_01"></div>
          
        </div>
        
        <div class="box_bottom"></div>
      </div>
      </fieldset>
                                       
                                        
                                     </div>
                                     
                                  
                       
    </div>    
				
 <br><br><br>
 <br><br>

</div>

<div >
          <br>
   


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