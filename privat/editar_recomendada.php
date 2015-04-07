<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>
<?php 

/* //echo "¿Tenemos idioma?: ".$_SESSION['idioma']."<br />";
//echo "¿Tenemos idsec?: ".$_GET['idsec']."<br />"; */

mysql_select_db($database_almasonline, $almasonline);
$producto="SELECT * FROM pelis ORDER BY titulo ASC";
$resultproducto=mysql_query($producto) or die(mysql_error());
$rowproducto=mysql_fetch_array($resultproducto);

if (isset($_POST['editar'])){
	echo "Enviamos el formulario<br />";
	echo "ID: ".$_POST['rec']."<br />";
	$rec=$_POST['rec'];
//$totalproducto=mysql_num_rows($resultproducto);
mysql_select_db($database_almasonline, $almasonline);
$preproducto="SELECT * FROM destacada";
$preresultproducto=mysql_query($preproducto) or die(mysql_error());
$prerowproducto=mysql_fetch_array($preresultproducto);
$pretotalproducto=mysql_num_rows($preresultproducto);

mysql_select_db($database_almasonline, $almasonline);
$producto1="SELECT idpeli, titulo, ano, nacionalidad, internacional, duracion, director, genero1, frase1, imgparrilla, linkfilmin, trailer, argumento, audio FROM pelis WHERE idpeli='".$rec."'";
$resultproducto1=mysql_query($producto1) or die(mysql_error());
$rowproducto1=mysql_fetch_array($resultproducto1);
$totalproducto2=mysql_num_rows($rowproducto1);

echo "TOTAL: ".$totalproducto2."<br />";

$idpeli=addslashes($rowproducto1['idpeli']);
echo $idpeli."<br>";
$titulo=addslashes($rowproducto1['titulo']);
echo $titulo."<br>";
$ano=addslashes($rowproducto1['ano']);
echo $titulo."<br>";
$nacionalidad=addslashes($rowproducto1['nacionalidad']);
echo $precio."<br>";
$internacional=addslashes($rowproducto1['internacional']);
echo $imggrande."<br>";
$duracion=addslashes($rowproducto1['duracion']);
echo $titulo."<br>";
$director=addslashes($rowproducto1['director']);
echo $titulo."<br>";
$genero1=addslashes($rowproducto1['genero1']);
echo $genero1."<br>";
$frase1=addslashes($rowproducto1['frase1']);
echo $frase1."<br>";
$imgparrilla=addslashes($rowproducto1['imgparrilla']);
echo $titulo."<br>";
$linkfilmin=addslashes($rowproducto1['linkfilmin']);
echo $linkfilmin."<br>";
$trailer=addslashes($rowproducto1['trailer']);
echo "Este es el trailer: ".$trailer."<br>";
$argumento=addslashes($rowproducto1['argumento']);
echo $argumento."<br>";
$audio=addslashes($rowproducto1['audio']);
echo $titulo."<br>";

if ($pretotalproducto>0){
echo "hay recomendada";	
mysql_select_db($database_almasonline, $almasonline);
$sqleditar1="UPDATE destacada SET idpeli='$idpeli', titulo='$titulo', ano='$ano', nacionalidad='$nacionalidad', internacional='$internacional', duracion='$duracion', director='$director',imgparrilla='$imgparrilla', linkfilmin='$linkfilmin', trailer='$trailer', audio='$audio', genero1='$genero1', frase1='$frase1', argumento='$argumento' WHERE iddest=1";
$resulteditar1=mysql_query($sqleditar1) or die(mysql_error());
}else{
echo "no hay recomendada";	
mysql_select_db($database_almasonline, $almasonline);
$sqlinsert1="INSERT INTO destacada(iddest,idpeli,titulo,ano,nacionalidad,internacional,duracion,director,imgparrilla,linkfilmin,trailer,audio,genero1,frase1,argumento) VALUES('1','$idpeli','$titulo','$ano','$nacionalidad','$internacional','$duracion','$director','$imgparrilla','$linkfilmin',$trailer','$audio','$genero1','$frase1','$argumento')";
$resultinsert1=mysql_query($sqlinsert1) or die(mysql_error());
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Recomendada</title>
</head>

<body>
<?php 
if (isset($resulteditar1) || isset($resultinsert1)){
echo "<p>La recomendación ".$_POST['titulo']." se han modificado con éxito.</p>";
include("includes/enlaces.php");
echo "</body>";
echo "</html>";
exit();
}
?>
<p>Editar Recomendada:</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="alta" id="alta">
<select name="rec">
<option value=""></option>
  <?php do{?>
  <option value="<?php echo addslashes($rowproducto['idpeli']); ?>"><?php echo addslashes($rowproducto['titulo']); ?></option>
  <?php
		}while($rowproducto=mysql_fetch_array($resultproducto));
        ?>
</select>
</p>
<input name="altaOK" type="hidden" value="true" />
<p><input name="editar" type="submit" id="altagenero" value="Editar Novedades"></p>
</form>
<?php include("includes/enlaces.php"); ?>
</body>
</html>
