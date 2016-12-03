<?php

require_once("C:\wamp\www\appWeb\Conexion\conexion.php");
$status;
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$correo=$_POST["correo"];
$clave=$_POST["clave"];
echo $nombre;
$c2 = new database();
$status=$c2->insert("INSERT INTO usuario (`nombre`, `apellido`, `correo`,`pass`) values('".$nombre."', '".$apellido."', '".$correo."', '".$clave."');");

if($status!=null){
    header("Location: index.php");
}
else{
    echo "error";
}
?>