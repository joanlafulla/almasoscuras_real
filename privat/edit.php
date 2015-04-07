<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>
<?php include("includes/zpcal.php"); ?>
<?php 
if (isset($_GET['idpeli'])){
/* echo "¿Tenemos idioma?: ".$_SESSION['idioma']."<br />";
echo "¿Tenemos idsec?: ".$_GET['idsec']."<br />"; */
$idpeli=$_GET['idpeli'];
mysql_select_db($database_almasonline, $almasonline);
$producto="SELECT * FROM pelis WHERE idpeli='".$idpeli."'";
$resultproducto=mysql_query($producto) or die(mysql_error());
$rowproducto=mysql_fetch_array($resultproducto);
$totalproducto=mysql_num_rows($resultproducto);
$gener1=$rowproducto['genero1'];
//echo $gener1."<br />";
$gener2=$rowproducto['genero2'];
//echo $gener2."<br />";
$frar1=$rowproducto['frase1'];
echo $frar1."<br />";
$frar2=$rowproducto['frase2'];
echo $frar2."<br />";
}
if (isset($_POST['editar'])){
	$idpeli=$_POST['idpeli'];
	//echo $idpeli."<br />";
	$activo=addslashes($_POST['activo']);
//echo $activo."<br />";
$carrusel=addslashes($_POST['carrusel']);
//echo $carrusel."<br />";
$novedades=addslashes($_POST['novedades']);
//echo $novedades."<br />";
$titulo=addslashes($_POST['titulo']);
//echo $titulo."<br />";
$nacionalidad=addslashes($_POST['nacionalidad']);
//echo $nacionalidad."<br />";
$internacional=addslashes($_POST['internacional']);
//echo $internacioanl."<br />";
$ano=addslashes($_POST['ano']);
//echo $ano."<br />";
$director=addslashes($_POST['director']);
//echo $director."<br />";
$duracion=addslashes($_POST['duracion']);
//echo $duracion."<br />";
$precio=addslashes($_POST['precio']);
//echo $precio."<br />";
$genero1=addslashes($_POST['genero1']);
//echo $genero1."<br />";
$genero2=addslashes($_POST['genero2']);
//echo $genero2."<br />";

$frase1=addslashes($_POST['frase1']);
//echo $frase1."<br />";
$frase2=addslashes($_POST['frase2']);
//echo $frase2."<br />";


$argumento=addslashes($_POST['argumento']);
//echo $argumento."<br />";
$audio=addslashes($_POST['audio']);
echo $audio."<br />";
$linkalmas=addslashes($_POST['linkalmas']);
//echo $linkalmas."<br />";
$linkextra1=addslashes($_POST['linkextra1']);
//echo $linkextra1."<br />";
$linkextra2=addslashes($_POST['linkextra2']);
//echo $linkextra2."<br />";
$linkfilmin=addslashes($_POST['linkfilmin']);
//echo $linkfilmin."<br />";
$urlextra=addslashes($_POST['urlextra']);
//echo $urlextra."<br />";

	$trailer=addslashes($_POST['trailer']);

//echo $trailer."<br />";
$fecha=$_POST['calendar'];
//echo $fecha."<br />";
mysql_select_db($database_almasonline, $almasonline);
$sqleditar="UPDATE pelis SET idpeli='$idpeli',activo='$activo',titulo='$titulo', ano='$ano', nacionalidad='$nacionalidad', internacional='$internacional', duracion='$duracion', director='$director', precio='$precio', genero1='$genero1', genero2='$genero2', frase1='$frase1', frase2='$frase2', linkalmas='$linkalmas', linkextra1='$linkextra1', linkextra2='$linkextra2', linkfilmin='$linkfilmin', urlextra='$urlextra', argumento='$argumento', audio='$audio', carrusel='$carrusel', novedades='$novedades',trailer='$trailer', fecha='$fecha'  WHERE idpeli='".$idpeli."'";
$resulteditar=mysql_query($sqleditar) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Película</title>
</head>

<body>
<?php 
if (isset($resulteditar)){
echo "<p>La película ".$_POST['titulo']." se ha editado con éxito.</p>";
include("includes/enlaces.php");
echo "</body>";
echo "</html>";
exit();
}
?>
<p>Editar datos de la película:</p>
<p><strong>DEFINIR SI LA PELÍCULA IRÁ EL CARRUSEL Y LA SECCIÓN NOVEDADES DE LA HOME</strong></p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="alta" id="alta">
<p><label>¿Está activa?:</label><br />
  <label>
    <input name="activo" type="radio" id="" value="si" <?php if($rowproducto['activo']=='si'){; ?>checked="checked"<?php }?> />
    Si</label>
  <br />
  <label>
    <input type="radio" name="activo" value="no" id="" <?php if($rowproducto['activo']=='no'){; ?>checked="checked"<?php }?> />
    No</label>
</p>
<p><label>¿Irá al carrusel?:</label><br />
  <label>
    <input name="carrusel" type="radio" id="carrusel_1" value="no" <?php if($rowproducto['carrusel']=='no'){; ?>checked="checked"<?php }?> />
    No</label>
  <br />
  <label>
    <input type="radio" name="carrusel" value="si" id="carrusel_0" <?php if($rowproducto['carrusel']=='si'){; ?>checked="checked"<?php }?> />
    Si</label>
</p>
<p><label>¿Irá a la sección de novedades?:</label><br />
  <label>
    <input name="novedades" type="radio" id="novedades_1" value="no" <?php if($rowproducto['novedades']=='no'){; ?>checked="checked"<?php }?> />
    No</label>
  <br />
  <label>
    <input type="radio" name="novedades" value="si" id="novedades_0" <?php if($rowproducto['novedades']=='si'){; ?>checked="checked"<?php }?> />
    Si</label>
</p>

<p><strong>DATOS DE LA PELÍCULA</strong></p>
<p><label>Título de la película:</label>
<input name="titulo" type="text" id="titulo" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['titulo']);?>"></p>
<p><label>Director:</label>
<input name="director" type="text" id="director" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['director']);?>"></p>
<p><label>Nacionalidad:</label>
<input name="nacionalidad" type="text" id="nacionalidad" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['nacionalidad']);?>"></p>
<p><label>¿Se verá en todo el mundo?:</label><br  />
<label>
    <input name="internacional" type="radio" id="internacional_1" value="no" <?php if($rowproducto['internacional']=='no'){; ?>checked="checked"<?php }?> />
    No</label>
  <br />
  <label>
    <input type="radio" name="internacional" value="si" id="internacional_0" <?php if($rowproducto['internacional']=='si'){; ?>checked="checked"<?php }?> />
    Si</label>
