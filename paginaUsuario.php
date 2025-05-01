<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Formulario para subir nuevo POKEMON</h2>

    <div class="container mt-5">
        <h3>Registrar nuevo Pokémon</h3>
        <form method="POST" action="./paginaUsuario.php" enctype="multipart/form-data">
            <div class="row mb-3">

                <div class="col-md-4 mb-3">
                    <label for="nro" class="form-label">Nro Pokémon</label>
                    <input type="number" class="form-control" name="nro" id="nro" required>
                </div>

                <div class="col-md-8 mb-3">
                    <label for="file" class="form-label">Imagen del Pokémon</label>
                    <input type="file" class="form-control" name="file" id="file" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <input type="text" class="form-control" name="type" id="type" required>
                </div>

                <div class="col-12 mb-4">
                    <label for="descrip" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descrip" id="descrip" required>
                </div>

                <div class="col-12 text-center">
                    <button type="submit" name="registrar" class="btn btn-primary">Registrar Pokémon</button>
                </div>
            </div>
        </form>
    </div>



    <?php

//if ($_SESSION['user'] != null){

    if (isset($_POST['registrar'])) {
        /*agregar nuevo pokemon*/
        $nro = $_POST['nro'];
        $imagen = $_FILES['file'];
        $nombre = $_POST['name'];
        $type = $_POST['type'];
        $descrip = $_POST['descrip'];


        $nombreImg = validarFoto($imagen);

        if (!empty($nro) && !empty($nombre) && !empty($type) && !empty($descrip) && $nombreImg !== false) {
            /*ABRIR LA BASE DE DATOS*/
            $database = mysqli_connect("localhost", "root", "", "pokemon") or die("ERROR AL CONECTAR");
            $nombre_final = "img_pokemon/" . $nombreImg;
                $nuevo = mysqli_prepare($database, "INSERT INTO pokemon (nro_identificador, img,nombre, tipo, descripcion) VALUES(?,?,?,?,?)");
                mysqli_stmt_bind_param($nuevo, "issss", $nro,$nombre_final,$nombre, $type, $descrip);

                if (mysqli_stmt_execute($nuevo)) {
                    header("Location:./index.php");
                    echo "agregado con exito";
                } else {
                    echo "error al insertar";
                }
                mysqli_close($database);
            }
    //    }
}

function validarFoto($file){
    $nombreTemporal = $file['tmp_name'];
    $nombreOriginal = basename($file['name']);
    $rutaDestino = 'img_pokemon/' . $nombreOriginal;

    if (move_uploaded_file($nombreTemporal, $rutaDestino)) {
        return $nombreOriginal;
    }else{
        return false;
    }

}



?>
