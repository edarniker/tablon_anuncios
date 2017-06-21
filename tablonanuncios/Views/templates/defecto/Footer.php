<?php

namespace Views\templates\defecto;

class Footer {

    public static function pintar($templateParams) {
        ?>



<!--        <div class="container">
            <footer class="navbar">
                <div class="container">
                    <p class="text-muted">  Copyrights © 2016 edarniker</p>
                </div>
            </footer>
        </div>-->


 
       


        <footer>
            <div class="agileits-footer-bottom text-center">
                <div class="container">


                    <div class="copyrights">
                        <p> © 2017 <?php ?>Tablón Anuncios | Derechos reservados Edarniker </a></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </footer>


          
 <?php
  if (isset($templateParams['jsf']) && count($templateParams['jsf'])) {
                    for ($i = 0; $i < count($templateParams['jsf']); $i++) {
                        ?>
                       <script  src="<?php echo $templateParams['jsf'][$i] ?>"  type="text/javascript"></script> 
                        <?php
                    }
                }
                ?>

                       
</body>
 
        </html>
        <?php
    }

}
