<?php
$host = "127.0.0.1";
$usuario = "root";
$contraseña = "";  //En XAMPP el usuario root no tiene contraseña
$base_datos = "myparking2"; //Nombre de la base de datos
$port = "3307"; //Puerto de la base de datos, 

// Create connection
$conn = new mysqli($host, $usuario, $contraseña, $base_datos, $port);

// Check connection
if ($conn->connect_error) {
    die("error de conexion: " . $conn->connect_error);
} 
//echo "Conexion Exitosa";

//close connection
//$conn->close(); 
?>
