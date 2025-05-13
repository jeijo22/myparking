<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $placa = $_POST["placa"];
  $marca = $_POST["marca"];
  $modelo = $_POST["modelo"];
  $color = $_POST["color"];
  $cedula = $_POST["cedula_propietario"];

  //  Lógica para guardar en la base de datos

  echo "Vehículo registrado con éxito";
}
?>
