<?php require_once('Connections/top5.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>
<?php
//ini_set ('error_reporting', E_ALL);
//DEFINIMOS LAS VARIABLES DE LA PELICULA
if (array_key_exists('altatop',$_POST)){
$altaOK=$_POST['altaOK'];
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

mysql_select_db($database_top5, $top);
$sqlinsert="INSERT INTO top(idtop,top1,top2,top3,top4,top5,urltop1,urltop2,urltop3,urltop4,urltop5) VALUES('','$top1','$top2','$top3','$top4','$top5','$urltop1','$urltop2','$urltop3','$urltop4','$urltop5')";
$resultinsert=mysql_query($sqlinsert) or die(mysql_error());
$ultimoId=mysql_insert_id();


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<title>Alta TOP 5</title>
</head>

<body>
<?php if  ($resultinsert){
echo "<p>El top 5 se ha dado de alta con éxito.</p>";
}
?>
<p>Alta del TOP 5:</p>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="alta" id="alta">
<p><label>TOP 1:</label>
<input name="top1" type="text" id="genero" size="25">
<br />
<label>URL:</label>
<input name="urltop1" type="text" id="genero" size="25">
</p>
<p><label>TOP 2:</label>
<input name="top2" type="text" id="genero" size="25">
<br />
<label>URL:</label>
<input name="urltop2" type="text" id="genero" size="25">
</p>

<p><label>TOP 3:</label>
<input name="top3" type="text" id="genero" size="25">
<br />
<label>URL:</label>
<input name="urltop3" type="text" id="genero" size="25">
</p>
<p><label>TOP 4:</label>
<input name="top4" type="text" id="genero" size="25">
<br />
<label>URL:</label>
<input name="urltop4" type="text" id="genero" size="25">
</p>
<p><label>TOP 5:</label>
<input name="top5" type="text" id="genero" size="25">
<br />
<label>URL:</label>
<input name="urltop5" type="text" id="genero" size="25">
</p>

    <input name="altaOK" type="hidden" value="true" />
<p><input name="altatop" type="submit" id="altagenero" value="Dar de alta el TOP 5"></p>
<input type="hidden" name="MM_insert" value="alta" />
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>