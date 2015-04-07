<?php require_once('Connections/almasonline.php'); ?>
<?php include("includes/validar_entrada_usuari.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<title>Users Almas Oscuras</title>
</head>

<body>
<?php 
if (isset($_GET['error'])){
echo "<p>Losentimos.<br>Su login/password es incorrecto.<br><strong>Compruebe los datos y vuelva a intentarlo.</strong></p>";
} 
?>
<p>Para entrar en Almas Oscuras Administración introduzca su login y su password:</p>
<form ACTION="<?php echo $loginFormAction; ?>" method="POST" name="users">
<p><label>Login: </label>
<input name="login" type="text" /></p>
<p><label>Password: </label>
<input name="password" type="password" /></p>
<input name="btuser" type="submit" value="entrar" />
</form>
</body>
</html>