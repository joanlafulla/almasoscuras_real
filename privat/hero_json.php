<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>

<?php
//ini_set ('error_reporting', E_ALL);
//DEFINIMOS LAS VARIABLES DE LA PELICULA
if (array_key_exists('altahero',$_POST)){
$altaOK=$_POST['altaOK'];

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

$titulo=$_POST['titulo'];
//echo $titulo."<br />";
$subtitulo=addslashes($_POST['subtitulo']);
//echo $subtitulo."<br />";
$categoria=addslashes($_POST['categoria']);
//echo $categoria."<br />";
$copybutton=addslashes($_POST['copybutton']);
//echo $copybutton."<br />";
$url=addslashes($_POST['url']);
//echo $url."<br />";
$img_big=$final_name_big;
$img_medium=$final_name_medium;
$img_small=$final_name_small;
echo "img big: ".$img_big."<br />";
//echo "img medium: ".$_FILES['heromedium']['name']."<br />";
//echo "img small: ".$_FILES['herosmall']['name']."<br />";
$file="../hero.json";
$data = json_decode(file_get_contents($file), true);
$newdata = array('titulo'=>$titulo, 'subtitulo' => $subtitulo, 'categoria'=>$categoria,'copybutton'=>$copybutton, 'url'=>$url, 'img_big' =>$img_big, 'img_medium' =>$img_medium, 'img_small' =>$img_small);
$datafile= $newdata;
//print_r($data);
file_put_contents($file, json_encode($datafile));
$data = json_decode(file_get_contents($file));
  //echo "ahí va2...";
  //print_r($data);


//$herobig=addslashes($_POST['herobig']);
//$heromedium=addslashes($_POST['heromedium']);
//$herosmall=addslashes($_POST['herosmall']);

} else {
  $file="../hero.json";
  $data = json_decode(file_get_contents($file));
  //echo "ahí va...";
  //print_r($data);
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
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="alta" id="alta">
<p>Alta del HERO:</p>

<p><label>Título:</label>
<input name="titulo" type="text" id="titulo" size="25" maxlength="" value="<?php echo $data->titulo ?>"></p>
<p><label>Subtitulo:</label>
<input name="subtitulo" type="text" id="subtitulo" size="25" maxlength="" value="<?php echo $data->subtitulo ?>"></p>
<p>Categoría actual: <?php echo $data->categoria ?></p>
<p><label>Categoria:</label>
<select name="categoria">
  <option value="VOD">VOD</option>
  <option value="libros">Libros</option>
  <option value="relatos">Relatos</option>
  <option value="noticias">Noticias</option>
  <option value="criticas">Reseñas</option>
  <option value="videojuegos">Videojuegos</option>
</select>
<p><label>Copy del botón:</label>
<input name="copybutton" type="text" id="copybutton" size="25" maxlength="" value="<?php echo $data->copybutton ?>">
<p><label>URL:</label>
<input name="url" type="text" id="url" size="25" maxlength="" value="<?php echo $data->url ?>"></p>

<p><strong>ALTA DE IMÁGENES HERO</strong></p>
<p>
  Estos són los tamaños de las distintas versiones del hero:
  <ul>
    <li>hero_big: 1200 x 650 px</li>
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