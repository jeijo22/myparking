<?php
// Incluir el archivo de conexión a la base de datos
include("conexion.php");

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

    // Vincular parámetros
    $stmt->bind_param("isss", $cedula, $nombres, $apellidos, $celular);

    // Ejecutar la consulta
    if ($stmt->execute()) {
       /* echo "Cliente registrado exitosamente.";-->*/
        // Redirigir a la página de listado después de registrar
        header("Location: listar.php"); 
    } else {
        // Verifica si el error es por clave primaria duplicada (cedula ya existente)
        if ($conn->errno == 1062) {
            echo "Error: ya existe un cliente con esa cédula.";
        } else {
            echo "Error al registrar cliente: " . $stmt->error;
        }
    }

    // Cerrar recursos
    $stmt->close();
    $conn->close();
} else {
    echo "***Acceso no permitido***.";
}
?>
