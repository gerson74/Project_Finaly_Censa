<?php 

include_once "Conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

if($conexion){
    echo "Todo bien";
}
else {
    header('Location: ../index.php');
}

?>