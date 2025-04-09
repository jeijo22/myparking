<?php
// Incluir el archivo de conexión a la base de datos
include ("conexion.php");

// Verificar si se enviaron los datos del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario de registro
    $cedula = $_POST['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $celular = $_POST['celular'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO cliente (cedula, nombres, apellidos, celular) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $cedula, $nombres, $apellidos, $celular);
   
   if ($stmt->execute()) {
        echo "Cliente Registrado con Exitoso.";
    } else {
        echo "Error Registro del Cliente.";
    }
    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