</p>
<p><label>Año de producción:</label>
<input name="ano" type="text" id="ano" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['ano']);?>"></p>
<p><label>Duración:</label>
<input name="duracion" type="text" id="duracion" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['duracion']);?>"></p>
<p><label>Precio (p.ej 1.95):</label>
<input name="precio" type="text" id="precio" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['precio']);?>"></p>
<?php mysql_select_db($database_almasonline, $almasonline);
$gen="SELECT * FROM generos";
$resultgen=mysql_query($gen) or die(mysql_error());
$rowgen=mysql_fetch_array($resultgen);
$totalgen=mysql_num_rows($resultgen);
//echo $totalgen."<br />";
?>
<p><label>Género 1:</label><br />
<select name="genero1">
<?php 
  do{
  ?>
  <option value="<?php echo stripslashes($rowgen['genero']); ?>"><?php echo stripslashes($rowgen['genero']); ?></option>
   <?php 
	}while($rowgen=mysql_fetch_array($resultgen));
	?>
</select>
</p>
<?php mysql_select_db($database_almasonline, $almasonline);
$gen2="SELECT * FROM generos";
$resultgen2=mysql_query($gen2) or die(mysql_error());
$rowgen2=mysql_fetch_array($resultgen2);
$totalgen2=mysql_num_rows($resultgen2);
//echo $totalgen."<br />";
?>
<p><label>Género 2:</label><br />
<select name="genero2">
<?php 
  do{
  ?>
  <option value="<?php echo stripslashes($rowgen2['genero']); ?>"><?php echo stripslashes($rowgen2['genero']); ?></option>
   <?php 
	}while($rowgen2=mysql_fetch_array($resultgen2));
	?>
