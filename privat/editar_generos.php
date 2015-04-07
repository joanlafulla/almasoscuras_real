<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>
<?php 

if (isset($_GET['idgeneros'])){
/* echo "¿Tenemos idioma?: ".$_SESSION['idioma']."<br />";
echo "¿Tenemos idsec?: ".$_GET['idsec']."<br />"; */
$idgeneros=$_GET['idgeneros'];

mysql_select_db($database_almasonline, $almasonline);
$producto="SELECT * FROM generos WHERE idgeneros='".$idgeneros."'"; 
$resultproducto=mysql_query($producto) or die(mysql_error());
$rowproducto=mysql_fetch_array($resultproducto);
$totalproducto=mysql_num_rows($resultproducto);
}
if (isset($_POST['editar'])){
$idgeneros=$_POST['idgeneros'];
echo $idgeneros."<br />";
$genero=addslashes($_POST['genero']);
echo $genero."<br />";
//echo "id a borrar ".$idsec."<br />";
mysql_select_db($database_almasonline, $almasonline);
$sqleditar="UPDATE generos SET genero='$genero' WHERE idgeneros='".$idgeneros."'";
$resulteditar=mysql_query($sqleditar) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Géneros</title>
</head>

<body>
<?php 
if (isset($resulteditar)){
echo "<p>El género ".$_POST['genero']." se ha editado con éxito.</p>";
include("includes/enlaces.php");
echo "</body>";
echo "</html>";
exit();
}
?>
<p>Editar género:</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="alta" id="alta">
<p><label>Género:</label>
<input name="genero" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['genero']);?>">
<br />

<input name="idgeneros" type="hidden" value="<?php echo $rowproducto['idgeneros'];?>" />
    <input name="altaOK" type="hidden" value="true" />
<p><input name="editar" type="submit" id="altagenero" value="Editar el género"></p>
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>
