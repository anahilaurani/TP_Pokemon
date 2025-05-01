<?php
// Conexión
$database = mysqli_connect("localhost", "root", "", "pokemon") or die("ERROR AL CONECTAR");

/*if (isset($_GET['modificar'])){
    $modificar = $_GET['modificar'];

    $consulta = "SELECT * FROM pokemon WHERE img = '$modificar'";
    $resultado = mysqli_query($database, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        /*?
        $datos = mysqli_fetch_assoc($resultado);
        require_once("vistaModificar.php");
        exit;
}*/
    if (isset($_POST['guardar'])) {

            $nro = $_POST['nro'];
            $imagen = $_FILES['file'];
            $nombre = $_POST['nombre'];
            $type = $_POST['tipo'];
            $descrip = $_POST['descripcion'];

            $nombreImg = validarFoto($imagen);

            $nombre_final = "img_pokemon/" . $nombreImg;

                $nuevo = mysqli_prepare($database, "UPDATE pokemon SET nro_identificador=?, img=?, nombre=?, tipo=?, descripcion=? WHERE nro_identificador=?");
                mysqli_stmt_bind_param($nuevo, "issssi", $nro, $nombre_final, $nombre, $type, $descrip);

                if (mysqli_stmt_execute($nuevo)) {
                    echo "modificarcion completada";
                } else {
                    echo "error al modificar";
                }
                mysqli_close($database);


        }

if (isset($_GET['eliminar'])){
    $nombre = $_GET['eliminar'];

    echo $nombre;

}
?>