</select>
</p>



<?php mysql_select_db($database_almasonline, $almasonline);
$fr="SELECT * FROM frases";
$resultfr=mysql_query($fr) or die(mysql_error());
$rowfr=mysql_fetch_array($resultfr);
$totalfr=mysql_num_rows($resultfr);
//echo $totalgen."<br />";
?>
<p><label>Frase 1:</label><br />
<select name="frase1">
<?php 
  do{
  ?>
  <option value="<?php echo stripslashes($rowfr['frase']); ?> "><?php echo stripslashes($rowfr['frase']); ?></option>
   <?php 
	}while($rowfr=mysql_fetch_array($resultfr));
	?>
</select>
</p>
<?php mysql_select_db($database_almasonline, $almasonline);
$fr2="SELECT * FROM frases";
$resultfr2=mysql_query($fr2) or die(mysql_error());
$rowfr2=mysql_fetch_array($resultfr2);
$totalfr2=mysql_num_rows($resultfr2);
//echo $totalgen."<br />";
?>
<p><label>Frase 2:</label><br />
<select name="frase2">
<?php 
  do{
  ?>
  <option value="<?php echo stripslashes($rowfr2['frase']); ?>"><?php echo stripslashes($rowfr2['frase']); ?></option>
   <?php 
	}while($rowfr2=mysql_fetch_array($resultfr2));
	?>
</select>
</p>




<p><label>Argumento:</label><br />
<textarea name="argumento" cols="50" rows="15" ><?php echo stripslashes($rowproducto['argumento']);?></textarea></p>
<p><label>Audio (VOSE o VO):</label><br />
<input name="audio" type="text" id="precio" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['audio']);?>"></p>
<p><label>Link Almas Oscuras (reseña en Almas):</label>
<input name="linkalmas" type="text" id="linkalmas" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['linkalmas']);?>"></p>
<p><label>Link Extra 1 (p.ej noticia):</label>
<input name="linkextra1" type="text" id="linkextra1" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['linkextra1']);?>"></p>
<p><label>Link Extra 2 (p.ej entrevista):</label>
<input name="linkextra2" type="text" id="linkextra2" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['linkextra2']);?>"></p>
<p><label>Link Filmin:</label>
<input name="linkfilmin" type="text" id="linkfilmin" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['linkfilmin']);?>"></p>
<p><label>Trailer:<br />
Vuelve a copiar el código embed del trailer</label><br /></p>
<p><input name="trailer" type="text" id="trailer" size="75" value=""></p>
<p>Aquí tienes el trailer actual:<br />
<?php echo stripslashes($rowproducto['trailer']);?>
</p>
<p><label>URL extra para Imagen Extra:</label>
<input name="urlextra" type="text" id="urlextra" size="25" maxlength="" value="<?php echo stripslashes($rowproducto['urlextra']);?>"></p>
<p><strong>FECHA DE ALTA</strong></p>
<p><label>Fecha de alta:</label>
<input type="text" id="calendar" name="calendar"  value="<?php echo stripslashes($rowproducto['fecha']);?>"/>
    <button id="trigger">...</button>
    <script type="text/javascript">//<![CDATA[
      Zapatec.Calendar.setup({
        firstDay          : 1,
        weekNumbers       : false,
        electric          : false,
        inputField        : "calendar",
        button            : "trigger",
        ifFormat          : "%Y-%m-%d",
        daFormat          : "%Y/%m/%d"
      });
    //]]></script>
    </p>
    <input name="editar" type="hidden" value="true" />
    <input name="idpeli" type="hidden" value="<?php echo $idpeli; ?>" />
<p><input name="altapeli" type="submit" id="altapelicula" value="Editar Película"></p>
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>
