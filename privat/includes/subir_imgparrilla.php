<?php 
if (!empty($_FILES['imgparrilla']['name'])){
//defino una constante para la carpeta donde subo las imagenes grandes
define('UPLOAD_DIR_IMGPARRILLA','../images/elastic/parrilla');

//lista de archivos permitidos
$permitidos=array('image/gif','image/jpeg','image/pjpeg','image/png');
//Presumo que el archivo no es correcto en cuanto a tamaño ni tipo
$sizeOK=false;
$typeOK=false;
//Compruebo si realmente el archivo tiene el tamaño correcto.
if($_FILES['imgparrilla']['size'] > 0 && $_FILES['imgparrilla']['size']<=MAX_FILE_SIZE){
$sizeOK=true;
}
//compruebo si el archivo subido está en la lista de permitidos
foreach($permitidos as $type){
if($type==$_FILES['imgparrilla']['type']){
$typeOK=true;
break;
	}
}
//Si se ha subido correctamente ($sizeOK=true) y ($typeOK=true) comprobaremos entoncer el elemento [error] del array $_FILES
if ($sizeOK && $typeOK){
switch($_FILES['imgparrilla']['error']){
case 0:
//que no haya error--- subo el archivo y lo renombro
$exito=move_uploaded_file($_FILES['imgparrilla']['tmp_name'],UPLOAD_DIR_IMGPARRILLA.'/'.$_FILES['imgparrilla']['name']);
if ($exito){
	echo "EXITAZO";
$subidos=UPLOAD_DIR_IMGPARRILLA."/".$_FILES['imgparrilla']['name'];
echo "<p>".$subidos."</p>";
$resultadoimagenexito=$_FILES['imgparrilla']['name']." | imagen subida con éxito";
$subidoimgparrilla=$_FILES['imgparrilla']['name'];
}else{
$resultadoimagen="Error al subir ".$_FILES['imgparrilla']['name'];
}
break;
case 3:
$resultadoimagen="Error al subir ".$_FILES['imgparrilla']['name'];
default:
$resultadoimagen="Error en el sistema de subir archivos. Avise al webmaster";
	}	
}
elseif ($_FILES['imgparrilla']['error']==4){
$resultadoimagen="No se ha seleccionado ninguna imágen";
}
else{
$resultadoimagen=$_FILES['imgparrilla']['name']." no se ha podido subir. Tamaño máximo de archivo:". $maximo."<br>Tipos de archivo acceptados: gif, jpeg y png.";
			}
		}
?>