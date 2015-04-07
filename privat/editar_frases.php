<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>
<?php 

if (isset($_GET['idfrase'])){
/* echo "¿Tenemos idioma?: ".$_SESSION['idioma']."<br />";
echo "¿Tenemos idsec?: ".$_GET['idsec']."<br />"; */
$idfrase=$_GET['idfrase'];

mysql_select_db($database_almasonline, $almasonline);
$producto="SELECT * FROM frases WHERE idfrase='".$idfrase."'"; 
$resultproducto=mysql_query($producto) or die(mysql_error());
$rowproducto=mysql_fetch_array($resultproducto);
$totalproducto=mysql_num_rows($resultproducto);
}
if (isset($_POST['editar'])){
$idfrase=$_POST['idfrase'];
echo $idfrase."<br />";
$frase=addslashes($_POST['frase']);
echo $frase."<br />";
//echo "id a borrar ".$idsec."<br />";
mysql_select_db($database_almasonline, $almasonline);
$sqleditar="UPDATE frases SET frase='$frase' WHERE idfrase='".$idfrase."'";
$resulteditar=mysql_query($sqleditar) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Frasecitas</title>
</head>

<body>
<?php 
if (isset($resulteditar)){
echo "<p>La frasecita ".$_POST['frase']." se ha editado con éxito.</p>";
include("includes/enlaces.php");
echo "</body>";
echo "</html>";
exit();
}
?>
<p>Editar frasecita:</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="alta" id="alta">
<p><label>Frasecita:</label>
<input name="frase" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['frase']);?>">
<br />

<input name="idfrase" type="hidden" value="<?php echo $rowproducto['idfrase'];?>" />
    <input name="altaOK" type="hidden" value="true" />
<p><input name="editar" type="submit" id="altagenero" value="Editar la frasecita"></p>
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>
