<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>
<?php 

/* //echo "¿Tenemos idioma?: ".$_SESSION['idioma']."<br />";
//echo "¿Tenemos idsec?: ".$_GET['idsec']."<br />"; */

mysql_select_db($database_almasonline, $almasonline);
$producto="SELECT * FROM pelis WHERE novedades='".si."' ORDER BY titulo ASC";
$resultproducto=mysql_query($producto) or die(mysql_error());
$rowproducto=mysql_fetch_array($resultproducto);
//$totalproducto=mysql_num_rows($resultproducto);

$posicion="SELECT idpos, titulo FROM posicionn ORDER BY idpos ASC";
$resultposicion=mysql_query($posicion) or die(mysql_error());
$rowposicion=mysql_fetch_array($resultposicion);

if (isset($_POST['editar'])){
$pos1=$_POST['pos1'];
//echo "pos. ".$pos1."<br />";
$pos2=$_POST['pos2'];
//echo $pos2."<br />";
$pos3=$_POST['pos3'];
//echo $pos3."<br />";
$pos4=$_POST['pos4'];
//echo $pos4."<br />";
$pos5=$_POST['pos5'];
//echo $pos4."<br />";

/* //////////////////////////////////////////////////////////////////////////////////////////
ACTUALIZAMOS LA POSICIÓN NÚMERO 1
///////////////////////////////////////////////////////////////////////////////////////////// */
if (isset($pos1) && !empty($pos1)){

mysql_select_db($database_almasonline, $almasonline);
$producto1="SELECT idpeli, titulo, precio, imgnovedades, linkfilmin FROM pelis WHERE idpeli='".$pos1."'";
$resultproducto1=mysql_query($producto1) or die(mysql_error());
$rowproducto1=mysql_fetch_array($resultproducto1);

$idpeli=addslashes($rowproducto1['idpeli']);
//echo $idpeli."<br>";
$titulo=addslashes($rowproducto1['titulo']);
//echo $titulo."<br>";
$precio=addslashes($rowproducto1['precio']);
//echo $precio."<br>";
$imgnovedades=addslashes($rowproducto1['imgnovedades']);
//echo $imggrande."<br>";
$linkfilmin=addslashes($rowproducto1['linkfilmin']);
//echo $linkfilmin."<br>";

$comprobar="SELECT idpeli, titulo FROM posicionn WHERE idpos=1";
$resultcomprobar=mysql_query($comprobar) or die(mysql_error());
$rowcomprobar=mysql_fetch_array($resultcomprobar);
$totalcomprobar=mysql_num_rows($resultcomprobar);
//echo $totalcomprobar."editar o insertar<br>";

if ($totalcomprobar>0){
echo "EDITAMOS<br>";
$sqleditar1="UPDATE posicionn SET idpeli='$idpeli', titulo='$titulo', precio='$precio', imgnovedades='$imgnovedades', linkfilmin='$linkfilmin' WHERE idpos=1";
$resulteditar1=mysql_query($sqleditar1) or die(mysql_error());
}else{
	echo "INSERTAMOS<br>";
$sqlinsert1="INSERT INTO posicionn(idpos,idpeli,titulo,precio,imgnovedades,linkfilmin) VALUES('1','$idpeli','$titulo','$precio','$imgnovedades','$linkfilmin')";
$resultinsert1=mysql_query($sqlinsert1) or die(mysql_error());
	}//final else totalcomprobar
}//final modificación posición 1
/* //////////////////////////////////////////////////////////////////////////////////////////
FIN POSICIÓN NÚMERO 1
///////////////////////////////////////////////////////////////////////////////////////////// */

/* //////////////////////////////////////////////////////////////////////////////////////////
ACTUALIZAMOS LA POSICIÓN NÚMERO 2
///////////////////////////////////////////////////////////////////////////////////////////// */
if (isset($pos2) && !empty($pos2)){

mysql_select_db($database_almasonline, $almasonline);
$producto1="SELECT idpeli, titulo, precio, imgnovedades, linkfilmin FROM pelis WHERE idpeli='".$pos2."'";
$resultproducto1=mysql_query($producto1) or die(mysql_error());
$rowproducto1=mysql_fetch_array($resultproducto1);

$idpeli=addslashes($rowproducto1['idpeli']);
//echo $idpeli."<br>";
$titulo=addslashes($rowproducto1['titulo']);
//echo $titulo."<br>";
$precio=addslashes($rowproducto1['precio']);
//echo $precio."<br>";
$imgnovedades=addslashes($rowproducto1['imgnovedades']);
//echo $imggrande."<br>";
$linkfilmin=addslashes($rowproducto1['linkfilmin']);
//echo $linkfilmin."<br>";

$comprobar2="SELECT idpeli, titulo FROM posicionn WHERE idpos=2";
$resultcomprobar2=mysql_query($comprobar2) or die(mysql_error());
$rowcomprobar2=mysql_fetch_array($resultcomprobar2);
$totalcomprobar2=mysql_num_rows($resultcomprobar2);
//echo $totalcomprobar."editar o insertar<br>";

if ($totalcomprobar2>0){
//echo "EDITAMOS<br>";
$sqleditar2="UPDATE posicionn SET idpeli='$idpeli', titulo='$titulo', precio='$precio', imgnovedades='$imgnovedades', linkfilmin='$linkfilmin' WHERE idpos=2";
$resulteditar2=mysql_query($sqleditar2) or die(mysql_error());
}else{
	//echo "INSERTAMOS<br>";
$sqlinsert2="INSERT INTO posicionn(idpos,idpeli,titulo,precio,imgnovedades,linkfilmin) VALUES('2','$idpeli','$titulo','$precio','$imgnovedades','$linkfilmin')";
$resultinsert2=mysql_query($sqlinsert2) or die(mysql_error());
	}//final else totalcomprobar
}//final modificación posición 1
/* //////////////////////////////////////////////////////////////////////////////////////////
FIN POSICIÓN NÚMERO 2
///////////////////////////////////////////////////////////////////////////////////////////// */

/* //////////////////////////////////////////////////////////////////////////////////////////
ACTUALIZAMOS LA POSICIÓN NÚMERO 3
///////////////////////////////////////////////////////////////////////////////////////////// */
if (isset($pos3) && !empty($pos3)){

mysql_select_db($database_almasonline, $almasonline);
$producto1="SELECT idpeli, titulo, precio, imgnovedades, linkfilmin FROM pelis WHERE idpeli='".$pos3."'";
$resultproducto1=mysql_query($producto1) or die(mysql_error());
$rowproducto1=mysql_fetch_array($resultproducto1);

$idpeli=addslashes($rowproducto1['idpeli']);
//echo $idpeli."<br>";
$titulo=addslashes($rowproducto1['titulo']);
//echo $titulo."<br>";
$precio=addslashes($rowproducto1['precio']);
//echo $precio."<br>";
$imgnovedades=addslashes($rowproducto1['imgnovedades']);
//echo $imggrande."<br>";
$linkfilmin=addslashes($rowproducto1['linkfilmin']);
//echo $linkfilmin."<br>";

$comprobar3="SELECT idpeli, titulo FROM posicionn WHERE idpos=3";
$resultcomprobar3=mysql_query($comprobar3) or die(mysql_error());
$rowcomprobar3=mysql_fetch_array($resultcomprobar3);
$totalcomprobar3=mysql_num_rows($resultcomprobar3);
//echo $totalcomprobar."editar o insertar<br>";

if ($totalcomprobar3>0){
//echo "EDITAMOS<br>";
$sqleditar3="UPDATE posicionn SET idpeli='$idpeli', titulo='$titulo', precio='$precio', imgnovedades='$imgnovedades', linkfilmin='$linkfilmin' WHERE idpos=3";
$resulteditar3=mysql_query($sqleditar3) or die(mysql_error());
}else{
	//echo "INSERTAMOS<br>";
$sqlinsert3="INSERT INTO posicionn(idpos,idpeli,titulo,precio,imgnovedades,linkfilmin) VALUES('3','$idpeli','$titulo','$precio','$imgnovedades','$linkfilmin')";
$resultinsert3=mysql_query($sqlinsert3) or die(mysql_error());
	}//final else totalcomprobar
}//final modificación posición 1
/* //////////////////////////////////////////////////////////////////////////////////////////
FIN POSICIÓN NÚMERO 3
///////////////////////////////////////////////////////////////////////////////////////////// */

/* //////////////////////////////////////////////////////////////////////////////////////////
ACTUALIZAMOS LA POSICIÓN NÚMERO 4
///////////////////////////////////////////////////////////////////////////////////////////// */
if (isset($pos4) && !empty($pos4)){

mysql_select_db($database_almasonline, $almasonline);
$producto1="SELECT idpeli, titulo, precio, imgnovedades, linkfilmin FROM pelis WHERE idpeli='".$pos4."'";
$resultproducto1=mysql_query($producto1) or die(mysql_error());
$rowproducto1=mysql_fetch_array($resultproducto1);

$idpeli=addslashes($rowproducto1['idpeli']);
//echo $idpeli."<br>";
$titulo=addslashes($rowproducto1['titulo']);
//echo $titulo."<br>";
$precio=addslashes($rowproducto1['precio']);
//echo $precio."<br>";
$imgnovedades=addslashes($rowproducto1['imgnovedades']);
//echo $imggrande."<br>";
$linkfilmin=addslashes($rowproducto1['linkfilmin']);
//echo $linkfilmin."<br>";

$comprobar4="SELECT idpeli, titulo FROM posicionn WHERE idpos=4";
$resultcomprobar4=mysql_query($comprobar4) or die(mysql_error());
$rowcomprobar4=mysql_fetch_array($resultcomprobar4);
$totalcomprobar4=mysql_num_rows($resultcomprobar4);
//echo $totalcomprobar."editar o insertar<br>";

if ($totalcomprobar4>0){
//echo "EDITAMOS<br>";
$sqleditar4="UPDATE posicionn SET idpeli='$idpeli', titulo='$titulo', precio='$precio', imgnovedades='$imgnovedades', linkfilmin='$linkfilmin' WHERE idpos=4";
$resulteditar4=mysql_query($sqleditar4) or die(mysql_error());
}else{
	//echo "INSERTAMOS<br>";
$sqlinsert4="INSERT INTO posicionn(idpos,idpeli,titulo,precio,imgnovedades,linkfilmin) VALUES('4','$idpeli','$titulo','$precio','$imgnovedades','$linkfilmin')";
$resultinsert4=mysql_query($sqlinsert4) or die(mysql_error());
	}//final else totalcomprobar
}//final modificación posición 1
/* //////////////////////////////////////////////////////////////////////////////////////////
FIN POSICIÓN NÚMERO 4
///////////////////////////////////////////////////////////////////////////////////////////// */

/* //////////////////////////////////////////////////////////////////////////////////////////
ACTUALIZAMOS LA POSICIÓN NÚMERO 5
///////////////////////////////////////////////////////////////////////////////////////////// */
if (isset($pos5) && !empty($pos5)){

mysql_select_db($database_almasonline, $almasonline);
$producto1="SELECT idpeli, titulo, precio, imgnovedades, linkfilmin FROM pelis WHERE idpeli='".$pos5."'";
$resultproducto1=mysql_query($producto1) or die(mysql_error());
$rowproducto1=mysql_fetch_array($resultproducto1);

$idpeli=addslashes($rowproducto1['idpeli']);
//echo $idpeli."<br>";
$titulo=addslashes($rowproducto1['titulo']);
//echo $titulo."<br>";
$precio=addslashes($rowproducto1['precio']);
//echo $precio."<br>";
$imgnovedades=addslashes($rowproducto1['imgnovedades']);
//echo $imggrande."<br>";
$linkfilmin=addslashes($rowproducto1['linkfilmin']);
//echo $linkfilmin."<br>";

$comprobar5="SELECT idpeli, titulo FROM posicionn WHERE idpos=5";
$resultcomprobar5=mysql_query($comprobar5) or die(mysql_error());
$rowcomprobar5=mysql_fetch_array($resultcomprobar5);
$totalcomprobar5=mysql_num_rows($resultcomprobar5);
//echo $totalcomprobar."editar o insertar<br>";

if ($totalcomprobar5>0){
//echo "EDITAMOS<br>";
$sqleditar5="UPDATE posicionn SET idpeli='$idpeli', titulo='$titulo', precio='$precio', imgnovedades='$imgnovedades', linkfilmin='$linkfilmin' WHERE idpos=5";
$resulteditar5=mysql_query($sqleditar5) or die(mysql_error());
}else{
	//echo "INSERTAMOS<br>";
$sqlinsert5="INSERT INTO posicionn(idpos,idpeli,titulo,precio,imgnovedades,linkfilmin) VALUES('5','$idpeli','$titulo','$precio','$imgnovedades','$linkfilmin')";
$resultinsert5=mysql_query($sqlinsert5) or die(mysql_error());
	}//final else totalcomprobar
}//final modificación posición 1
/* //////////////////////////////////////////////////////////////////////////////////////////
FIN POSICIÓN NÚMERO 5
///////////////////////////////////////////////////////////////////////////////////////////// */


}//FIN editar
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Novedades</title>
</head>

