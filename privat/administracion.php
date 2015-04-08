<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/autorizar_usuario.php"); ?>
<?php include("includes/logout.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<title>Administración Almas Oscuras</title>
</head>

<body>
<h4>MENÚ ADMINISTRACIÓN ALMAS OSCURAS ONLINE</h4>
<ol>
<li><a href="alta_pelicula_imagenes.php">Alta Película</a></li>
<li><a href="editar_pelicula.php">Ver/editar/borrar película</a></li>
<li><a href="alta_generos.php">Alta Géneros</a></li>
<li><a href="editar_generos_ver.php">Editar Géneros</a></li>
<li><a href="alta_frases.php">Alta Frasecitas</a></li>
<li><a href="editar_frasecitas_ver.php">Editar Frasecitas</a></li>
<li><a href="alta_top5.php">Alta TOP 5</a></li>
<li><a href="editar_top5.php">Editar TOP 5</a></li>
<li><a href="editar_carrusel.php">Editar Carrusel</a></li>
<li><a href="editar_novedades.php">Editar Novedades</a></li>
<li><a href="editar_recomendada.php">Editar Recomendada</a></li>
<li><a href="hero_json.php">Gestionar Hero</a></li>
</ol>
<?php include("includes/enlaces.php"); ?>
</body>
</html>