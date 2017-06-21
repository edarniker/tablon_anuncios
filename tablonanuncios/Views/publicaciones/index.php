<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form class="form-inline text-center">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="input-buscar" placeholder="Estoy buscando...">
                    </div>

                    <div class="form-group">
                        <select id="categorias-buscar" class="form-control input-lg">
                            <option value=""></option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg" id="buscar">BUSCAR</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-sm-10 col-md-12">
                <div class="full-width">
                    <ol class="breadcrumb">
                        <li><a href=""><?php echo $templateParams['controlador'] ?></a></li>
                        <li class="active"><a href=""><?php echo $templateParams['metodo'] ?></a></li>

                    </ol>
                </div>

                <div class="agileinfo-ads-display col-xs-12 col-sm-10 col-md-12">
                    <div class="wrapper">					
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">


                                    <div class="view-controls-list" id="viewcontrols">
                                        <label>view :</label>
                                        <a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
                                        <a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
                                    </div>

                                    <div class="sort">
                                        <div class="sort-by" id="sel-categoria">
                                            <label>Categorias: </label>
                                            <select id="categorias">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="sort">
                                        <div class="sort-by" id="sel-fecha">
                                            <label>Ordenar Por : </label>
                                            <select id="ordenar">
                                                <option value="fechaReciente">Fecha mas reciente</option>
                                                <option value="fechaAntigua">Fecha mas antigua</option>
                                                <option value="titulo">Titulo</option>
                                                <option value="nombre">Nombre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="sort">
                                        <div class="sort-by" id="sel-jornadas">

                                        </div>
                                    </div>
                                    <div class="sort">
                                        <div class="sort-by" id="sel-subcategoria">

                                        </div>
                                    </div>



                                    <div class="clearfix"></div>







                                </div>


                            </div>
                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                            <div id="container">
                                <div class="tab-content">
                                    <div class="col-xs-12 col-sm-9 col-md-12  tab-pane fade in active" id="anuncios" aria-labelledby="home-tab">

                                        <ul id="listar" class="list">                                        



                                            <div class="clearfix"></div>
                                        </ul>
                                    </div>


                                </div>
                            </div>

                        </div>
                <nav class="text-center">
                    <ul class="pagination pagination-sm">

                    </ul>
                </nav>

                    </div>
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
</script>-->