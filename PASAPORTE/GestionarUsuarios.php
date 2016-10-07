<?php
session_start();
if(isset($_SESSION['ID'])){
	$vector = $_SESSION['permisos'];
			if(isset($_SESSION['ID'])&&$vector[3]==1){
				
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="es" />
<script type="text/javascript" src="js/jquery_1.4.js"></script>
<script type="text/javascript" src="js/jquery_validate.js"></script>

  
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
		'numero_identidad': { required: 'Debe ingresar el n�mero de documento de identidad', number: 'Debe ingresar un n�mero' },
		'email': { required: 'Debe ingresar un correo electr�nico', email: 'Debe ingresar el correo electr�nico con el formato correcto. Por ejemplo: u@localhost.com' },
		'tipo_identidad': 'Debe ingresar el n�mero de documento',
		'deportes[]': 'Debe seleccionar m�nimo un deporte'
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
  <link rel="stylesheet" href="/resources/demos/style.css" />
  
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
		
function pasar() {
	obj=document.getElementById('lbxHabilitados');
	if (obj.selectedIndex==-1) return;
  for (i=0; opt=obj.options[i]; i++)
    if (opt.selected) {		
    	valor=opt.value; // almacenar value
    	txt=obj.options[i].text; // almacenar el texto
    	obj.options[i]=null; // borrar el item si est� seleccionado
		if (obj.options.length==0){
    		opc = new Option('-','-');
    		eval(obj.options[obj.options.length]=opc);
		}		
    	obj2=document.getElementById('lbxDeshabilitados');
      if (obj2.options[0].value=='-') // si solo est� la opci�n inicial borrarla
        obj2.options[0]=null;
    	opc = new Option(txt,valor);
    	eval(obj2.options[obj2.options.length]=opc);
  }	
}

function volver() {
	obj=document.getElementById('lbxDeshabilitados');
	if (obj.selectedIndex==-1) return;
  for (i=0; opt=obj.options[i]; i++)
    if (opt.selected) {
    	valor=opt.value; // almacenar value
    	txt=obj.options[i].text; // almacenar el texto
    	obj.options[i]=null; // borrar el item si est� seleccionado
		if (obj.options.length==0){
    		opc = new Option('-','-');
    		eval(obj.options[obj.options.length]=opc);
		}	
    	obj2=document.getElementById('lbxHabilitados');
      if (obj2.options[0].value=='-') // si solo est� la opci�n inicial borrarla
        obj2.options[0]=null;
    	opc = new Option(txt,valor);
    	eval(obj2.options[obj2.options.length]=opc);
  }	
}

function leer_lista() {

	s=document.getElementById('lbxHabilitados');
	s.setAttribute('size',1);
	lim = (s.options.length);
	j=0;
	while (j < lim){
		s.options[j].selected=1;
		j++;	
	}
	
	s=document.getElementById('lbxDeshabilitados');
	s.setAttribute('size',1);
	lim = (s.options.length);
	j=0;
	while (j < lim){
		s.options[j].selected=1;
		j++;	
	}
}

</script>	
 
<div id="main">
    <div id="logo"> <a id="" href="http://www.bogota.gov.co/"><img src="../style/bogota.png" width="119" height="21"></a>    </div>
	<div id="encabezado"></div>
	    
   <div id="Menu_principal" >
		<ul class="menu">
            <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
        
                    <li><a href="Menu.php"><span>MENÚ</span></a>
                        
                    </li>
                    
                    <li><a href="Logica/Cerrar_sesion.php">CERRAR SESIÓN</a>
        </li>
			
		</ul>
  </div>
 
  <div id="site_contentidrd">

                       <div id="templatemo_header_3">
                          <br> <br>  
                         <center>
						  <h1>&nbsp;</h1>
					     </center>
						   
                   		 
                        <div class="dochead">
                	<span class="dhead">Gestionar Usuarios </span>
                </div>
                                     <div class="post">
                                     <div class="margen_flotante">&nbsp;&nbsp;</div>
            	                                       
                                       <div class="box margin_r_15">
        <div class="box_top"></div>
        <div class="box_content">
          <h2>Activar o desactivar usuarios</h2>
            <?php
					include ("Datos/Conexion.php");
					$Conn = conectar();
					  
						
						$sql="SELECT A.idUsuario, A.apellidoUsuario, A.nombreUsuario FROM pasaporte_usuario A, pasaporte_login B WHERE A.idUsuario=B.idUsuario AND B.estadoUsuario LIKE('ACTIVO') AND B.idRol=2;"; 
						$result=mysql_query($sql);
						
						
					  ?>
					  
				<form id="formInscripcion" action="Logica/gestionusuarios.php" method="post" >
                                      
                                      	  
          <table width="100%" border="0">
          <tr><td align="center"> <h2>Activos</h2></td><td></td><td align="center"> <h2>Inactivos</h2></td></tr>
          <tr> 
          	<td align="left"><select name="lbxHabilitados[]" ondblclick="pasar()" style="width:200px" size="10" id="lbxHabilitados" multiple="multiple">
            <option value="-">-</option>
            <?php
			 while($row=mysql_fetch_array($result)){  
						echo "<option value=\"".$row['idUsuario']."\" title=\"".$row['apellidoUsuario']." ".$row['nombreUsuario']."  [".$row['idUsuario']."]\">".$row['apellidoUsuario']." ".$row['nombreUsuario']."</option>";
						//echo $row['idUsuario'];
						}
						mysql_free_result($result); 
						desconectar($Conn);		    
					   
					
					?>
            </select>
            <!---
            <div id="sortable1" class="connectedSortable" style="cursor:move">
  <li class="ui-state-focus">Item 1</li>
  <li class="ui-state-focus">Item 2</li>
  <li class="ui-state-focus">Item 3</li>
  <li class="ui-state-focus">Item 4</li>
  <li class="ui-state-focus">Item 5</li>
</div-->
  </td> <td align="center"><input type="button" name="Add" onclick="pasar();" id="Add" value="&gt;&gt;" title="Desactivar" /><input type="button" name="Remove" onclick="volver();" id="Remove" title="Activar" value="<<" /></td> 
  <td align="right">
  <?php
  $Conn = conectar();
  
						$sql="SELECT A.idUsuario, A.apellidoUsuario, A.nombreUsuario FROM pasaporte_usuario A, pasaporte_login B WHERE A.idUsuario=B.idUsuario AND B.estadoUsuario LIKE('INACTIVO') AND B.idRol=2;"; 
						$result=mysql_query($sql);
						
  
  
   ?>
  <select name="lbxDeshabilitados[]" ondblclick="volver()" style="width:200px" size="10" id="lbxDeshabilitados" multiple="multiple">
  <option value="-">-</option>
              <?php
			 while($row=mysql_fetch_array($result)){  
						echo "<option value=\"".$row['idUsuario']."\" title=\"".$row['apellidoUsuario']." ".$row['nombreUsuario']."  [".$row['idUsuario']."]\">".$row['apellidoUsuario']." ".$row['nombreUsuario']."</option>";
						//echo $row['idUsuario'];
						}
						mysql_free_result($result); 
						desconectar($Conn);		    
					   
					
					?>
            </select>
  
  <!--
<div id="sortable2" class="connectedSortable" style="cursor:move">
  <li class="ui-state-highlight">Item 1</li>
  <li class="ui-state-highlight">Item 2</li>
  <li class="ui-state-highlight">Item 3</li>
  <li class="ui-state-highlight">Item 4</li>
  <li class="ui-state-highlight">Item 5</li>
</div>-->
            </td>
          </tr>
          <tr><td colspan="3" align="center"><br />
          <input onclick="leer_lista()" type="submit" value="Guardar" class=" button medium red" />
          </td></tr>
         
          </table>
            </form>
          <div class="button_01"></div>
          
        </div>
        
        <div class="box_bottom"></div>
      </div>
      
                                        
                                     </div>
                                     
                                  
         <br><br><br><br><br>              
    </div>    

<br><br><br><br><br>
<br><br><br><br><br>
</div>

</div>
</body></html>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <style>
  #sortable1, #sortable2 { list-style-type: none; margin: 0; padding: 0 0 2.5em; float: left; margin-right: 10px; }
  #sortable1 li, #sortable2 li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; width: 120px; }
  </style>
  <script>
  $(function() {
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  });
  
  </script>
  

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
