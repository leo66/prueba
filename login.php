<?php 

require_once ("C:\wamp\www\appWeb\Clases\security.php");
session_start();
ini_set("display_errors",1);
$var_usuario = $_POST['txtusuario'];
$var_clave	= $_POST['txtclave'];
$obj_seguridad	= new security();

$resultado	= $obj_seguridad->verificarUsuario($var_usuario, $var_clave);

if($resultado!= null){
	//echo $resultado;
	//$_SESSION["ses_nombre"]		= $resultado[1];
	//$_SESSION["ses_apellido"]	= $var_cantidadResultados[2];
	header("Location:home.php");
}else{
	//header("Location:index.php");
	echo "error";
}


?>