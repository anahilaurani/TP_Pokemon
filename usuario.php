<!--- El sistema debe permitir loguear usuarios a modo de administradores-->
<?php

//pregunto primero si toco el boton
if (isset($_POST['loguear'])){

    //pregunto si esta vacio
    if (empty($_POST['user']) && empty($_POST['pass'])) {

        echo "<script> alert('campos vacios ingrese usuario y contrasenia')</script>";

    }else{

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        // Conexión
        $database = mysqli_connect("localhost", "root", "", "pokemon") or die("ERROR AL CONECTAR");
        $sql = "SELECT * FROM usuario WHERE user like '$user' and pass like '$pass'";
        $resultado = mysqli_query($database, $sql);

        if (mysqli_num_rows($resultado) == 1 ) {
            session_start();
            $_SESSION['user'] =$user;
            header("Location: index.php");
            exit;

        }else{
            echo "<br>";
            echo "<script> alert('debe loguearse')</script>";
            require_once("./registrar.php");
        }

    }
}
//mysqli_close($database);
?>
