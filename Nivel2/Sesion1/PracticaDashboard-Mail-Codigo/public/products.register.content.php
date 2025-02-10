  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registrar nuevo Producto
        <small> </small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!--    
            En esta sección tendremos un formulario desde el cual podremos insertar nuevos articulos
            El formulario de abajo es el que usaremos para insertar un nuevo producto , deberemos como siempre
            crear el evento para el boton de registrar producto. Lo unico diferente es que el select para escoger categoria deberemos 
            rellenarlo desde Javascript. Para esto en la funcion cargarSelectores de func.edit.products.js lanzaremos una peticion AJAX
            pidiendo todos los datos de la tabla categoria y con el resultado haremos un innerHTML al select
        -->
        
        <form>
            
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                      <label for="txt_insert_nombre">Nombre*</label>
                      <input type="text" class="form-control" id="txt_insert_nombre" >
                    </div>
                </div>
                    <div class="col-md-3">
                        <label for="sel_insert_categoria">Categoria*</label>
                        <select class="form-control" id="sel_insert_categoria">
                                            
                        </select>
                    </div>
            </div>
            
            <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                          <label for="txt_insert_descripcion">Descripcion</label>
                          <input type="text" class="form-control" id="txt_insert_descripcion">
                        </div>
                    </div>
            </div>
            
            <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="txt_insert_precio">Precio*</label>
                          <input type="text" class="form-control" id="txt_insert_precio">
                        </div>
                </div>
                <div class="col-md-2">
                        <div class="form-group">
                          <label for="txt_insert_stock">Stock*</label>
                          <input type="number" class="form-control" id="txt_insert_stock">
                        </div>
                </div>
            </div>
            
            
          <input type="button" class="btn btn-primary"  id="" value="Registrar nuevo Producto" onclick="registerProduct()">
        </form>
       
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="js/func.edit.products.js" type="text/javascript"></script>
  



