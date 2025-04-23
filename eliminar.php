<?php
// Incluir archivo de conexión a la base de datos
include ("conexion.php");
if (isset($_GET['cedula'])) {
    $cedula = $_GET['cedula'];
    $query = "DELETE * FROM cliente WHERE cedula = $cedula";
   
        if ($conn->query($Query)) {
            header("Location: listar.php");
        } else {
            echo "Error al eliminar: " . $conn->error;
        }
}
?>