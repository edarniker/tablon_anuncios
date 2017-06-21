<?php

namespace Views\templates\defecto;

class NavPublico {

    public static function pintar($templateParams) {
        ?>


        <div>
            <nav class="navbar navbar-default yamm">
                <div class="container-full">  
                      <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <?php
                            if (isset($templateParams['nav'])) {
                                $con = 0;
                                for ($i = 0; $i < count($templateParams['nav']); $i++) {
                                    if (isset($templateParams['nav'][$i]['sub'])) {
                                        ?>
                                        <li class="dropdown yamm-fw">
                                        <li class="dropdown hasmenu"> <a href="<?php echo $templateParams['nav'][$i]['enlace']; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $templateParams['nav'][$i]['titulo'] ?><span class="fa fa-angle-down"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <?php
                                                for ($k = 0; $k < count($templateParams['subNav'][$con]); $k++) {
                                                    ?>
                                                    <li><a href="<?php echo $templateParams['subNav'][$con][$k]['enlace']; ?>"><?php echo $templateParams['subNav'][$con][$k]['titulo'] ?></a></li>
                                                    <?php
                                                }
                                                $con++;
                                                ?>
                                            </ul>




                                            <?php
                                        } else {
                                            ?>
                                        <li><a href="<?php echo $templateParams['nav'][$i]['enlace']; ?>"><?php echo $templateParams['nav'][$i]['titulo'] ?></a></li>
                                        <?php
                                    }
                                }
                            }
                            ?>                                 

                        </li>
                            </li>

                        </ul>

                    </div>


                </div>

            </nav>

        </div>
        </div>


        <?php
    }

}
