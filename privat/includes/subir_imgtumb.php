<?php 
if (!empty($_FILES['imgtumb']['name'])){
//defino una constante para la carpeta donde subo las imagenes grandes
define('UPLOAD_DIR_IMGTUMB','../images/elastic/thumbs');

//lista de archivos permitidos
$permitidos=array('image/gif','image/jpeg','image/pjpeg','image/png');
//Presumo que el archivo no es correcto en cuanto a tamaño ni tipo
$sizeOK=false;
$typeOK=false;
//Compruebo si realmente el archivo tiene el tamaño correcto.
if($_FILES['imgtumb']['size'] > 0 && $_FILES['imgtumb']['size']<=MAX_FILE_SIZE){
$sizeOK=true;
}
//compruebo si el archivo subido está en la lista de permitidos
foreach($permitidos as $type){
if($type==$_FILES['imgtumb']['type']){
$typeOK=true;
break;
	}
}
//Si se ha subido correctamente ($sizeOK=true) y ($typeOK=true) comprobaremos entoncer el elemento [error] del array $_FILES
if ($sizeOK && $typeOK){
switch($_FILES['imgtumb']['error']){
case 0:
//que no haya error--- subo el archivo y lo renombro
$exito=move_uploaded_file($_FILES['imgtumb']['tmp_name'],UPLOAD_DIR_IMGTUMB.'/'.$_FILES['imgtumb']['name']);
if ($exito){
	echo "EXITAZO";
$subidos=UPLOAD_DIR_IMGTUMB."/".$_FILES['imgtumb']['name'];
echo "<p>".$subidos."</p>";
$resultadoimagenexito=$_FILES['imgtumb']['name']." | imagen subida con éxito";
$subidoimgtumb=$_FILES['imgtumb']['name'];
}else{
$resultadoimagen="Error al subir ".$_FILES['imgtumb']['name'];
}
break;
case 3:
$resultadoimagen="Error al subir ".$_FILES['imgtumb']['name'];
default:
$resultadoimagen="Error en el sistema de subir archivos. Avise al webmaster";
	}	
}
elseif ($_FILES['imgtumb']['error']==4){
$resultadoimagen="No se ha seleccionado ninguna imágen";
}
else{
$resultadoimagen=$_FILES['imgtumb']['name']." no se ha podido subir. Tamaño máximo de archivo:". $maximo."<br>Tipos de archivo acceptados: gif, jpeg y png.";
			}
		}
?>