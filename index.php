<?php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1, user-scalable=no">
    <title>Pokedex - Navbar</title>
    <!-- Incluyendo Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo a la izquierda -->
        <a class="navbar-brand" href="#">Logo</a>

        <!-- Título en el centro -->
        <div class="mx-auto">
            <span class="navbar-text">Pokedex</span>
        </div>

        <!-- Formulario a la derecha con usuario, contraseña y botón -->
        <form class="d-flex">
            <input class="form-control me-2" type="text" placeholder="Usuario" aria-label="Usuario">
            <input class="form-control me-2" type="password" placeholder="Contraseña" aria-label="Contraseña">
            <button class="btn btn-outline-success" type="submit" >Ingresar</button>
        </form>
    </div>
</nav>

<!-- Barra de búsqueda para ingresar el tipo y nombre -->
<div class="container mt-4">
    <form class="d-flex" action="./index.php" method="GET">
        <input class="form-control me-2" type="text" name="buscar" placeholder="Ingresa el nombre, tipo o numero de pokemon" aria-label="Tipo">
        <!-- Botón " -->
        <button class="btn btn-outline-info" type="submit" name="enviar">¿Quién es el Pokémon?</button>
    </form>

    <!--Mostrar todos los pokemon que tengo o filtrarlos -->
    <div class="row mt-4">
        <div class="col-sm-12">
            <table class="table table-hover table-condensed table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nro Identificador</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                </tr>
                </thead>
                <tbody>
                <?php include("tabla.php") ?>
                </tbody>
            </table>
        </div>
    </div>


</div>

<!-- Incluyendo los scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

