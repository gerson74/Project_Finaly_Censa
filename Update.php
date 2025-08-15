<?php
/**
 * Formulario de edición de registros
 * Muestra un formulario con los datos del registro seleccionado
 */

// Verificar si se recibió un ID


$id = $_GET['id'];

// Cargar conexión
include_once "Controller/Conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

if (!$conexion) {
    header("Location: index.php?mensaje=SinConexion");
    exit;
}

// Consultar los datos del registro
$sql = "SELECT * FROM registropersonas WHERE Id = :id";
$consulta = $conexion->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();

// Verificar si se encontró el registro

// Obtener los datos del registro
$registro = $consulta->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HOME</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
<body>
<?php $pageTitle = 'Editar Registro - PHP Curso'; 
include 'Layout/Lay.php'; ?>

<!-- Sección de formulario de edición -->
<section class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card p-4 register-card">
        <h3 class="mb-3 text-center fw-bold">
          <i class="bi bi-pencil-square me-2"></i>Editar Registro
        </h3>
        <p class="mb-4 text-center" style="color:var(--mint-dark);">
          Modifica los datos del registro seleccionado.
        </p>
        
        <!-- Formulario de edición -->
        <form action="Controller/UpdateController.php" method="POST">
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id']); ?>">
          <div class="mb-3">
            <label for="Id" class="form-label">ID</label>
            <input type="text" class="form-control" id="Id" name="Id" 
                   value="<?php echo htmlspecialchars($registro['Id']); ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" 
                   value="<?php echo htmlspecialchars($registro['Nombre']); ?>" required>
          </div>
          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" 
                   value="<?php echo htmlspecialchars($registro['Apellido']); ?>" required>
          </div>
          <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="text" class="form-control" id="edad" name="edad" 
                   value="<?php echo htmlspecialchars($registro['Edad']); ?>" 
                   pattern="[0-9]{1,3}" maxlength="3" required>
          </div>
          
          <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" 
                   value="<?php echo htmlspecialchars($registro['Correo']); ?>" required>
          </div>
          
          <div class="mb-4">
            <label for="tel" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="tel" name="tel" 
                   value="<?php echo htmlspecialchars($registro['Telefono']); ?>" required>
          </div>
          
          <div class="d-flex gap-2">
            <button class="btn btn-success flex-grow-1 fw-bold" type="submit">
              <i class="bi bi-save"></i> Guardar Cambios
            </button>
            <a href="index.php" class="btn btn-secondary fw-bold">
              <i class="bi bi-x-circle"></i> Cancelar
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</div>

</body>
