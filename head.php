<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v4.12.4, catalogo.php -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.12.4, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/mbr-1-184x242.png" type="image/x-icon">
    <meta name="description" content="Web Site Builder Description">


    <title>Peluquería | Doris</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">




</head>

<body>
    <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-23">



        <nav
            class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="index.php">
                            <img src="assets/images/mbr-1-184x242.png" alt="Mobirise" title="" style="height: 4.5rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-2"
                            href="catalogo.php">Doriz</a></span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="index.php">
                            INICIO</a>
                    </li>



                    <?php
                    echo " <li class='nav-item dropdown'><a class='nav-link link text-white dropdown-toggle display-4'
                               href='#' aria-expanded='true' data-toggle='dropdown-submenu'>CATALOGO</a>";
                    echo " <div class='dropdown-menu'>";
                    $con = new connection();
                    $sql = mysqli_query($con->open(), "SELECT cod_genero,descripcion from genero");
                    while ($row = mysqli_fetch_array($sql)) {
                        $cod_genero = $row[0];
                        $descripcion = $row[1];
                        ?>
 
                        <a class='text-white dropdown-item display-4' href='#'onclick="elegirGenero('<?php echo $descripcion?>');"aria-expanded='false'>
                        <?php echo $descripcion?></a>
                        <?php
                       
                    }
                    echo " </div>";
                    echo "</li>";
                    ?>

                    <li class="nav-item dropdown"><a class="nav-link link text-white dropdown-toggle display-4"
                            href="catalogo.php" aria-expanded="true" data-toggle="dropdown-submenu">TIENDA</a>
                        <div class="dropdown-menu">
                            <div class="dropdown"><a class="text-white dropdown-item dropdown-toggle display-4"
                                    href="catalogo.php" aria-expanded="false" data-toggle="dropdown-submenu">Cabello</a>
                                <div class="dropdown-menu dropdown-submenu"><a
                                        class="text-white dropdown-item display-4" href="catalogo.php"
                                        aria-expanded="false">Shampoo</a><a class="text-white dropdown-item display-4"
                                        href="catalogo.php" aria-expanded="false">Acondicionador</a><a
                                        class="text-white dropdown-item display-4" href="catalogo.php"
                                        aria-expanded="false">Tratamiento</a><a
                                        class="text-white dropdown-item display-4" href="catalogo.php"
                                        aria-expanded="false">Mascarilla</a></div>
                            </div>
                            <div class="dropdown"><a class="text-white dropdown-item dropdown-toggle display-4"
                                    href="catalogo.php" aria-expanded="false" data-toggle="dropdown-submenu">Cuidado de
                                    piel</a>
                                <div class="dropdown-menu dropdown-submenu"><a
                                        class="text-white dropdown-item display-4" href="catalogo.php"
                                        aria-expanded="false">Limpieza y Tónicos</a><a
                                        class="text-white dropdown-item display-4" href="catalogo.php"
                                        aria-expanded="false">Cremas</a><a class="text-white dropdown-item display-4"
                                        href="catalogo.php" aria-expanded="false"></a></div>
                            </div>
                        </div>
                    </li>
          
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="blog.php">&nbsp;BLOG</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="login.php"><span
                                class="mobi-mbri mobi-mbri-user-2 mbr-iconfont mbr-iconfont-btn"></span>MI CUENTA</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="catalogo.php"><span
                                class="mbrib-cart-add mbr-iconfont mbr-iconfont-btn"></span>MI CARRITO</a></li>
                </ul>

            </div>
        </nav>
    </section>

    <section class="engine"><a href="https://mobirise.info/y">html web
            templates</a></section>

    <section class="carousel slide
            cid-s2ofgq5dCX" data-interval="false" id="slider1-2e">



        <div class="full-screen">
            <div class="mbr-slider slide carousel" data-keyboard="false" data-ride="false" data-interval="false"
                data-pause="false">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image:
                            url(assets/images/mbr-1-1920x1280.jpg);">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                <div class="mbr-overlay"></div><img src="assets/images/mbr-1-1920x1280.jpg" alt=""
                                    title="">
                                <div class="carousel-caption
                                        justify-content-center">
                                    <div class="col-10 align-left">
                                        <h2 class="mbr-fonts-style
                                                display-1">Estetica Unisex</h2>
                                        <p class="lead mbr-text
                                                mbr-fonts-style display-5">Encuentre
                                            su estilo que más le guste.</p>
                                        <div class="mbr-section-btn" buttons="0"><a class="btn
                                                    display-4 btn-secondary" href="coloracion.php#coloracion">Prueba un
                                                color para tu cabello</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-image:
                            url(assets/images/mbr-1889x1920.png);">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                <div class="mbr-overlay"></div><img src="assets/images/mbr-1889x1920.png" alt=""
                                    title="">
                                <div class="carousel-caption
                                        justify-content-center">
                                    <div class="col-10 align-left">
                                        <h2 class="mbr-fonts-style
                                                display-1">Todo para tu estilo</h2>
                                        <p class="lead mbr-text
                                                mbr-fonts-style display-5">Ultimos
                                            en tendencia en color, corte y
                                            tratamientos.</p>
    
                                        <div class="mbr-section-btn" buttons="0"><a class="btn
                                                    display-4 btn-secondary" href="coloracion.php#coloracion">Prueba un
                                                color para tu cabello</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image:
                            url(assets/images/mbr-1920x1280.jpeg);">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                <div class="mbr-overlay"></div><img src="assets/images/mbr-1920x1280.jpeg" alt=""
                                    title="">
                                <div class="carousel-caption
                                        justify-content-center">
                                    <div class="col-10 align-right">
                                        <h2 class="mbr-fonts-style
                                                display-1">Cortes a medida</h2>
                                        <p class="lead mbr-text
                                                mbr-fonts-style display-5">Recibe
                                            asesoramiento que te garantizan
                                            el resultado esperado que
                                            deseas.</p>
         
                                        <div class="mbr-section-btn" buttons="0"><a class="btn
                                                    display-4 btn-secondary" href="coloracion.php#coloracion">Prueba un
                                                color para tu cabello</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><a data-app-prevent-settings="" class="carousel-control
                        carousel-control-prev" role="button" data-slide="prev" href="#slider1-2e"><span
                        aria-hidden="true" class="mbri-left mbr-iconfont"></span><span
                        class="sr-only">Previous</span></a><a data-app-prevent-settings="" class="carousel-control
                        carousel-control-next" role="button" data-slide="next" href="#slider1-2e"><span
                        aria-hidden="true" class="mbri-right mbr-iconfont"></span><span class="sr-only">Next</span></a>
            </div>
        </div>
    </section>