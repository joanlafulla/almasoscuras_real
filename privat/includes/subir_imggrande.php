<?php 
if (!empty($_FILES['imggrande']['name'])){
//defino una constante para la carpeta donde subo las imagenes grandes
define('UPLOAD_DIR_IMGGRANDE','../images/elastic/large');
//$directorio = 'http://www.almasoscuras.com/images/elastic/large/';

//lista de archivos permitidos
$permitidos=array('image/gif','image/jpeg','image/pjpeg','image/png');
//Presumo que el archivo no es correcto en cuanto a tamaño ni tipo
$sizeOK=false;
$typeOK=false;
//Compruebo si realmente el archivo tiene el tamaño correcto.
if($_FILES['imggrande']['size'] > 0 && $_FILES['imggrande']['size']<=MAX_FILE_SIZE){
$sizeOK=true;
}
//compruebo si el archivo subido está en la lista de permitidos
foreach($permitidos as $type){
if($type==$_FILES['imggrande']['type']){
$typeOK=true;
break;
	}
}
//Si se ha subido correctamente ($sizeOK=true) y ($typeOK=true) comprobaremos entoncer el elemento [error] del array $_FILES
if ($sizeOK && $typeOK){
	echo "size y type estan OK<br />";
switch($_FILES['imggrande']['error']){
case 0:
echo "NOHAYERROR";
echo "<p>".$subidos."</p>";
//que no haya error--- subo el archivo y lo renombro
$exito=move_uploaded_file($_FILES['imggrande']['tmp_name'],UPLOAD_DIR_IMGGRANDE.'/'.$_FILES['imggrande']['name']);
//$exito=move_uploaded_file($_FILES['imggrande']['tmp_name'],$directorio.$_FILES['imggrande']['name']);
if ($exito){
	//echo "EXITAZO";
	$subidos="../images/elastic/large/".$_FILES['imggrande']['name'];
	echo "<p>".$subidos."</p>";
//echo "<p>".$subidos."</p>";
//echo "<p>Aquí está la imagen: <img src='".$subidos."' /></p>";
$resultadoimagen=$_FILES['imggrande']['name']." | imagen subida con éxito";
$subidoimggrande=$_FILES['imggrande']['name'];
}else{
$resultadoimagen="Error al subir AQUI ESTOY ".$_FILES['imggrande']['name'];
}
break;
case 3:
$resultadoimagen="Error al subir ".$_FILES['imggrande']['name'];
default:
$resultadoimagen="Error en el sistema de subir archivos. Avise al webmaster";
	}	
}
elseif ($_FILES['imggrande']['error']==4){
$resultadoimagen="No se ha seleccionado ninguna imágen";
}
else{
$resultadoimagen=$_FILES['imggrande']['name']." no se ha podido subir. Tamaño máximo de archivo:". $maximo."<br>Tipos de archivo acceptados: gif, jpeg y png.";
			}
		}
?>