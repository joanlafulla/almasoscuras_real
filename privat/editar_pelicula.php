<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>
<?php mysql_select_db($database_almasonline, $almasonline);
$prod="SELECT * FROM pelis ORDER BY TITULO";
$resultprod=mysql_query($prod) or die(mysql_error());
$rowprod=mysql_fetch_array($resultprod);
$totalprod=mysql_num_rows($resultprod);
//echo $totalprod;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<title>Documento sin título</title>
</head>

<body>
<table border="1" cellpadding="3" cellspacing="3" width="80%">
<tr><td width="60%">TÍTULO</td><td width="20%">DIRECTOR</td><td width="20%">ACCIÓN</td></tr>
<?php 
do{
  ?>
  <tr><td><?php echo $rowprod['titulo'];?></td><td><?php echo $rowprod['director'];?></td><td><a href="edit.php?idpeli=<?php echo $rowprod['idpeli'];?>">Editar</a> | <a href="borrar.php?idpeli=<?php echo $rowprod['idpeli'];?>">Borrar</a></td></tr>
  <?php 
  }while($rowprod=mysql_fetch_array($resultprod));
	?> 
    </table>
<?php include("includes/enlaces.php"); ?>
</body>
</html>