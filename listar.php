<?php
// Incluir archivo de conexión a la base de datos
include ("conexion.php");

// Para buscar clientes por nombre, apellidos, cédula o celular
$condicion = "";
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    $busqueda = $conn->real_escape_string($_GET['buscar']);
    $condicion = "WHERE nombres LIKE '%$busqueda%' 
                  OR apellidos LIKE '%$busqueda%' 
                  OR cedula LIKE '%$busqueda%' 
                  OR celular LIKE '%$busqueda%'";
}

// Consulta para seleccionar los registros de la tabla cliente
$sql = "SELECT cedula, nombres, apellidos, celular FROM cliente $condicion ORDER BY apellidos ASC";
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
            background-image: url('imagenes/parqueo1.jpg'); /* imagen de fondo de listar.php */
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(2px);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
}
           .container {    
            background-color: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 760px;  /* <-- Ajusta este valor a lo que necesites */
            width: 100%;
            margin: auto;
}
    
        table {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;   
        }
        th {
    background-color: #0a57e7;
    color: white;
    text-align: center;
    font-size: 0.85rem;
    text-transform: uppercase;
    padding: 8px;
}

td {
    text-align: center;
    padding: 8px;
}
    th {
    background-color: rgb(10, 87, 231);
    color: white;
}
/* Cambiar el fondo de las filas */
table tr:nth-child(odd) {
    background-color:rgb(250, 243, 243); /* filas impares*/
}
tr:nth-child(even) {
    background-color:rgb(153, 148, 148); /* filas pares*/
}

tr:hover {
    background-color: #f1f1f1; /* Color de fondo al pasar el mouse filas pares*/
    }

    tr:nth-child(odd):hover {
    background-color: #d3d3d3; /* Color al pasar el mouse sobre filas impares */
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

     .custom-navbar {
    background-color:rgb(43, 14, 212); /* cambia el color de la barra nav */
}
.custom-navbar .navbar-brand,
.custom-navbar .nav-link {
    color: white; /* cambia el color del texto de la barra nav */
}
        
        
        .editar { background-color: #9AF088; }
        .eliminar { background-color: #979C05; }
    
    </style>
    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA DE PARQUEADERO MY PARKING</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                         <!-- Cambiar href para que apunte a la página 'diseño.html' -->
                    <a class="nav-link active text-white" aria-current="page" href="diseño.html">Inicio</a>
                </li> 
                       
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Registro</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="registro_cliente.html">Registrar Cliente</a></li>                            
                           </ul>
                    </li>  

                    </li>  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Listar</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="listar.php">Listar Clientes</a></li>                            
                           </ul>
                    </li>   
                    </li>                                   
                </ul>
                <form class="d-flex mb-3" method="GET" action="listar.php">
                <input class="form-control me-2" type="text" name="buscar" placeholder="Buscar cliente">
                <button class="btn btn-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
<!-- Fin Navbar -->

    <!-- listar Clientes -->
    <div class="container">
    <h3 style="color:black; font-weight: bold; margin-bottom: 1rem; text-align: center;">
    <i class="bi bi-people-fill"></i> LISTADO DE CLIENTES REGISTRADOS
</h3>    
         <table>
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
                        <a class="btn btn-sm btn-warning" href="modificar.php?id=<?php echo $fila['cedula']; ?>">
                        <i class="bi bi-pencil-square"></i> Editar
                        <a class="btn btn-sm btn-danger ms-2" href="eliminar.php?id=<?php echo $fila['cedula']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este cliente?');">
                        <i class="bi bi-trash-fill"></i> Eliminar
                        </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr><td colspan="5">No se encontraron clientes registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
<!-- Fin listar Clientes -->
<a href="registro_cliente.html" class="btn btn-primary mt-4">
    <i class="bi bi-arrow-left-circle-fill"></i> Volver al Registro
</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
 
</body>
</html>

<?php $conn->close(); ?>