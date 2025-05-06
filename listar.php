<?php
// Incluir archivo de conexión a la base de datos
include ("conexion.php");

// Seleccionar los registros de la tabla cliente
$sql = "SELECT cedula, nombres, apellidos, celular FROM cliente";
$resultado = $conn->query($sql);

// Verificar si la consulta se ejecutó correctamente
if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 100px; /* Espacio para evitar que el navbar cubra el contenido */
            background-color:#e3e3e3; /* Color de fondo claro */
        }
        .container {    
            width: 500px;
            text-align: center;
            margin-top:10%;
        
        }
        table {
            width: 100%; /*ancho de la tabla*/
            heitht: 100%; /*alto de la tabla*/
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0px 10px rgba(124, 122, 117, 0.89);
        }
        th, td {
    border: 1px solid #ddd; /* Borde claro entre celdas */
    padding: 2px;
    text-align: center;
}

    th {
    background-color: rgb(10, 87, 231);
    color: white;
}

tr:nth-child(even) {
    background-color:rgb(153, 148, 148); /* Color de fondo para filas pares */
}

tr:hover {
    background-color:rgb(204, 202, 202); /* Efecto al pasar el mouse */
}
              
        .botton {
            background-color: #28a745;
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 10px;
            margin-top: 30px; 
            display: inline-block;
                    }
        
        
        .editar { background-color: #9AF088; }
        .eliminar { background-color: #979C05; }
    
    </style>
    
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MY PARKING 1.0</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Registro</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="registro_cliente.html">Registrar Cliente</a></li>                            
                           </ul>
                    </li>  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Listar</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="listar.php">Listar Clientes</a></li>                            
                           </ul>
                    </li>                                   
                </ul>
                <form class="d-flex" role="Buscar">
                    <input class="form-control me-2" type="Buscar" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
<!-- Fin Navbar -->

    <!-- listar Clientes -->
    <div class="container">
        <h3>LISTA DE CLIENTES REGISTRADOS</h3>
        <table >
            <thead>
                <tr>
                    <th>cedula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Celular</th>
                    <th>Acciones</th>
                 </tr>
            </thead>
            <tbody>
            <?php if ($resultado->num_rows > 0): ?>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $fila["cedula"]; ?></td>
                        <td><?php echo $fila["nombres"]; ?></td>
                        <td><?php echo $fila["apellidos"]; ?></td>
                        <td><?php echo $fila["celular"]; ?></td>
                        <td>
                            <a class="btn editar" href="modificar.php?id=<?php echo $fila['cedula']; ?>">Editar</a>
                            <a class="btn eliminar" href="eliminar.php?id=<?php echo $fila['cedula']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este cliente?');">Eliminar</a>                        
                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr><td colspan="5">No se encontraron clientes registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
<!-- Fin listar Clientes -->
        <a href="registro_cliente.html" class="botton">Volver al Registro</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
 
</body>
</html>

<?php $conn->close(); ?>