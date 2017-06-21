<div class="container">
    <section class="section">
        <h2 class="text-center text-light">Anuncio Publico</h2>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1" style="border: 1px solid #E1E1E1;">
                    <form action="" class="form-horizontal" id="formAnuncio">
                        <h3 class="text-info">Busca la categoría donde verán tu anuncio</h3>
                        <div class="form-group" id="grup-categoria">
                            <label class="col-sm-3 control-label">Categoria<span>*</span></label>
                            <div class="col-sm-7">
                                <select id="categoria" class="form-control" name="categoria">
                                    <label><span>*</span></label>
                                </select>
                                <span class="help-block"></span>                               
                            </div>
                        </div>
                        <br><br>
                        <h3 class="text-info">Detalles de tu anuncio</h3>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Titulo <span>*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"  id='titulo' placeholder="Titulo del anuncio">
                                <span class="help-block"></span>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" >Descripción <span>*</span></label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="3" id='descripcion' placeholder="Descripción"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fecha Publicación</label>
                            <div class="col-sm-7">                       
                                <input type="datetime-local" class="form-control" id="fechaPublicacion" name="fechaPublicacion" placeholder="fecha" value="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <h3 class="text-info">Fotos</h3>
                        <p>¡Maximo 3 fotos!</p>
                        <div class="form-group" id="import-img">
                            <div class="custom-input-file">                        
                                <div class="vista-previa"></div>
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                            </div>                        
                            <p  class="text-muted text-center archivo" id="parrafo-img">Imagen...</p>
                            <br>

                            <div class="form-group col-xs-12 bloque-btn">
                                <a class="btn btn-default btn-import-img">Subir 
                                    <span class="glyphicon glyphicon-open"></span>
                                    <input type="file" size="1" class="input-file" accept=".jpg,.png" id="imagenes" name="imagenes[]" multiple/>
                                </a>
                                <a class="btn btn-default delete" id="borrarImg">Borrar
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>                
                            </div>
                        </div>
                        <br><br>

                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <h3 class="text-info">PDF</h3>
                        <p>¡Maximo 3 Archivos!</p>

                        <div class="custom-input-file-pdf">  
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                        </div>                        
                        <p  class="text-muted text-center archivo" id="parrafo-pdf">Archivo...</p>
                        <br>
                        <div class="form-group  col-xs-12 bloque-btn"> 
                            <div class="form-group" id="import-pdf">                            
                                <a class="btn btn-default btn-import-pdf">Subir PDF
                                    <span class="glyphicon glyphicon-open"></span>
                                    <input type="file" size="1" class="input-file" accept=".pdf" id="pdf" name="pdf[]" multiple/>
                                </a>
                                <a class="btn btn-default delete" id="borrarPdf">Borrar
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>  
                            </div>                       
                        </div>

                        <div class="form-group  col-xs-12 bloque-btn"> 
                            <!--<div class="form-group">-->
                                <!--<p class="text-center">-->
                                    <button type="button" class="btn btn-primary" id="botonEnviar">Crear
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                     </button>
                                <!--</p>-->
                            <!--</div>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

</div>