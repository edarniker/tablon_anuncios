<div class="container">
    <section class="section">
        <h2 class="text-center text-light">Agregar Listado Alumnos</h2>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1" style="border: 1px solid #E1E1E1;">
                    <form action="" class="form-horizontal" id="formListado"  enctype="multipart/form-data" method="post">
                        <h3 class="text-info">Los datos deben de estar en formato CSV</h3>                                        
                        
                      

                        <div class="custom-input-file-pdf">  
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                        </div>                        
                        <p  class="text-muted text-center archivo" id="parrafo-pdf">Archivo...</p>
                        <br>
                        <div class="form-group" id="import-file">                            
                            <a class="btn btn-default btn-import-pdf">Subir CSV
                                <span class="glyphicon glyphicon-open"></span>
                                <input type="file" size="1" class="input-file" accept=".csv" id="file" name="file"/>
                                <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
                            </a>
                             
                        </div> 
                        <div class="form-group">
                            <p class="text-center">
                                <button type="button" class="btn btn-default" id="guardar">Guardar</button>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>

</div>