<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>

<?php
//ini_set ('error_reporting', E_ALL);
//DEFINIMOS LAS VARIABLES DE LA PELICULA
if (array_key_exists('altapelicula',$_POST)){
$altaOK=$_POST['altaOK'];
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
$ano=addslashes($_POST['ano']);
//echo $ano."<br />";
$duracion=addslashes($_POST['duracion']);
//echo $duracion."<br />";
$director=addslashes($_POST['director']);
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
//echo $audio."<br />";
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



//EMPEZAMOS A DAR DE ALTA LAS IMÁGENES
define('MAX_FILE_SIZE',800000000);
//Convierto el MAX_FILE_SIZE en kb
$maximo=number_format(MAX_FILE_SIZE/1024).' KB';
//Primero empiezo con la imagen grande
include("includes/subir_hero_big.php");
//echo $subidoimggrande."<br />".$resultadoimagen."<br />tumb";
include("includes/subir_hero_medium.php");
//echo $subidoimgtumb."<br />".$resultadoimagen."<br />tumb";
include("includes/subir_hero_small.php");
//echo $subidoimgposter."<br />".$resultadoimagen."<br />poster";

//echo $subidoimgnovedades."<br />".$resultadoimagen."<br />parrilla";
mysql_select_db($database_almasonline, $almasonline);
$sqlinsert="INSERT INTO pelis(idpeli,activo,titulo,ano,nacionalidad,duracion,director,precio,genero1,genero2,frase1,frase2,imggrande,imgtumb,imgposter,imgnovedades,imgparrilla,linkalmas,linkextra1,linkextra2,linkfilmin,urlextra,argumento,audio,carrusel,novedades,trailer,fecha) VALUES('','$activo','$titulo','$ano','$nacionalidad','$duracion','$director','$precio','$genero1','$genero2','$frase1','$frase2','$subidoimggrande','$subidoimgtumb','$subidoimgposter','$subidoimgnovedades','$subidoimgparrilla','$linkalmas','$linkextra1','$linkextra2','$linkfilmin','$urlextra','$argumento','$audio','$carrusel','$novedades','$trailer','$fecha')";
$resultinsert=mysql_query($sqlinsert) or die(mysql_error());
$ultimoId=mysql_insert_id();


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<title>Alta imágenes película</title>
</head>

<body>
<?php if  ($resultinsert){
echo "<p>La película se ha dado de alta con éxito.</p>";
include("includes/enlaces.php");
echo "</body>";
echo "</html>";
exit();
}
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="alta" id="alta">
<p>Alta del HERO:</p>

<p><label>Título:</label>
<input name="titulo" type="text" id="titulo" size="25" maxlength=""></p>
<p><label>Subtitulo:</label>
<input name="subtitulo" type="text" id="subtitulo" size="25" maxlength=""></p>
<p><label>Categoria:</label>
<select name="categoria">
  <option value="VOD">VOD</option>
  <option value="libros">Libros</option>
  <option value="relatos">Relatos</option>
  <option value="noticias">Noticias</option>
  <option value="reseñas">Reseñas</option>
</select>
<p><label>Copy del botón:</label>
<select name="copybutton">
  <option value="Seguir leyendo">Seguir leyendo</option>
  <option value="Ver película">Ver película</option>
</select>
<p><label>URL:</label>
<input name="url" type="text" id="url" size="25" maxlength=""></p>

<p><strong>ALTA DE IMÁGENES HERO</strong></p>
<p>
  Estos són los tamaños de las distintas versiones del hero:
  <ul>
    <li>hero_big: 1400 x 758 px</li>
    <li>hero_medium: 800 x 433 px</li>
    <li>hero_small: 480 x 260 px</li>
  </ul>
</p>
<em>Tan solo dar de alta estas imágenes si la película va en el carrusel de la página de inicio.</em></p>
<p><label>Imagen grande del carrusel (960px X 400px):</label>
<input name="imggrande" type="file" id="imggrande" size="25" maxlength=""></p>
<p><label>Imagen tumb carrusel (150px X 59px):</label>
<input name="imgtumb" type="file" id="imgtumb" size="25" maxlength=""></p>
<p><label>Imagen poster carrusel (60px X 88px):</label>
<input name="imgposter" type="file" id="imgposter" size="25" maxlength=""></p>
<p><strong>ALTA DE IMÁGENES NOVEDADES</strong><br /><em>Tan solo dar de alta estas imágenes si la película va en la sección de Novedades de la Home.</em></p>
<p><label>Imagen Novedades (116px X 170px):</label>
<input name="imgnovedades" type="file" id="imgnovedades" size="25" maxlength=""></p>
<p><strong>ALTA DE IMÁGENES PARRILLA</strong><br /><em>Siempre dar de alta.</em></p>
<p><label>Imagen Parrilla (250px X 142px):</label>
<input name="imgparrilla" type="file" id="imgparrilla" size="25" maxlength=""></p>
<p><label>URL extra para Imagen Extra:</label>
<input name="urlextra" type="text" id="urlextra" size="25" maxlength=""></p>
<p><strong>ALTA TRAILER</strong></p>
<p><label>Copiar código embed:</label>
<input name="trailer" type="text" id="trailer" size="25" maxlength=""></p>
<p><strong>FECHA DE ALTA</strong></p>
<p><label>Fecha de alta:</label>
<input type="text" id="calendar" name="calendar" />
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
    <input name="altaOK" type="hidden" value="true" />
<p><input name="altapelicula" type="submit" id="altapelicula" value="Dar de alta la pelicula"></p>
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>