<?php
include ("Logica/BD2_Registro.php");
session_start();
if(isset($_SESSION['ID'])){
	$vector = $_SESSION['permisos'];
			if(isset($_SESSION['ID'])&&$vector[13]==1){
				$_SESSION['actualizacion']=0;
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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/apprise.js"></script>
<link rel="stylesheet" href="css/apprise.css" type="text/css" />

<meta charset="utf-8" />
  <title>jQuery UI Accordion - No auto height</title>
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
    <div id="Menu_principal" >
		<ul class="menu">
            <li><a href="Index.php">INICIO</a></li>
          	<li><a href="ayuda.php">AYUDA</a></li>
        
                    <li><a href="Menu.php"><span><?php echo utf8_encode("MENÚ") ?></span></a>
                        
                    </li>
                    
                    <li><a href="Logica/Cerrar_sesion.php"><?php echo utf8_encode("CERRAR SESIÓN") ?></a>
        </li>
			
		</ul>
  </div>
  
   
  <div id="site_contentidrd">


    <div id="templatemo_header_3">
      <center>
        <h1><center>
          <h1><font color="#FF0000" size="6">.: MODIFICACION DE DATOS:.</font></h1>
        </center></h1>
      </center>
      <div class="uno" id="dos"></div>
      <form id="form1" method="post" action="Logica/Modificacion.php">
        <p><center>
          <label for="TB_Cedula">Cedula:</label>
          <input type="text" name="TB_Cedula" id="TB_Cedula" />
          <input type="submit" name="BT_Cedula" id="BT_Cedula" value="Solicitar" />
        </center></p>
        <p>&nbsp;</p>
        <?php if(!empty($_SESSION['M_nombre'])){
			

			
			$apellido =$_SESSION['M_apellido'];
            $nombre = $_SESSION['M_nombre'];
			$fecha = $_SESSION['M_fecha'];
			$pais =$_SESSION['M_pais'];
			$mail = $_SESSION['M_email'];
			$localidad = $_SESSION['M_localidad'];
			$estrato = $_SESSION['M_estrato'];
			$direccion = $_SESSION['M_direccion'];
			$telefono = $_SESSION['M_telefono'];
			
			$celular = $_SESSION['M_celular'];
			$nivel = $_SESSION['M_NivelEstudio'];
			$enfermedad = $_SESSION['M_Enfermedad'];
			$seguridad = $_SESSION['M_Seguridad'];

			
			$acudiente = $_SESSION['M_NomAcudiente'];
			$telAcudiente = $_SESSION['M_TelAcudiente'];
			$celuAcudiente = $_SESSION['M_TelCelular'];
			$observaciones = $_SESSION['M_Observaciones'];
			
			$_SESSION['M_nombre']=null;			
			?>
      </form>
      
      <div id="informativo1">
        <form id="formularioRegistro"  method="post" action="Logica/ModificacionesRegistro.php">
          <table width="100%" border="0">
            <tr>
              <td height="60" >&nbsp;</td>
              <td ><label>
                <h1>FORMATO DE MODIFICACI&Oacute;N&nbsp; DE DATOS</h1>
                </label></td>
              <td >&nbsp;</td>
            </tr>
          </table>
          <table width="100%" height="84" border="0">
            <tr>
              <td align="right" ><label for="TB_Apelldios"><b>APELLIDOS: </b></label></td>
              <td ><span id="sprytextfield2">
                <input type="text" name="TB_Apelldios"  id="textarea" size="50" maxlength="50" title="ESCRIBA LOS APELLIDOS" value= <?php echo $apellido ?>>
                <span class="textfieldRequiredMsg">*</span></span></td>
              <td ></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label for="TB_Nombres">NOMBRES: </label>
              </b></td>
              <td><span id="sprytextfield3">
                <input type="text" name="TB_Nombres"  id="textarea" size="50" maxlength="50"  title="ESCRIBA LOS NOMBRES" value= <?php echo $nombre ?>>
                <span class="textfieldRequiredMsg">*</span></span></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label>FECHA DE NACIMIENTO:</label>
              </b></td>
              <td>&nbsp;
                <label for="TB_Fecha"></label>
                <input type="text" name="TB_Fecha" id="TB_Fecha" value= <?php echo $fecha ?>>                &nbsp;&nbsp;
                </b>
                </td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >PA&Iacute;S DE NACIMIENTO: </label>
              </b></td>
              <td><span id="sprytextfield9">
                <label for="TB_Pais"></label>
                
                
                <?php 
                
                $Conn = conectar2();
                $sql1="SELECT * FROM pais;";
                $resultado1 = mysql_query($sql1,$Conn)or die(mysql_error());

                $sql2="SELECT * FROM `pais` WHERE `Id_Pais`='$pais';";
                $resultado2 = mysql_query($sql2,$Conn)or die(mysql_error());
                $fila2 = mysql_fetch_array($resultado2, MYSQL_NUM);
                desconectar2($Conn);
                ?>
                                
                                <?php 
                  echo "<select name='TB_Pais' id='TB_Pais'>";
                  echo "<option value='".$fila2[0]."'>".$fila2[1]."</option>";
                  while ($fila = mysql_fetch_array($resultado1, MYSQL_NUM)) 
                  {
                        echo "<option value='".$fila[0]."'>".$fila[1]."</option>";
                  }
                  echo "</select>"; 
                ?>
                

                <span class="textfieldRequiredMsg">*</span></span></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >E-MAIL: </label>
              </b></td>
              <td><input name="TB_Email" type="text" id="textarea"  size="50" maxlength="150" title="ESCRIBA UN CORREO ELECTRONICO DE CONTACTO" value= <?php echo $mail ?>></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >LOCALIDAD: </label>
              </b></td>
              <td><select name="DDL_Localidad" title="SELECCIONE LA LOCADIDAD DONDE VIVE"  >
                <option><?php echo $localidad ?></option>
                <option>Antonio Nari&ntilde;o</option>
                <option>Barrios Unidos</option>
                <option>Bosa</option>
                <option>Chapinero</option>
                <option>Ciudad Bol&iacute;var</option>
                <option>Engativ&aacute;</option>
                <option>Fontib&oacute;n</option>
                <option>Kennedy</option>
                <option>La Candelaria</option>
                <option>Los M&aacute;rtires</option>
                <option>Puente Aranda</option>
                <option>Rafael Uribe Uribe</option>
                <option>San Crist&oacute;bal</option>
                <option>Santa Fe</option>
                <option>Suba</option>
                <option>Sumapaz</option>
                <option>Teusaquillo</option>
                <option>Tunjuelito</option>
                <option>Usaqu&eacute;n</option>
                <option>Usme</option>
                <option>Otra</option>
              </select></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >ESTRATO: </label>
              </b></td>
              <td><select name="DDL_Estrato" title="SELECCIONE EL ESTRATO">
                <option><?php echo $estrato ?></option>
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
              </select></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >DIRECCI&Oacute;N DE RESIDENCIA: </label>
              </b></td>
              <td>
                <input type="text" name="TB_Direccion"  id="textarea" size="50" maxlength="150" title="ESCRIBA LA DIRECCI&Oacute;N DE RESIDENCIA" value= <?php echo "".$direccion?>>
               </td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >TEL&Eacute;FONO FIJO: </label>
              </b></td>
              <td><input name="TB_Telefono" type="text" id="textarea" size="50" maxlength="10" onkeyup="return ValNumero(this);" title="ESCRIBA EL NUMERO DE TEL&Eacute;FONO FIJO" value= <?php echo $telefono ?>></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >TEL&Eacute;FONO CELULAR:</label>
              </b></td>
              <td><input name="TB_Celular" type="text" id="textarea" size="50" maxlength="10" onkeyup="return ValNumero(this);" title="ESCRIBA EL NUMERO DE TEL&Eacute;FONO CELULAR" value=<?php echo $celular ?>></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >NIVEL DE ESTUDIOS:</label>
              </b></td>
              <td><select name="DDL_Educacion" title="SELECCIONE EL NIVEL DE EDUCACI&Oacute;N">
                <option><?php echo $nivel ?><option>
                <option>NINGUNO</option>
                <option>PRIMARIA</option>
                <option>SECUNDARIA</option>
                <option>UNIVERSITARIOS</option>
                <option>OTRO</option>
              </select></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >&iquest;SUFRE ALGUNA ENFERMEDAD?</label>
              </b></td>
              <td><select name="DDL_Enfermedad">
              <option><?php echo $enfermedad ?><option>
                <option>NO</option>
                <option>SI</option>
              </select></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>TIPO DE SEGURIDAD SOCIAL:</b></td>
              <td><span id="sprytextfield8">
                
                <?php 
                
                $Conn = conectar2();
                $sql1="SELECT * FROM `eps` WHERE 1 ORDER BY `Nombre_Eps`;";
                $resultado1 = mysql_query($sql1,$Conn)or die(mysql_error());

                $sql2="SELECT * FROM `eps` WHERE `Id_Eps`='$seguridad';";
                $resultado2 = mysql_query($sql2,$Conn)or die(mysql_error());
                $fila2 = mysql_fetch_array($resultado2, MYSQL_NUM);
                desconectar2($Conn);
                ?>
                                
                                <?php 
                  echo "<select name='TB_SeguroDescripcion' id='TB_Pais'>";
                  echo "<option value='".$fila2[0]."'>".$fila2[1]."</option>";
                  while ($fila = mysql_fetch_array($resultado1, MYSQL_NUM)) 
                  {
                        echo "<option value='".$fila[0]."'>".$fila[1]."</option>";
                  }
                  echo "</select>"; 
                ?>
                <span class="textfieldRequiredMsg">*</span></span></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"></td>
              <td align="center"><b>
                <label ><br />
                  DATOS DE PERSONA DE CONTACTO</label>
              </b></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >NOMBRE COMPLETO:</label>
              </b></td>
              <td><span id="sprytextfield5">
                <input type="text" name="TB_NomContacto"  id="textarea" size="50" maxlength="100" title="ESCRIBA EL NOMBRE COMPLETO DE LA PERSONA DE CONTACTO" value=<?php echo $acudiente ?>>
                <span class="textfieldRequiredMsg">*</span></span></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >TEL&Eacute;FONO FIJO:</label>
              </b></td>
              <td><span id="sprytextfield6">
                <input type="text" name="TB_TelContacto"  id="textarea" size="50" maxlength="10" onkeyup="return ValNumero(this);" title="ESCRIBA EL TEL&Eacute;FONO FIJO DE LA PERSONA DE CONTACTO" value=<?php echo $telAcudiente ?>>
                <span class="textfieldRequiredMsg">*</span></span></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >TEL&Eacute;FONO CELULAR </label>
              </b></td>
              <td><span id="sprytextfield7">
                <input type="text" name="TB_CelContacto" id="textarea" size="50" maxlength="10" onkeyup="return ValNumero(this);" title="ESCRIBA EL TEL&Eacute;FONO CELULAR DE LA PERSONA DE CONTACTO" value=<?php echo $celuAcudiente ?>>
                <span class="textfieldRequiredMsg">*</span></span></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"><b>
                <label >OBSERVACIONES </label>
              </b></td>
              <td><textarea name="TB_Observaciones" id="textarea" cols="20" rows="2" maxlength="500" title="AQU&Iacute; PUEDE ESCRIBIR CUALQUIER CLASE DE OBSERVACI&Oacute;N O ACLARACI&Oacute;N"  ><?php echo $observaciones ?></textarea></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td align="right"></td>
              <td align="center"><input type="submit" name="B_Registrar" id="B_Registrar" value="Modificar" class="button medium red" /></td>
              <td></td>
            </tr>
          </table>
        </form>
      </div>
      <?Php }
	  ?>
      <p><br> 
      </p>
                         <center>
						  <h1>&nbsp;</h1>
      </center>
	  <br> <br> <br> <br> <br> <br> 
    </div>    
					   
					  

</div>

</div>
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