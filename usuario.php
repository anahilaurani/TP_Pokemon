<!--- El sistema debe permitir loguear usuarios a modo de administradores-->
<?php

//pregunto primero si toco el boton
if (isset($_POST['loguear'])){

    //pregunto si esta vacio
    if (empty($_POST['user']) && empty($_POST['pass'])) {
        echo "<script> alert('campos vacios ingrese usuario y contrasenia')</script>";
    }

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if(!empty($user) && !empty($pass)){
        // Conexión
        $database = mysqli_connect("localhost", "root", "", "pokemon") or die("ERROR AL CONECTAR");
        $sql = "SELECT * FROM usuario WHERE user like '$user' and pass like '$pass'";
        $resultado = mysqli_query($database, $sql);

        if (mysqli_num_rows($resultado) == 1 ) {
            session_start();
            $_SESSION['user'] = $user;
            
            echo "<script> alert('BIENVENIDO')</script>";
            require_once ("./paginaUsuario.php");

        }else{
            echo "<br>";
            echo "<script> alert('debe loguearse')</script>";
            require_once("./registrar.php");
        }

    }
}
//mysqli_close($database);
?>
