<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form class="form-inline text-center">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Estoy buscando...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Ciudad, Provincia, Distrito...">
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg">BUSCAR</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-2">
                <div class="full-width" style="border: 1px solid #E1E1E1; border-radius: 4px; padding: 5px;">
                    <button class="btn btn-default btn-block hidden-sm hidden-md hidden-lg btn-dropdown-conatiner" data-drop-cont=".menu-commercial">
                        FILTROS <i class="fa fa-sort pull-right" aria-hidden="true"></i>
                    </button>
                    <form action="" class="full-width menu-commercial">
                        <h4 class="text-light">PRECIO</h4>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="DESDE">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="HASTA">
                        </div>
                        <br>
                        <h4 class="text-light">CATEGORÍA</h4>
                        <div class="form-group">
                            <select class="form-control">
                                <option value="">VEHÍCULOS</option>
                                <option value="">INMOBILIARIA</option>
                                <option value="">HOGAR</option>
                                <option value="">MODA Y BELLEZA</option>
                                <option value="">PARA NIÑOS Y BEBES</option>
                                <option value="">ELECTRÓNICA</option>
                                <option value="">OCIO Y DEPORTE</option>
                                <option value="">MASCOTAS Y ANIMALES</option>
                                <option value="">TRABAJO Y FORMACION</option>
                                <option value="">NEGOCIOS Y SERVICIOS</option>
                                <option value="">OTROS</option>
                            </select>
                        </div>
                        <br>
                        <h4 class="text-light">ANUNCIANTE</h4>
                        <div class="form-group">
                            <select class="form-control">
                                <option value="">Todos</option>
                                <option value="">Particular</option>
                                <option value="">Profecional</option>
                            </select>
                        </div>
                        <p class="text-center">
                            <button class="btn btn-success btn-block">APLICAR</button>
                        </p>
                        <p class="text-center">
                            <button type="reset" class="btn btn-info btn-block">BORRAR FILTROS</button>
                        </p>
                        <p>
                            <small>Anuncios segunda mano . Las mejores ofertas en de segunda mano y de ocasión solo en </small>
                        </p>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-10">
                <div class="full-width">
                    <ol class="breadcrumb">
                        <li><a href="#!">Vehículos</a></li>
                        <li><a href="#!">Marca</a></li>
                        <li class="active">Modelo</li>
                    </ol>
                </div>

                <div class="agileinfo-ads-display col-md-12">
                    <div class="wrapper">					
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                    <div>
                                        <div id="container">
                                            <div class="view-controls-list" id="viewcontrols">
                                                <label>view :</label>
                                                <a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
                                                <a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
                                            </div>
                                             <div class="sort">
                                                <div class="sort-by">
                                                    <label>Categorias: </label>
                                                    <select id="categorias">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="sort">
                                                <div class="sort-by">
                                                    <label>Sort By : </label>
                                                    <select>
                                                        <option value="">Most recent</option>
                                                        <option value="">Price: Rs Low to High</option>
                                                        <option value="">Price: Rs High to Low</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <ul id="listar" class="list">                                        



                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                    </div>                           
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>              
            </div>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
              <nav class="text-center">
                                <ul class="pagination pagination-sm">
                                
                                </ul>
                   </nav>
        </div>
    </div>    
</div> 
</section>


<!--<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>-->-->