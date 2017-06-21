<div class="container">
    <h2>Anuncios Alumnos Autorizar</h2>
    <div class="row">

        <section class="content">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="container">
                        <div class="row col-md-12  custyle">

                            <div class="agileinfo-ads-display col-md-12">
                                <div class="wrapper">					
                                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                                <div>
                                                    <div id="container">                                         

                                                        <div class="sort">
                                                            <div class="sort-by" id="sel-categoria">
                                                                <label>Categorias: </label>
                                                                <select id="categorias">
                                                                    <option value=0></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="sort">
                                                            <div class="sort-by" id="sel-fecha">
                                                                <label>Ordenar Por : </label>
                                                                <select id="ordenar">
                                                                    <option value="fechaReciente">Fecha mas reciente</option>
                                                                    <option value="fechaAntigua">Fecha mas antigua</option>
                                                                    <option value="fechaPublica">Fecha publicar</option>
                                                                    <option value="titulo">Titulo</option>
                                                                    <option value="nombre">Nombre</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="sort">
                                                            <div class="sort-by" id="sel-subcategoria">

                                                            </div>
                                                        </div>



                                                        <div class="clearfix"></div>


                                                    </div>                                         
                                                </div>                                    
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <table id="listar" class="table table-striped custab">
                                <thead>

                                    <tr>
                                        <th>Nº</th>
                                        <th>Titulo</th>
                                        <th>Descripción</th>
                                        <th>Nombre Alumno</th>
                                        <th>Apellido</th>
                                        <th>Curso</th>
                                        <th>Categoria</th>
                                        <th>Fecha Creación</th>


                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<!--                                <tr>
                                    <td>1</td>
                                    <td>News</td>
                                    <td>News Cate</td>
                                    <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Products</td>
                                    <td>Main Products</td>
                                    <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Blogs</td>
                                    <td>Parent Blogs</td>
                                    <td class="text-center"><a class='btn btn-info btn-xs' id="prueba" href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
                                </tr>-->
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <nav class="text-center">
                    <ul class="pagination pagination-sm">

                    </ul>
                </nav>

                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <h4 class="modal-title custom_align" id="Heading">Eliminar Anuncio</h4>
                            </div>
                            <div class="modal-body">

                                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Desea eliminar el anuncio?</div>

                            </div>
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-success btnEliminar" value=""><span class="glyphicon glyphicon-ok-sign"></span>Si</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </div>
                        </div>
                        </section>

                    </div>
                </div>