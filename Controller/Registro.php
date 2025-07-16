<?php
// Llamar la conexión
include_once "Conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['id'];
$correo = $_POST['correo'];
$edad = $_POST['edad'];
$tel = $_POST['Tel'];

if ($conexion) {
    try {
        $consulta = "INSERT INTO `registropersonas`(`Id`, `Nombre`, `Apellido`, `Edad`, `Correo`, `Telefono`) 
                     VALUES (:id, :nombre, :apellido, :edad, :correo, :telefono)";
        
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id', $cedula);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $tel);
        $stmt->execute();

        header("Location: ../Index.php?mensaje=Correcto");
        exit();
        
    } catch (PDOException $e) {
        // Código de error 23000 = violación de restricción (clave duplicada, etc.)
        if ($e->getCode() == 23000) {
            header("Location: ../Index.php?mensaje=Duplicado");
        } else {
            // Otro tipo de error
            header("Location: ../Index.php?mensaje=Error");
        }
        exit();
    }
} else {
    header("Location: ../Index.php?mensaje=SinConexion");
    exit();
}
?>
