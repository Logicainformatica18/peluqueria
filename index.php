<?php

include "head.php";
include "functiongenero.php";

?>
<div class="container" id="catalogo">
    <p></p>
    <h3 class="mbr-section-title align-center mbr-fonts-style
                    display-2">
       Eliga Catálogo</h3>
        <pre></pre>
    <?php   $genero->generoSelect2();    
    
    //$catalogo->catalogoSelectPublico();
    ?>
</div>
<p></p>
<div class="container" id="catalogo_detalle">
    <pre></pre>
    <h3 class="mbr-section-title align-center mbr-fonts-style
                    display-2">
       Estilos</h3>
        <p></p>
    <?php  
    $genero1=isset($_GET["genero"])? $_GET["genero"]:"";

    if($genero1==""){$genero1="%";}
   
    include "functioncatalogo.php"; $catalogo->catalogoSelectPublico($genero1);   
    
 
    ?>
    
</div>
</div>
<p></p>
<!-- <iframe id="seccion"src="catalogodetalle.php" frameborder="0" width="100%" height="1200px"> </iframe> -->

<section class="mbr-section info4 cid-s2jqYBJMVQ" data-bg-video="https://www.youtube.com/watch?v=MtYIlwn_9tc" id="info4-2a">



    <div class="mbr-overlay" style="opacity: 0.9; background-color:
                rgb(127, 25, 51);">
    </div>
    <div class="container">
        <div class="justify-content-center row">
            <div class="media-container-column title col-12 col-md-10">
                <h2 class="align-right mbr-bold mbr-white pb-3
                            mbr-fonts-style display-2">Estetica Unisex Doriz</h2>
                <h3 class="mbr-section-subtitle align-right mbr-light
                            mbr-white pb-3 mbr-fonts-style display-5">El mejor
                    color en el mundo es el que te queda bien a ti.</h3>
                <div class="mbr-section-btn align-right py-4"><a class="btn btn-primary display-4" href="https://mobirise.co">Ver más</a></div>
            </div>
        </div>
    </div>
</section>
<?php

include "footer.php"

?>