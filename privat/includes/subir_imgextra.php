<?php 
if (!empty($_FILES['imgextra']['name'])){
//defino una constante para la carpeta donde subo las imagenes grandes
define('UPLOAD_DIR_IMGEXTRA','../images/extras');

//lista de archivos permitidos
$permitidos=array('image/gif','image/jpeg','image/pjpeg','image/png');
//Presumo que el archivo no es correcto en cuanto a tamaño ni tipo
$sizeOK=false;
$typeOK=false;
//Compruebo si realmente el archivo tiene el tamaño correcto.
if($_FILES['imgextra']['size'] > 0 && $_FILES['imgextra']['size']<=MAX_FILE_SIZE){
$sizeOK=true;
}
//compruebo si el archivo subido está en la lista de permitidos
foreach($permitidos as $type){
if($type==$_FILES['imgextra']['type']){
$typeOK=true;
break;
	}
}
//Si se ha subido correctamente ($sizeOK=true) y ($typeOK=true) comprobaremos entoncer el elemento [error] del array $_FILES
if ($sizeOK && $typeOK){
switch($_FILES['imgextra']['error']){
case 0:
//que no haya error--- subo el archivo y lo renombro
$exito=move_uploaded_file($_FILES['imgextra']['tmp_name'],UPLOAD_DIR_IMGEXTRA.'/'.$_FILES['imgextra']['name']);
if ($exito){
	echo "EXITAZO";
$subidos=UPLOAD_DIR_IMGEXTRA."/".$_FILES['imgextra']['name'];
echo "<p>".$subidos."</p>";
$resultadoimagenexito=$_FILES['imgextra']['name']." | imagen subida con éxito";
echo $resultadoimagenexito;
$subidoimgextra=$_FILES['imgextra']['name'];
}else{
$resultadoimagen="Error al subir ".$_FILES['imgextra']['name'];
echo $resultadoimagen;
}
break;
case 3:
$resultadoimagen="Error al subir ".$_FILES['imgextra']['name'];
echo $resultadoimagen;
default:
$resultadoimagen="Error en el sistema de subir archivos. Avise al webmaster";
echo $resultadoimagen;
	}	
}
elseif ($_FILES['imgextra']['error']==4){
$resultadoimagen="No se ha seleccionado ninguna imágen";
echo $resultadoimagen;
}
else{
$resultadoimagen=$_FILES['imgextra']['name']." no se ha podido subir. Tamaño máximo de archivo:". $maximo."<br>Tipos de archivo acceptados: gif, jpeg y png.";
echo $resultadoimagen;
			}
		}
?>