<!--NOTA: cuando tenga que buscar si el usuario existe y si lo encuentra que me aparesca login o index si no
  puedo usar el header(Location:'index.php') que me permite redirigir la pag si lo encuentra antes de seguir el codigo como que lo ocrta antes -->
<!--- Al ingresar al pokemon buscado, mostrar todos sus datos en una página completa-->
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
    </div>
</nav>


   <?php

   if (isset($_GET['img'])) {
       $img = basename($_GET['img']);
       $ruta = "img_pokemon/" . $img;
       if (file_exists($ruta)) {
           ?>
           <div class="container mt-5">
               <div class="row align-items-center">
                   <div class="col-md-6">
                       <img src="<?php echo $ruta ?>" alt="<?php echo $img ?>" class="img-fluid">
                   </div>
                   <?php
                   $nombreSinExtension = pathinfo($img, PATHINFO_FILENAME);
                   ?>
                   <div class="col-md-6">
                       <h2>Pokemon: <?php echo $nombreSinExtension ?></h2>
                       <p>
                           Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et eos culpa, ex mollitia voluptates repellat quasi natus ducimus commodi voluptatem eaque maxime rerum impedit illo officiis molestiae fuga sint in?Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem doloremque ducimus sed voluptatum explicabo asperiores culpa quidem quae quibusdam deserunt voluptates unde voluptas debitis illo, nesciunt maxime optio. Culpa, at.</p>
                   </div>
               </div>
           </div>

           <?php
       }

   }
   ?>








</body>
</html>