<body>
<?php 
if (isset($resulteditar1) || isset($resulteditar2) || isset($resulteditar3) || isset($resulteditar4) || isset($resultinsert1) || isset($resultinsert2) || isset($resultinsert3) ||  isset($resultinsert4)){
echo "<p>Las novedades ".$_POST['titulo']." se han modificado con éxito.</p>";
include("includes/enlaces.php");
echo "</body>";
echo "</html>";
exit();
}
?>
<p>Editar Novedades:</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="alta" id="alta">
<?php for ( $i = 1 ; $i <= 5 ; $i ++) {
mysql_select_db($database_almasonline, $almasonline);
$precomprobar="SELECT titulo FROM posicionn WHERE idpos='".$i."'";
$preresultcomprobar=mysql_query($precomprobar) or die(mysql_error());
$prerowcomprobar=mysql_fetch_array($preresultcomprobar);
$pretotalcomprobar=mysql_num_rows($preresultcomprobar);?>
<p><label><strong>POSICIÓN <?php echo $i ?>:</strong></label><br />
<?php if ($pretotalcomprobar>0){ ?>Actualmente, en la posición <?php echo $i ?> tenemos a: <strong><?php echo stripslashes($prerowcomprobar['titulo']); ?></strong></p> <?php }?>
<select name="pos<?php echo $i ?>">
<option value=""></option>
  <?php do{?>
  <option value="<?php echo addslashes($rowproducto['idpeli']); ?>"><?php echo addslashes($rowproducto['titulo']); ?></option>
  <?php
		}while($rowproducto=mysql_fetch_array($resultproducto));
        ?>
        <?php 
		mysql_data_seek($resultproducto, 0);
		$rowproducto=mysql_fetch_array($resultproducto);
		?> 
</select>
</p>
<?php }?>
<input name="altaOK" type="hidden" value="true" />
<p><input name="editar" type="submit" id="altagenero" value="Editar Novedades"></p>
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>
