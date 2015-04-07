<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>
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
}
if (isset($_POST['borrar'])){
$idpeli=$_GET['idpeli'];
//echo "id a borrar ".$idsec."<br />";
$sqlborrar="DELETE FROM pelis WHERE idpeli='".$idpeli."'";
$resultborrar=mysql_query($sqlborrar) or die(mysql_error());
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Borrar Película</title>
</head>

<body>
<?php 
if (isset($resultborrar)){
echo "<p>La película ".$_POST['titulo']." se ha borrado con éxito.</p>";
include("includes/enlaces.php");
echo "</body>";
echo "</html>";
exit();
}
?>
<p>¿Deseas realmente borrar la siguiente película?:</p>
<table border="0" cellspacing="10" width="600px">
<tr>
<td valign="top">Título: <strong><?php echo $rowproducto['titulo']; ?></strong></td>
</tr>
</table>
<form action="borrar.php?idpeli=<?php echo $rowproducto['idpeli']; ?>" method="post" enctype="application/x-www-form-urlencoded">
<input name="nombre" type="hidden" size="20" value="<?php echo $rowproducto['titulo']; ?>" />
<input name="borrar" type="submit" value="Confirmar eliminación peli" />
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>
