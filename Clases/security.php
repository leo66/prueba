<?php 

class security {
	function verificarUsuario($clave,$correo){
		require_once("C:\wamp\www\appWeb\Conexion\conexion.php");
		$c1=new database();
		trim($clave);
		trim($correo);
		//$status=$c1->select("SELECT * FROM `usuario` WHERE correo='".$correo."' && pass= '".$clave."';");
		$status=$c1->select("SELECT * FROM `usuario` WHERE correo='leo6gatica@gmail.com' && pass='leo' ;");
		if($status!=null){
			
			//$nombre->$status['nombre'];
			return $status;

}else{
	echo "error";
	echo $clave;
	echo $correo;

} 

		}
		}

?>