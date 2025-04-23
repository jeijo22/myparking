<?php
// Incluir archivo de conexión a la base de datos
include ("conexion.php");
if (isset($_GET['cedula'])) {
    $cedula = $_GET['cedula'];
    $query = "SELECT * FROM cliente WHERE cedula = $cedula";
    $resultado = $conn->query($query);
    $cliente = $resultado->fetch_assoc();
}

// Verificar si se enviaron los datos del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que la conexión esté activa
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del formulario de registro
    $cedula = $_POST['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $celular = $_POST['celular'];

    // Preparar la consulta
    $stmt = $conn->prepare("INSERT INTO cliente (cedula, nombres, apellidos, celular) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $updateQuery = "UPDATE cliente SET cedula='$cedula', nombres='$nombres' , apellidos='$apellidos', celular='$celular' WHERE cedula=$cedula";
    if ($conn->query($updateQuery)) {
        header("Location: listar.php");
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Clientes</title>
    <link rel="stylesheet" href="styles.css">
    <style>
           button{
            background-color:#28a745;
            padding: 10px 10px;
            text-decoration: none;
            color:white;
            border-radius:5px;
        } 
    </style>
</head>
<body>
<div class="container">
    <h2>Editar Clientes</h2>
    <form action="" method="POST">
        <label for="cedula">Cédula:</label>
        <input type="text" name="cedula" value="<?php echo $cliente['cedula']; ?>" required>
        
        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" value="<?php echo $cliente['nombres']; ?>" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo $cliente['apellidos']; ?>" required>

        <label for="celular">Celular:</label>
        <input type="text" name="celular" value="<?php echo $cliente['celular']; ?>" required>

        <button type="submit">Actualizar</button>
    </form>
    <br>
    <a href="listar.php">Volver</a>

</body>
</html>