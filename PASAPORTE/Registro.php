<?php 
   session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
   <head>
      <title>Pasaporte Vital</title>
      <!-- **** stylesheet **** -->
      <link rel="stylesheet" type="text/css" href="style.css">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <link rel="stylesheet" type="text/css" href="style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
      <!-- (Optional) Latest compiled and minified JavaScript translation files -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/i18n/defaults-*.min.js"></script>
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
         div#informativo1{
         border-radius:9px;-moz-border-radius: 9px; -webkit-border-radius : 9px;
         margin:auto;
         width:700px;
         color: #000000;
         background-color:#FFFFFF;
         border:2px solid #FF8080;
         }
         input[type="text"] {
         border: thin transparent solid;
         width: 300px;
         border:2px solid #a1a1a1;
         }
         input[type="email"] {
         border: thin transparent solid;
         width: 300px;
         }
         select {
         background: transparent;
         border:2px solid #a1a1a1;
         width: 310px;
         font-size: 14px;
         line-height: 1;
         }
      </style>
      <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
      <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
      <script type="text/javascript">
         $(document).ready(function(){
             $('#TB_Pais').click(function(){
                 var id=$('#TB_Pais').val();
                 $('#estados').load('Logica/BD2_Ciudad.php?id='+id);

             });    
         });                  
         
         $(document).ready(function(){                
         $('#DDL_Enfermedad').change(function(){
         var id=$('#DDL_Enfermedad').val();
         if(id=="SI")
         {
         document.getElementById("TB_SeguroDescripcion").style.visibility="visible";  
         document.getElementById("lblEnfermedad").style.visibility="visible"; 
         }else
         {
         document.getElementById("TB_SeguroDescripcion").style.visibility="hidden";
         document.getElementById("lblEnfermedad").style.visibility="hidden";
         
         }
         //$('#estadosEnfer').load('Logica/BD2_Enfermedad.php?id='+id);
         });
         });
         
      </script>
      <script type="text/javascript">
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
         
         function validarEmail( tbx ) {
         //var email=$(tbx).val();
           //expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
           //if ( !expr.test(email) )
             //  alert("Error: La direcci�n de correo " + email + " es incorrecta.");
         //$(tbx).val("");
         }
         
         function isNumberKey(evt)
             {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                   return false;
         
                return true;
             }
         
      </script>
   </head>
   <body>
      <?php if(isset($_SESSION['rol'])){?>  
      <?php 
         }else{ 
         $_SESSION['internet']=1;
         ?>
      <div id="dialog-message" title="Formulario Ingreso" >
         <p>
            <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
            Inscriba todos los datos y ac&eacute;rquese a alguno de los supercades a reclamar su carnet. 
         </p>
         <p>
            <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
            En los supercades usted puede tambi&eacute;n llenar este formato con ayuda de nuestros Funcionarios.
         </p>
         <p>
            Supercades <b>20 de Julio - Suba - Catastro - Americas - Bosa.</b>
         </p>
      </div>
      <?php }
         ?>
      <div id="main">
         <div id="logo"> <a id="" href="http://www.bogota.gov.co/"><img src="../style/bogota.png" width="119" height="21"></a>    </div>
         <div id="encabezado"></div>
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
         <div></div>
         <div id="Menu_principal" >
            <ul class="menu">
               <li><a href="Index.php">INICIO</a></li>
               <li><a href="ayuda.php">AYUDA</a></li>
               <?php if(isset($_SESSION['ID'])){ ?>
               <li><a href="Menu.php"><span>MEN&Uacute;</span></a></li>
               <li><a href="Logica/Cerrar_sesion.php">CERRAR SESI&Oacute;N</a></li>
               <?php }else{ ?>
               <li><a href="Registro.php">REGISTRO</a></li>
               <li><a href="Renovacion_Pasaporte.php">RENOVACION</a></li>
               <li><a href="Pasaporte.php">PASAPORTE</a></li>
               <?php } ?>
            </ul>
         </div>
         <div id="site_contentidrd5" style="margin:auto;  width:700px;">
            <div id="templatemo_header_35" style="margin:auto;  width:700px;">
               <br><br>                     
               <div id="informativo1">
                  <form id="formularioRegistro" name="formularioRegistro"  method="POST" action="Logica/operarioRegistro.php">
                     <table width="100%" border="0">
                        <tr>
                           <td width="33%" height="60" >&nbsp;</td>
                           <td width="37%" ><FONT color="#000000" SIZE=6 >FORMATO DE INSCRIPCI&Oacute;N&nbsp </font><br><br></td>
                           <td width="30%" >&nbsp;</td>
                        </tr>
                     </table>
                     <table width="100%" height="84" border="0">
                        <tr>
                           <td width="31%" height="15" align="right" ><label for="DDL_Cade"><b> SuperCADE: </b></label></td>
                           <td width="64%" >
                              <select name="DDL_Cade" id="DDL_Cade" title="SELECCIONE EL SUPER CADE">
                                 <?php               if(isset($_SESSION['ID'])){ ?>
                                 <option>SuperCADE Americas</option>
                                 <option>SuperCADE Bosa</option>
                                 <option>SuperCADE CAD</option>
                                 <option>SuperCADE Suba</option>
                                 <option>SuperCADE 20 de Julio</option>
                                 <option>Unidad Deportiva el Salitre (UDS)</option>
                                 <?php } else{?>
                                 <option>Internet</option>
                                 <?php } ?>                           
                              </select>
                           </td>
                           <td width="5%" > </td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >ES PENSIONADO?</label></b></td>
                           <td>
                              <select name="DDL_Pensionado">
                                 <option>SI</option>
                                 <option>NO</option>
                              </select>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >SEXO</label></b></td>
                           <td>
                              <select name="DDL_Sexo">
                              <?php 
                                 include ("Logica/BD2_Registro.php");
                                 $combobit = BD2(4);
                                 echo $combobit; 
                                 ?>
                              </select>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td width="31%" height="15" align="right" ><label for="DDL_Documento"><b> TIPO DE DOCUMENTO: </b></label></td>
                           <td width="64%" ><select name="DDL_Documento" id="DDL_Documento" onchange="tipoDocumento();" title="SELECCIONE EL TIPO DE DOCUMENTO">
                              <?Php
                                 $combobit = BD2(5);
                                 
                                 echo $combobit; 
                                                         ?>
                              </select>
                           </td>
                           <td width="5%" > </td>
                        </tr>
                        <tr>
                           <td align="right"><label for="TB_Documento"  >NUMERO DOCUMENTO:</label></td>
                           <td >                               
                              <input type="text" name="TB_Documento"  id="textarea1"  maxlength="10" title="ESCRIBA AQU� EL NUMERO DE DOCUMENTO" onkeypress="return isNumberKey(event)" title="Solo Números, sin puntos." placeholder="Solo numeros, sin puntos"  onfocus="this.value=''"  required />
                           </td>
                           <td ></td>
                        </tr>
                        <tr>
                           <td align="right" ><label for="TB_Apelldios"><b>PRIMER APELLIDO: </b></label></td>
                           <td>
                              <input type="text" name="TB_Apelldios"  id="textarea1" size="50" maxlength="50" title="ESCRIBA PRIMER APELLIDOS" required/>
                           </td>
                           <td ></td>
                        </tr>
                        <tr>
                           <td align="right" ><label for="TB_Apelldios_2"><b>SEGUNDO APELLIDO: </b></label></td>
                           <td >
                              <input type="text" name="TB_Apelldios_2"  id="textarea1" size="50" maxlength="50" title="ESCRIBA LOS APELLIDOS"/>
                           </td>
                           <td ></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label for="TB_Nombres">PRIMER NOMBRE: </label></b></td>
                           <td>
                              <input type="text" name="TB_Nombres"  id="textarea1" size="50" maxlength="50" title="ESCRIBA PRIMER NOMBRE" required/>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right" ><label for="TB_Nombres_2"><b>SEGUNDO NOMBRE: </b></label></td>
                           <td >
                              <input type="text" name="TB_Nombres_2"  id="textarea1" size="50" maxlength="50" title="ESCRIBA SEGUNDO APELLIDO"/>
                           </td>
                           <td ></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label>FECHA DE NACIMIENTO:</label></b></td>
                           <td>
                              <label>Dia:</label>
                              <select name="DDL_Dia" id="DDL_Dia" style="width:60px;">
                                 <?php
                                    for ($j=1;$j<=31;$j++)
                                    {?>
                                 <option><?php echo $j ?></option>
                                 <?php
                                    }?>
                              </select>
                              <b><label>Mes:</label></b>
                              <select name="DDL_Mes" id="DDL_Mes" style="width:80px;">
                                 <option>ENERO</option>
                                 <option>FEBRERO</option>
                                 <option>MARZO</option>
                                 <option>ABRIL</option>
                                 <option>MAYO</option>
                                 <option>JUNIO</option>
                                 <option>JULIIO</option>
                                 <option>AGOSTO</option>
                                 <option>SEPTIEMBRE</option>
                                 <option>OCTUBRE</option>
                                 <option>NOVIEMBRE</option>
                                 <option>DICIEMBRE</option>
                              </select>
                              <b><label>A&nacute;o:</label></b>
                              <select name="DDL_Anio" id="DDL_Anio" style="width:70px;">
                                 <?php
                                    $AÑO=date("Y");
                                    for ($i=$AÑO;$i>=1900;$i--)
                                    {?>
                                 <option><?php echo $i ?></option>
                                 <?php
                                    }?>
                              </select>
                           </td>
                           <td></td>
                        <tr>
                           <td align="right"><b><label >PA&Iacute;S DE NACIMIENTO: </label></b></td>
                           <td>
                              <?php 
                                 $Conn = conectar2();
                                 $sql1="SELECT * FROM pais;";
                                 $resultado1 = mysql_query($sql1,$Conn)or die(mysql_error());
                                 desconectar2($Conn);
                                 ?>
                              <?php 
                                 echo "<select name='TB_Pais' id='TB_Pais'>";
                                          echo "<option value='41'>Colombia</option>";
                                 while ($fila = mysql_fetch_array($resultado1, MYSQL_NUM)) 
                                 {
                                      echo "<option value='".$fila[0]."'>".$fila[1]."</option>";
                                 }
                                 echo "</select>"; 
                                 ?>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >CIUDAD: </label></b></td>
                           <td>
                              <div id="estados">
                                 <select name="TB_Ciudad" title="SELECCIONE CIUDAD">
                                    <option value=""> Selecione Ciudad </option>
                                 </select>
                              </div>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >E-MAIL: </label></b></td>
                           <td><input name="TB_Email" type="text" id="textarea1" value="@" size="50" maxlength="150" title="ESCRIBA UN CORREO ELECTRONICO DE CONTACTO" onblur="validarEmail(this)"/></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >LOCALIDAD: </label></b></td>
                           <td>
                              <select name="DDL_Localidad" title="SELECCIONE LA LOCADIDAD DONDE VIVE">
                              <?php 
                                 $combobit = BD2(1);
                                 echo $combobit; 
                                 ?>
                              </select>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >ESTRATO: </label></b></td>
                           <td>
                              <select name="DDL_Estrato" title="SELECCIONE EL ESTRATO">
                                 <option>0</option>
                                 <option>1</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                                 <option>6</option>
                              </select>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >DIRECCI&Oacute;N DE RESIDENCIA: </label></b></td>
                           <td>                                 
                              <input type="text" name="TB_Direccion"  id="textarea1" size="50" maxlength="150" title="ESCRIBA LA DIRECCI�N DE RESIDENCIA" required/>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >TEL&Eacute;FONO FIJO: </label></b></td>
                           <td><input name="TB_Telefono" type="text" id="textarea1" size="50" maxlength="10" onkeyUp="return ValNumero(this);" title="ESCRIBA EL NUMERO DE TEL�FONO FIJO"/></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >TEL&Eacute;FONO CELULAR:</label></b></td>
                           <td><input name="TB_Celular" type="text" id="textarea1" size="50" maxlength="10" onkeyUp="return ValNumero(this);" title="ESCRIBA EL NUMERO DE TEL�FONO CELULAR"/></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label style=" visibility:hidden" >NIVEL DE ESTUDIOS:</label></b></td>
                           <td>
                              <input  name="DDL_Educacion" type="hidden" value="OTRO">
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label style=" visibility:hidden" >SUFRE ALGUNA ENFERMEDAD?</label></b></td>
                           <td>
                              <input type="hidden" name="DDL_Enfermedad" id="DDL_Enfermedad" value="no">
                           </td>
                           <td></td>
                        </tr>
                        <td align="right"><b><label style=" visibility:hidden" id="lblEnfermedad" >CUAL?</label></b></td>
                        <td>                          
                           <input type="hidden"   name="TB_SeguroDescripcion" id="TB_SeguroDescripcion" value="">     
                        </td>
                        <td></td>
                        </tr>             
                        <tr>
                           <td align="right"><b><label title="SELECCIONE UNA O M&Aacute;S ACTIVIDADES DE INTER&Eacute;S ">ACTIVIDADES DE INTER&Eacute;S:</label></b></td>
                           <td>
                              <select name="DDL_Interes" title="SELECCIONE EL TIPO DE SEGURIDAD SOCIAL ">
                              <?Php
                                 $combobit = BD2(9);
                                 echo $combobit;
                                 ?>
                              </select>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >HABILIDAD:</label></b></td>
                           <td><select name="DDL_Habilidad" title="SELECCIONE EL TIPO DE SEGURIDAD SOCIAL ">
                              <?Php
                                 $combobit = BD2(8);
                                 echo $combobit;
                                                 ?>
                              </select>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >TIPO DE SEGURIDAD SOCIAL:</label></b></td>
                           <td><select name="DDL_Seguro" title="SELECCIONE EL TIPO DE SEGURIDAD SOCIAL ">
                              <?Php
                                 $combobit = BD2(2);
                                 echo $combobit; 
                                                         ?>
                              </select>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                        <tr>
                           <td align="right"><b><label style=" visibility:hidden" >ETNIA:</label></b></td>
                           <td><select  style=" visibility:hidden" name="DDL_Etnia" title="SELECCIONE EL TIPO DE ETNIA ">
                              <?Php
                                 $combobit = BD2(3);
                                 echo $combobit; 
                                                         ?>
                              </select>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"></td>
                           <td align="center"><B><label ><br />
                              DATOS DE PERSONA DE CONTACTO</label></b>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >NOMBRE COMPLETO:</label></b></td>
                           <td>
                              <input type="text" name="TB_NomContacto"  id="textarea1" size="50" maxlength="100" title="ESCRIBA EL NOMBRE COMPLETO DE LA PERSONA DE CONTACTO"/>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >TEL&Eacute;FONO FIJO:</label></b></td>
                           <td>
                              <input type="text" name="TB_TelContacto"  id="textarea1" size="50" maxlength="10" onkeyUp="return ValNumero(this);" title="ESCRIBA EL TEL�FONO FIJO DE LA PERSONA DE CONTACTO" />
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >TEL&Eacute;FONO CELULAR </label></b></td>
                           <td>
                              <input type="text" name="TB_CelContacto" id="textarea1" size="50" maxlength="10" onkeyUp="return ValNumero(this);" title="ESCRIBA EL TEL�FONO CELULAR DE LA PERSONA DE CONTACTO" />
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >OBSERVACIONES </label></b></td>
                           <td><textarea name="TB_Observaciones" id="textarea1" cols="20" rows="2" maxlength="500" title="AQU� PUEDE ESCRIBIR CUALQUIER CLASE DE OBSERVACI�N O ACLARACI�N"></textarea></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"></td>
                           <td></td>
                           <td></td>
                        </tr>
                        <tr>
                           <?php if(isset($_SESSION['ID'])){ ?>
                        <tr>
                           <td></td>
                           <td align="center"><b><label >ENCUESTA </label></b></td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right" ><b><label >Como se enter&oacute; del servicio de pasaporte vital? </label></b></td>
                           <td>
                              <span id="spryselect1">
                                 <label for="pregunta_1"></label>
                                 <select name="ddlPregunta1" id="pregunta_1">
                                    <option value="-1" selected="selected">--Seleccione--</option>
                                    <option value="Por la pagina del IDRD">Por la pagina del IDRD</option>
                                    <option value="Por un beneficiario">Por un beneficiario</option>
                                    <option value="Por publicidad del idrd">Por publicidad del idrd</option>
                                    <option value="Por una empresa vinculada">Por una empresa vinculada</option>
                                    <option value="Otro">Otro</option>
                                 </select>
                                 <span class="selectRequiredMsg">*</span>
                              </span>
                           </td>
                           <td></td>
                        </tr>
                       <!--  <tr>
                           <td align="right"><b>
                              <label >Califique la agilidad en el tramite del pasaporte: </label></b>
                           </td>
                           <td>
                              <span id="spryselect2">
                                 <label for="ddlPregunta2"></label>
                                 <select name="ddlPregunta2" id="ddlPregunta2">
                                    <option value="-1" selected="selected">--Seleccione--</option>
                                    <option value="Excelente">Excelente</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Malo">Malo</option>
                                    <option value="Deficiente">Deficiente</option>
                                 </select>
                                 <span class="selectRequiredMsg">*</span>
                              </span>
                           </td>
                           <td> -->
                             <tr>
                           <td align="right"><b>
                              <label >Le fue clara la información suministrada referente a los beneficios de el pasaporte vital.</label></b>
                           </td>
                           <td>
                              <span id="spryselect2">
                                 <label for="ddlPregunta2"></label>
                                 <select name="ddlPregunta2" id="ddlPregunta2">
                                    <option value="-1" selected="selected">--Seleccione--</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                 </select>
                                 <span class="selectRequiredMsg">*</span>
                              </span>
                           </td>
                           <td>

                           </td>
                        </tr>
                        <tr>
                           <td align="right"><b>
                              <label >Califique la atención recibida por los funcionarios:</label></b>
                           </td>
                           <td>
                              <span id="spryselect3">
                                 <label for="ddlPregunta3"></label>
                                 <select name="ddlPregunta3" id="ddlPregunta3">
                                    <option value="-1" selected="selected">--Seleccione--</option>
                                    <option value="Excelente">Excelente</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Malo">Malo</option>
                                    <option value="Deficiente">Deficiente</option>
                                 </select>
                                 <span class="selectRequiredMsg">*</span>
                              </span>
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                           <td align="right"><b><label >CALIFIQUE LA AGILIDAD DEL TRAMITE DEL PASAPORTE VITAL</label></b></td>
                           <td>
                              <span id="spryselect4">
                                 <label for="ddlPregunta4"></label>
                                 <select name="ddlPregunta4" id="ddlPregunta4">
                                    <option value="-1" selected="selected">--Seleccione--</option>
                                    <option value="Excelente">Excelente</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Malo">Malo</option>
                                    <option value="Deficiente">Deficiente</option>
                                 </select>
                                 <span class="selectRequiredMsg">*</span>
                              </span>
                           </td>
                           <td></td>
                        </tr>
                        <?php } ?>     
                        <tr>
                           <td align="right"></td>
                           <td align="center"><input type="submit" name="B_Registrar" id="B_Registrar" value="Registrar" class="button medium red"></td>
                           <td></td>
                        </tr>
                     </table>
                     <br><br>
                  </form>
               </div>
               <?php
                  ?>
               <br><br><br><br><br>
            </div>
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
         var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
         var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
         var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1",{invalidValue:"-1"});
         var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2",{invalidValue:"-1"});
         var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3",{invalidValue:"-1"});
         var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4",{invalidValue:"-1"});
      </script>
   </body>
</html>
<?php
   ?>
