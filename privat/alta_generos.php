<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>

<?php
//ini_set ('error_reporting', E_ALL);
//DEFINIMOS LAS VARIABLES DE LA PELICULA
if (array_key_exists('altagenero',$_POST)){
$altaOK=$_POST['altaOK'];
$genero=addslashes($_POST['genero']);
echo $genero."<br />";

mysql_select_db($database_almasonline, $almasonline);
$sqlinsert="INSERT INTO generos(idgeneros,genero) VALUES('','$genero')";
$resultinsert=mysql_query($sqlinsert) or die(mysql_error());
$ultimoId=mysql_insert_id();


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<title>Alta géneros</title>
</head>

<body>
<?php if  ($resultinsert){
echo "<p>El género se ha dado de alta con éxito.</p>";
}
?>
<p>Alta de un género:</p>
<p><strong>DATOS DE LA PELÍCULA</strong></p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="alta" id="alta">
<p><label>Género:</label>
<input name="genero" type="text" id="genero" size="25" maxlength="250"></p>

    <input name="altaOK" type="hidden" value="true" />
<p><input name="altagenero" type="submit" id="altagenero" value="Dar de alta el género"></p>
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>