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
    <h2 class="text-center">Formulario de Registro</h2>

    <form method="POST" action="./registrar.php">
        <div class="row mt-4">
            <div class="col-sm-12">
                <table class="table table-hover table-condensed table-bordered">
                    <tr>
                        <th>Gmail</th>
                        <td><input type="email" name="gmail" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Nombre de usuario</th>
                        <td><input type="text" name="usuario" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Contraseña</th>
                        <td><input type="password" name="password" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button type="submit" name="registrar" class="btn btn-primary">Registrarse</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>

<?php
     // si preciono el boton
     if (isset($_POST['registrar'])){
         $gmail = $_POST['gmail'];
         $usuario = $_POST['usuario'];
         $password = $_POST['password'];

         if (!empty($gmail) && !empty($usuario) && !empty($password)){
             // BASE DE DATOS INSERTAR UN NUEVO USUARIO
             $database = mysqli_connect("localhost", "root", "", "pokemon") or die("ERROR AL CONECTAR");
            // evitas inyecciones
             $insertar = mysqli_prepare($database, "INSERT INTO usuario(gmail, user, pass) VALUES(?,?,?)");
             mysqli_stmt_bind_param($insertar, "sss", $gmail, $usuario, $password);

             if (mysqli_stmt_execute($insertar)) {
                 echo "se registro correctamente el usuario";
                 header("Location:./index.php");
                 echo "<script> alert('registro exitoso')</script>";
             }else{
                 echo " no se registro correctamente el usuario";
             }

             mysqli_close($database);
         }
     }


?>