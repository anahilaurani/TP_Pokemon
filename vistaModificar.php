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

<div class="container mt-5">
    <form method="POST" action="index.php" enctype="multipart/form-data">
        <div class="row mb-3">
            <h3>Datos a modificar</h3>

            <div class="col-md-6 mb-3">
                <label for="nro pokemon" class="form-label">Nro Pokemon</label>
                <input type="number" class="form-control" name="nro" id="nro" placeholder="Nro Pokemon">
            </div>

            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Pokémon">
            </div>

            <div class="col-md-6 mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo del Pokémon">
            </div>

            <div class="col-12 mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción">
            </div>

            <div class="col-12 mb-3">
                <label for="file" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="file" id="file">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="guardar">Guardar Cambios</button>
            </div>
        </div>
    </form>
</div>



</body>
</html>
