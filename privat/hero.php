<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>

<?php
//ini_set ('error_reporting', E_ALL);
//DEFINIMOS LAS VARIABLES DE LA PELICULA
if (array_key_exists('altahero',$_POST)){
$altaOK=$_POST['altaOK'];
$titulo=addslashes($_POST['titulo']);
//echo $titulo."<br />";
$subtitulo=addslashes($_POST['subtitulo']);
//echo $subtitulo."<br />";
$categoria=addslashes($_POST['categoria']);
//echo $categoria."<br />";
$copybutton=addslashes($_POST['copybutton']);
//echo $copybutton."<br />";
$url=addslashes($_POST['url']);
//echo $url."<br />";
$herobig=addslashes($_POST['herobig']);
//echo $herobig."<br />";
$heromedium=addslashes($_POST['heromedium']);
//echo $heromedium."<br />";
$herosmall=addslashes($_POST['herosmall']);
//echo $herosmall."<br />";

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
$previa="SELECT id FROM hero";
$previaResultado=mysql_query($previa) or die(mysql_error());
$previaPintar=mysql_fetch_array($previaResultado);
$previaTotal=mysql_num_rows($previaResultado);
//echo "Mi previaTotal: ".$previaTotal;

  if($previaTotal > 0){
    $id=addslashes($previaPintar['id']);
    mysql_select_db($database_almasonline, $almasonline);
    $sqleditar1="UPDATE hero SET id='$id', titulo='$titulo', subtitulo='$subtitulo', categoria='$categoria', copybutton='$copybutton', url='$url', herobig='$subidoherobig',heromedium='$subidoheromedium', herosmall='$subidoherosmall' WHERE id='$id'";
    $resulteditar1=mysql_query($sqleditar1) or die(mysql_error());

  }else {
    mysql_select_db($database_almasonline, $almasonline);
    $sqlinsert="INSERT INTO hero(id,titulo,subtitulo,categoria,copybutton,url,herobig,heromedium,herosmall) VALUES('','$titulo','$subtitulo','$categoria','$copybutton','$url','$subidoherobig','$subidoheromedium','$subidoherosmall')";
    $resultinsert=mysql_query($sqlinsert) or die(mysql_error());
    $ultimoId=mysql_insert_id();
  }
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
<p><label>Hero Big:</label>
<input name="herobig" type="file" id="herobig" size="25" maxlength=""></p>
<p><label>Hero Medium:</label>
<input name="heromedium" type="file" id="heromedium" size="25" maxlength=""></p>
<p><label>Hero Small:</label>
<input name="herosmall" type="file" id="herosmall" size="25" maxlength=""></p>

    <input name="altaOK" type="hidden" value="true" />
<p><input name="altahero" type="submit" id="altahero" value="Dar de alta el Hero"></p>
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>