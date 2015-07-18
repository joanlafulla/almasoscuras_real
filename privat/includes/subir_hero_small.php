<?php 
if (!empty($_FILES['herosmall']['name'])){
//defino una constante para la carpeta donde subo las imagenes grandes
define('UPLOAD_DIR_HEROSMALL','../img/hero');
//$directorio = 'http://www.almasoscuras.com/images/elastic/large/';

//lista de archivos permitidos
$permitidos=array('image/gif','image/jpeg','image/pjpeg','image/png');
//Presumo que el archivo no es correcto en cuanto a tamaño ni tipo
$sizeOK=false;
$typeOK=false;
//Compruebo si realmente el archivo tiene el tamaño correcto.
if($_FILES['herosmall']['size'] > 0 && $_FILES['herosmall']['size']<=MAX_FILE_SIZE){
$sizeOK=true;
}
//compruebo si el archivo subido está en la lista de permitidos
foreach($permitidos as $type){
if($type==$_FILES['herosmall']['type']){
$typeOK=true;
break;
	}
}
//Si se ha subido correctamente ($sizeOK=true) y ($typeOK=true) comprobaremos entoncer el elemento [error] del array $_FILES
if ($sizeOK && $typeOK){
	echo "size y type estan OK<br />";
switch($_FILES['herosmall']['error']){
case 0:
echo "NOHAYERROR";
//echo "<p>".$subidos."</p>";
//que no haya error--- subo el archivo y lo renombro
$unic_id = uniqid();
$pre_name = explode(".", $_FILES['herosmall']['name']);
$final_name_small = $pre_name[0].$unic_id.".jpg";
//echo "final name: ".$final_name."<br />";
$exito=move_uploaded_file($_FILES['herosmall']['tmp_name'],UPLOAD_DIR_HEROBIG.'/'.$final_name_small);
//$exito=move_uploaded_file($_FILES['herosmall']['tmp_name'],$directorio.$_FILES['herosmall']['name']);
if ($exito){
	//echo "EXITAZO";
	$subidos="../img/hero/".$_FILES['herosmall']['name'];
	echo "<p>".$subidos."</p>";
//echo "<p>".$subidos."</p>";
//echo "<p>Aquí está la imagen: <img src='".$subidos."' /></p>";
$resultadoimagen=$_FILES['herosmall']['name']." | imagen subida con éxito";
$subidoherosmall=$_FILES['herosmall']['name'];
}else{
$resultadoimagen="Error al subir AQUI ESTOY ".$_FILES['herosmall']['name'];
}
break;
case 3:
$resultadoimagen="Error al subir ".$_FILES['herosmall']['name'];
default:
$resultadoimagen="Error en el sistema de subir archivos. Avise al webmaster";
	}	
}
elseif ($_FILES['herosmall']['error']==4){
$resultadoimagen="No se ha seleccionado ninguna imágen";
}
else{
$resultadoimagen=$_FILES['herosmall']['name']." no se ha podido subir. Tamaño máximo de archivo:". $maximo."<br>Tipos de archivo acceptados: gif, jpeg y png.";
			}
		}
?>