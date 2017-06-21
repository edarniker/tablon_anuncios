<?php

namespace Views\templates\defecto;

use Config\Session;

class Header {

    public static function pintarTitulo() {
        ?>
        <body>

            <div class="container">
                <div class="header">
                    <div class="header-left">
                        <div class="logo">
                            <a href="index">
                                <h6>TABLÓN DE ANUNCIOS</h6>
                                <h1>IES<span> ALBARREGAS</span></h1>
                            </a>
                        </div>
                    </div>
                    <?php
                }

                public static function pintarLogin() {
                    ?>   

                    <!--                <div class="social-icons">
                                        <li><a href="#"><i class="twitter"></i></a></li>
                                        <li><a href="#"><i class="facebook"></i></a></li>
                                        <li><a href="#"><i class="rss"></i></a></li>
                                        <li><div class="facebook"><div id="fb-root"></div>
                    
                                                <div id="fb-root"></div>
                                            </div></li>
                                        <script>(function (d, s, id) {
                                                var js, fjs = d.getElementsByTagName(s)[0];
                                                if (d.getElementById(id))
                                                    return;
                                                js = d.createElement(s);
                                                js.id = id;
                                                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                                                fjs.parentNode.insertBefore(js, fjs);
                                                                                        }(document, 'script', 'facebook-jssdk'));</script>
                    
                                        <div class="fb-like" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                    
                    
                                    </div>-->
                    <div class="clearfix"></div>
                    <div class="header-right">
                        <div class="top-menu">
                            <ul>      



                                <li><a href="#login"  data-title="login" data-toggle="modal" data-target="#login">Login</a> </li>
                                <!--
                                                            </ul>-->
                        </div>
                        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                        <h4 class="modal-title custom_align" id="Heading">LOGIN</h4>
                                    </div>
                                    <div class="modal-body">

                                                                                                                                                <!--<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>-->

                                        <div class="user_login">
                                            <form>
                                                <label>Usuario</label>
                                                <input id="mail" type="text" />
                                                <br />

                                                <label>Password</label>
                                                <input id="contrasena" type="password" />
                                                <br />



                                                <div class="action_btns">                                                              
                                                    <div class="one_half"><a id="botonLogin" class="btn btn_red">Login</a></div>
                                                    <div class="one_half last"><a href="#registre"  data-title="registre" data-toggle="modal" data-target="#registre" class="btn" id="btnRegistre">Registrarse</a></div>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                    <div class="modal-footer ">
                                        <a href="#" class="forgot_password">Olvido Contraseña?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="registre"  class="user_register" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                        <h4 class="modal-title custom_align" id="Heading">REGISTRARSE</h4>
                                    </div>
                                    <div class="modal-body">

                                                                                                                                                <!--<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>-->

                                        <div class="user_login">

                                            <form>
                                                <label>DNI</label>
                                                <input id="dni" type="dni"/>
                                                <br />

                                                <label>Email</label>
                                                <input id="register-mail" type="email" />
                                                <br />

                                                <label>Password</label>
                                                <input id="register-contrasena" type="password" />
                                                <br />



                                                <div class="action_btns">
                                                    <div class="one_half"><a href="#" class="btn back_btn" id="btnVolver"  data-title="login" data-toggle="modal" data-target="#login"><i class="fa fa-angle-double-left" ></i> Volver</a></div>
                                                    <div class="one_half last"><a href="#" class="btn btn_red" id="btnEnviar" >Enviar</a></div>
                                                </div>
                                            </form>



                                        </div>
                                    </div>
                                    <div class="modal-footer ">
                                        <a href="#" class="forgot_password">Olvido Contraseña?</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

















                    <!--                        <div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-labelledby="subcribe" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                            <h4 class="modal-title custom_align" id="Heading">SUBSCRIBETE</h4>
                                                        </div>
                                                        <div class="modal-body">
                    
                    
                                                            <div class="signup">
                                                                <h3>Subscribe</h3>
                                                                <h4>Enter Your Valid E-mail</h4>
                                                                <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                            this.value = '';
                                                                        }" />
                                                                <div class="clearfix"></div>
                                                                <input type="submit"  value="Subscribe Now"/>
                                                            </div>
                    
                    
                                                                                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                    
                    
                    
                                                        </div>
                                                        <div class="modal-footer ">
                                                            <a href="#" class="forgot_password">Olvido Contraseña?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->


                    <!--                        <div class="search">
                                                <form>
                                                    <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                this.value = '';
                                                            }"/>
                                                    <input type="submit" value="">
                                                </form>
                                            </div>-->
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>






        </div>


        <?php
    }

    public static function salir() {
        ?>   
        <div class="clearfix"></div>
        <div class="header-right">
            <div class="top-menu">
                <!--<div id="cerrar_seccion">-->
                    <div>




                        <?php
                        echo '<span class="usuario">Conectado ' . Session::get('nombre') . " " . Session::get('primer_apellido') . '<span>';
                        ?>                          
                        <a href="<?php echo BASE_URL ?>login/cerrar">Salir</a>

                    <!--</div>-->
                </div>




            </div>










        </div>
        </div>

        </div>
        <?php
    }

}
