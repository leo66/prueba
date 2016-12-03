<?php 
class user {
	function obtenerDatosUsuario($correo){
		$v_email = $correo;
		include ("../Conexion/conexion.php");
		
		$sentenciaMYSQL ="SELECT nombre, apellido from usuario where correo='$v_email'";
		if($resultado = $objetoMySQLi->query($sentenciaMYSQL))
		{
			if($objetoMySQLi->affected_rows>0){
				$i=0;
				while ($fila = $resultado->fetch_assoc()){
				$arreglo[$i]=array($fila['nombre'],$fila['apellido']);
				$i++;
				
				}
				return $arreglo;
			}else {
				echo"La consulta no ha producido ningun resultado";
				}
		}
		else {
			echo "<br> No ha podido realizarse la consulta. ha habido un error<br>";
			echo "<i>Error:</i>".$objetoMySQLi->error. "<i>Codigo:</i>".$objetoMySQLi->errno;
			
			}
			
			$objetoMySQLi->close();
	
	}
}

?>