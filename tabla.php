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
    while ($ver = mysqli_fetch_array($resultado)) {
    echo "<tr>";
    echo "<td>" . $ver[0] . "</td>";
    echo "<td>" . $ver[1] . "</td>";
    echo "<td><img src='" . $ver[2] . "' width='50'></td>";
    echo "<td>" . $ver[3] . "</td>";
    echo "<td>" . $ver[4] . "</td>";
    echo "<td>" . $ver[5] . "</td>";
    echo "</tr>";
   }
} else{
    echo "<div class='row m-4 '>pokemon no encontrado</div>";

    $consulta = "SELECT * FROM pokemon";
    $resultado = mysqli_query($database, $consulta);

    while ($ver = mysqli_fetch_array($resultado)) {
        echo "<tr>";
        echo "<td>" . $ver[0] . "</td>";
        echo "<td>" . $ver[1] . "</td>";
        echo "<td><img src='" . $ver[2] . "' width='50'></td>";
        echo "<td>" . $ver[3] . "</td>";
        echo "<td>" . $ver[4] . "</td>";
        echo "<td>" . $ver[5] . "</td>";
        echo "</tr>";
    }
}


mysqli_close($database);
?>
