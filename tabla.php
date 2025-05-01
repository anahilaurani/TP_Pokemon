<?php
// Conexión
$database = mysqli_connect("localhost", "root", "", "pokemon") or die("ERROR AL CONECTAR");

// Si no hay busqueda mostrar todos
if (!isset($_GET['enviar']) && empty($_GET['buscar'])) {
    $consulta = "SELECT * FROM pokemon";

} else {
    // Si hay búsqueda mostrar los que pida
    $busqueda = mysqli_real_escape_string($database, $_GET['buscar']);
    $consulta = "SELECT * FROM pokemon 
                                 WHERE nombre LIKE '%$busqueda%' 
                                 OR tipo LIKE '%$busqueda%' 
                                 OR nro_identificador LIKE '%$busqueda%'";
}

$resultado = mysqli_query($database, $consulta);

if (mysqli_num_rows($resultado) > 0) {

    //session_start();
    if (!empty($_SESSION['user'])) {
        mostrarDatosTablaLogueado($resultado);
    } else {
        mostrarLosDatosTabla($resultado);
    }
} else{
    echo "<div class='row m-4 '>pokemon no encontrado</div>";
    $consulta = "SELECT * FROM pokemon";
    $resultado = mysqli_query($database, $consulta);
    //session_start();
    if ($_SESSION['user'] != null) {
        echo "estas logueado";
        mostrarDatosTablaLogueado($resultado);
    } else {
        echo"no estas logueado";
        mostrarLosDatosTabla($resultado);
    }

}
mysqli_close($database);

/* FUNCIONES ------ */
function mostrarLosDatosTabla($tabla){
    while ($ver = mysqli_fetch_array($tabla)) {
        echo "<tr>";
        echo "<td>" . $ver[1] . "</td>";
        echo "<td><img src='" . $ver[2] . "' width='50'></td>";
        echo "<td><a href='cadaPokemon.php?img=$ver[2]'>". $ver[3] . "</a> </td>";
        $tipo = strtolower(trim($ver[4]));
        switch ($tipo) {
            case 'planta':
                echo "<td><img src='./img_pokemon/planta.jpg' width='50'></td>";
                break;
            case 'agua':
                echo "<td><img src='./img_pokemon/agua.jpg' width='50'></td>";
                break;
            case 'fuego':
                echo "<td><img src='./img_pokemon/fuego.jpg' width='50'></td>";
                break;
            default: echo "<td>" . $ver[4] . "</td>";
                break;
        }
        echo "<td>" . $ver[5] . "</td>";
        echo "</tr>";
    }
}

function mostrarDatosTablaLogueado($tabla){
    while ($ver = mysqli_fetch_array($tabla)) {
        echo "<tr>";
        echo "<td>" . $ver[1] . "</td>";
        echo "<td><img src='" . $ver[2] . "' width='50'></td>";
        echo "<td><a href='cadaPokemon.php?img=$ver[2]'>". $ver[3]."</a></td>";
        $tipo = strtolower(trim($ver[4]));
        switch ($tipo) {
            case 'planta':
                echo "<td><img src='./img_pokemon/planta.jpg' width='50'></td>";
                break;
            case 'agua':
                echo "<td><img src='./img_pokemon/agua.jpg' width='50'></td>";
                break;
            case 'fuego':
                echo "<td><img src='./img_pokemon/fuego.jpg' width='50'></td>";
                break;
            default: echo "<td>" . $ver[4] . "</td>";
                break;
        }
        echo "<td>" . $ver[5] . "</td>";
        echo "<form method='POST' action='accionesUsuario.php' class='d-inline'>";
        echo "<td>  <a href='vistaModificar.php?modificar=$ver[2]' class='btn btn-warning'>Modificar</a>
                    <a href='accionesUsuario.php?eliminar=$ver[2]' class='btn btn-danger'>Baja</a></td>";
        echo "</tr>";
        echo "</form>";
    }

}


?>
