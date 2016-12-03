<?php

require_once("C:\wamp\www\appWeb\Conexion\conexion.php");

$status;
$titulo=$_POST["titulo"];
$direccion=$_POST["direccion"];
$nrohabitacion=$_POST["nrohabitacion"];
$descripcion=$_POST["descripcion"];
$valor=$_POST["valor"];
$telefono=$_POST["telefono"];
$fecha=date("Y/m/d");
//$imagen=$_POST["foto"];

$dir_destino = "C:\wamp\www\appWeb\img";

$imagen_subida = $dir_destino . basename($_FILES["foto"]["name"]);

$id_publicacion;
$id_img;

$c1 = new database();
$status=$c1->insert("INSERT INTO direccion (`pais`, `ciudad`, `direccion`) values('chile', 'pucon', $direccion);");
if($status!=null){
$status=$c1->insert("INSERT INTO publicacion (`direccion_id_direccion`, `comentario_id_comentario`, `usuario_id_usuario`, `titulo`, `nro_habitaciones`, `descripcion`, `valor`, `fecha`, `estado`, `telefono`) values('1','1','1', '".$titulo."', '".$nrohabitacion."','".$descripcion."','".$valor."' ,'".$fecha."' ,'1', '".$telefono."');");
}
if($status!=null){
    //header("Location: index.php");
    //function imagen();
    if(!is_writable($dir_destino)){
	echo "no tiene permisos";
}else{
	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
		/*echo "Archivo ". $_FILES['foto']['name'] ." subido con éxtio.\n";
		echo "Mostrar contenido\n";
		echo $imagen_subida;*/
		if (move_uploaded_file($_FILES['foto']['tmp_name'], $imagen_subida)) {
			$c3=new database();
			$id_publicacion=$c3->select("SELECT MAX(id_publicacion) FROM publicacion");
			$id=$id_publicacion[0];
			echo $id;
			$c3->insert("INSERT into imagen(ruta, id_publicacion) value ('".$imagen_subida."','".$id."') ");
			$id_img=$c3->select("SELECT MAX(id_imagen) FROM imagen ");
			$id2=$id_img[0];
			$c3->update("UPDATE publicacion SET id_imagen='".$id2."' WHERE  'id_publicacion'= '".$id."' ");
			//header("Location: index.php");
			
		
		} else {
			echo "Posible ataque de carga de archivos!\n";
		}
		
}
}
}
else{
    echo "error";
}


?>