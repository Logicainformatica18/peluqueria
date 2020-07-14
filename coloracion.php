
<?php
include "head.php";
?>
<p></p>
     <h3 class="mbr-section-title align-center mbr-fonts-style
                    display-2" id="coloracion">
            Coloración</h3>

   
<div style='overflow: hidden;  max-width: 100%;' id='color'>


<script>
                 var color = document.getElementById("color");
               
                 if(color.clientWidth>1001){
                    document.write("<iframe scrolling='no' src='https://www.lorealprofessionnel.es/style-my-hair-page' style='border: 0px none;  height: 2910px; margin-top: -2300px; width: 100%'></iframe>");
                 }
                 else if(color.clientWidth>350 && color.clientWidth<601){
                    document.write("<iframe scrolling='no' src='https://www.lorealprofessionnel.es/style-my-hair-page' style='border: 0px none;  height: 3170px; margin-top: -2420px; width: 100%'></iframe>");
                 }
                 else if(color.clientWidth>600 && color.clientWidth<1000){
                    document.write("<iframe scrolling='no' src='https://www.lorealprofessionnel.es/style-my-hair-page' style='border: 0px none;  height: 4550px; margin-top: -3500px; width: 100%'></iframe>");
                 }
                 else{
                    document.write("<iframe scrolling='no' src='https://www.lorealprofessionnel.es/style-my-hair-page' style='border: 0px none;  height: 2690px; margin-top: -2040px; width: 100%'></iframe>");
                 }
            </script>
    </div>       
<?php
//$publicacion->publicacionSelect2();
?>



<?php
include "footer.php";
?>
