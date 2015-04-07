<?php require_once('Connections/top5.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>
<?php 

/* echo "¿Tenemos idioma?: ".$_SESSION['idioma']."<br />";
echo "¿Tenemos idsec?: ".$_GET['idsec']."<br />"; */

mysql_select_db($database_top5, $top);
$producto="SELECT * FROM top WHERE idtop='1'";
$resultproducto=mysql_query($producto) or die(mysql_error());
$rowproducto=mysql_fetch_array($resultproducto);
$totalproducto=mysql_num_rows($resultproducto);

if (isset($_POST['editar'])){
$top1=addslashes($_POST['top1']);
echo $top1."<br />";
$top2=addslashes($_POST['top2']);
echo $top2."<br />";
$top3=addslashes($_POST['top3']);
echo $top3."<br />";
$top4=addslashes($_POST['top4']);
echo $top4."<br />";
$top5=addslashes($_POST['top5']);
echo $top5."<br />";
$urltop1=addslashes($_POST['urltop1']);
echo $urltop1."<br />";
$urltop2=addslashes($_POST['urltop2']);
echo $urltop2."<br />";
$urltop3=addslashes($_POST['urltop3']);
echo $urltop3."<br />";
$urltop4=addslashes($_POST['urltop4']);
echo $urltop4."<br />";
$urltop5=addslashes($_POST['urltop5']);
echo $urltop5."<br />";
//echo "id a borrar ".$idsec."<br />";
mysql_select_db($database_top5, $top);
$sqleditar="UPDATE top SET idtop='1', top1='$top1', top2='$top2', top3='$top3', top4='$top4', top5='$top5', urltop1='$urltop1', urltop2='$urltop2', urltop3='$urltop3', urltop4='$urltop4', urltop5='$urltop5'  WHERE idtop='1'";
$resulteditar=mysql_query($sqleditar) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar TOP5</title>
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
<p>Editar TOP 5:</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="alta" id="alta">
<p><label>TOP 1:</label>
<input name="top1" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['top1']);?>">
<br />
<label>URL:</label>
<input name="urltop1" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['urltop1']);?>">
</p>
<p><label>TOP 2:</label>
<input name="top2" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['top2']);?>">
<br />
<label>URL:</label>
<input name="urltop2" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['urltop2']);?>">
</p>

<p><label>TOP 3:</label>
<input name="top3" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['top3']);?>">
<br />
<label>URL:</label>
<input name="urltop3" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['urltop3']);?>">
</p>
<p><label>TOP 4:</label>
<input name="top4" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['top4']);?>">
<br />
<label>URL:</label>
<input name="urltop4" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['urltop4']);?>">
</p>
<p><label>TOP 5:</label>
<input name="top5" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['top5']);?>">
<br />
<label>URL:</label>
<input name="urltop5" type="text" id="genero" size="25" value="<?php echo stripslashes($rowproducto['urltop5']);?>">
</p>

    <input name="altaOK" type="hidden" value="true" />
<p><input name="editar" type="submit" id="altagenero" value="Dar de alta el TOP 5"></p>
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>
