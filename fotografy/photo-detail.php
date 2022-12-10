<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"fotos");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM imagenes WHERE id=$id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($repuesta);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MEMETROY</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="css/templatemo-style.css" />
    <!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
  </head>
  <body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
      <div id="loader"></div>

      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <i class="fas fa-film mr-2"></i>
          MEMETROY
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link nav-link-1 active"
                aria-current="page"
                href="index.html"
                >Meme</a
              >
            </li>
         
            <li class="nav-item">
              <a class="nav-link nav-link-3" href="about.html">About</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <div
      class="tm-hero d-flex justify-content-center align-items-center"
      data-parallax="scroll"
      data-image-src="img/hero.jpg"
    >
      <form class="d-flex tm-search-form">
        <input
          class="form-control tm-search-input"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
        <button class="btn btn-outline-success tm-search-btn" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
    <?php
  // 6) asignamos a diferentes variables los respectivos valores del array $datos.
  // este paso no es estrictamente necesario, pero es mas practico
  //para despues llamarlos solo con el nombre de la variable
 
  $formato=$datos["formato"];
  $dimension=$datos["dimension"];
  $text=$datos["text"];
  $imagen=$datos["imagen"];?>

  <!-- mostramos los datos de ese único producto
  lo meto en una card, pero se puede mostrar como quieran-->

    <div class="container-fluid tm-container-content tm-mt-60">
    

      <div class="row mb-4">
        <h2 class="col-12 tm-text-primary">Memes</h2>
      </div>
      <div class="row tm-mb-90">
        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
          <img src="data:image/jpg;base64, <?php echo base64_encode($imagen)?>" alt="Image" class="img-fluid" />
        </div>
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
          <div class="tm-bg-gray tm-video-details">
            <p class="mb-4">
            <?php echo $text;?>
            </p>
           
            <div class="mb-4 d-flex flex-wrap">
              <div class="mr-4 mb-2">
                <span class="tm-text-gray-dark">Dimension: </span
                ><span class="tm-text-primary">><?php echo $dimension?></span>
              </div>
              <div class="mr-4 mb-2">
                <span class="tm-text-gray-dark">Format: </span
                ><span class="tm-text-primary"><?php echo $formato;?>></span>
              </div>
            </div>
            <div class="mb-4">
              
             
            </div>
            
          </div>
        </div>
      </div>
      <div class="row mb-4">
      <h2 class="col-12 tm-text-primary">Related Photos</h2>
      <?php
       $consulta='SELECT * FROM imagenes';

       // 3) Ejecutar la orden y obtenemos los registros
       $datos= mysqli_query($conexion, $consulta);

       //  recorro todos los registros y genero una CARD PARA CADA UNA
       while ($reg = mysqli_fetch_array($datos)) {?>
        
      </div>
      <div class="row mb-3 tm-gallery">
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
          <figure class="effect-ming tm-video-item">
            <img src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>" alt="Image" class="img-fluid" />
            <figcaption
              class="d-flex align-items-center justify-content-center"
            >
              <h2>MAS</h2>
              <a href="photo-detail.php?id=<?php echo $reg['id'];?>">View more</a>
            </figcaption>
          </figure>
          <div class="d-flex justify-content-between tm-text-gray">
            <span class="tm-text-gray-light">16 Oct 2020</span>
            <span>12,460 views</span>
          </div>
        </div>
        <?php } ?>
      </div>
    </footer>

    <script src="js/plugins.js"></script>
    <script>
      $(window).on("load", function () {
        $("body").addClass("loaded");
      });
    </script>
  </body>
</html>
