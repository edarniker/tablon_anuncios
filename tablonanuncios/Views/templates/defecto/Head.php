<?php

namespace Views\templates\defecto;

Class Head {

//    public function __construct() {
//        pintar();
//    }




    public static function pintar($templateParams, $templateParamsP, $titulo) {
        ?>

        <!DOCTYPE html>
        <html>
            <head>  
                <title><?php if (isset($titulo)) echo $titulo; ?></title>
                <meta http-equiv="Content-type" content="text/html charset=utf-8" />

                <link href="<?php echo $templateParamsP['ruta_css'] ?>jquery-ui.theme.css" rel="stylesheet" type="text/css" media="all" /> 
                <link href="<?php echo $templateParamsP['ruta_css'] ?>jquery-ui.css" rel="stylesheet" type="text/css" media="all" /> 
                <link href="<?php echo $templateParamsP['ruta_css'] ?>bootstrap.min.css" rel="stylesheet" type="text/css" media="all" /> 
                <link href="<?php echo $templateParamsP['ruta_css'] ?>alertify.core.css" rel="stylesheet" type="text/css" media="all" />
                <link href="<?php echo $templateParamsP['ruta_css'] ?>alertify.default.css" rel="stylesheet" type="text/css" media="all" />
                <link href="<?php echo $templateParamsP['ruta_css'] ?>style5.css" rel="stylesheet" type="text/css" media="all" />
                <link href="<?php echo $templateParamsP['ruta_css'] ?>style6.css" rel="stylesheet" type="text/css" media="all" /> 
                <link href="<?php echo $templateParamsP['ruta_css'] ?>custom.css" rel="stylesheet" type="text/css" media="all" /> 
                <link href="<?php echo $templateParamsP['ruta_css'] ?>font-awesome.min.css" rel="stylesheet" type="text/css" media="all" /> 
                  <!--<link href="<?php echo $templateParamsP['ruta_css'] ?>flexslider.css" rel="stylesheet" type="text/css" media="all" />--> 
                <link href="<?php echo $templateParams['ruta_css'] ?>style.css" rel="stylesheet" type="text/css" media="all" /> 
                <?php
                if (isset($templateParams['css']) && count($templateParams['css'])) {
                    for ($i = 0; $i < count($templateParams['css']); $i++) {
                        ?>
                        <link href="<?php echo $templateParams['css'][$i] ?>"  rel="stylesheet" type="text/css" media="all" /> 
                        <?php
                    }
                }
                ?>             

                <script defer src="<?php echo $templateParamsP['ruta_js'] ?>jquery.js"  type="text/javascript"></script>
                <script defer src="<?php echo $templateParamsP['ruta_js'] ?>jquery-ui.js"  type="text/javascript"></script>
                <script defer src="<?php echo $templateParamsP['ruta_js'] ?>bootstrap.js"  type="text/javascript"></script>
                <script defer src="<?php echo $templateParamsP['ruta_js'] ?>alertify.js"  type="text/javascript"></script>
                <script defer src="<?php echo $templateParams['ruta_js'] ?>ajax.js"  type="text/javascript"></script>            
                <!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
                <?php
                if (isset($templateParams['jsD']) && count($templateParams['jsD'])) {
                    for ($i = 0; $i < count($templateParams['jsD']); $i++) {
                        ?>
                        <script defer src="<?php echo $templateParams['jsD'][$i] ?>"  type="text/javascript"></script> 
                        <?php
                    }
                }
                if (isset($templateParams['js']) && count($templateParams['js'])) {
                    for ($i = 0; $i < count($templateParams['js']); $i++) {
                        ?>
                        <script defer src="<?php echo $templateParams['js'][$i] ?>"  type="text/javascript"></script> 
                        <?php
                    }
                }
                ?>


            </head>	

            <?php
        }

    }
    