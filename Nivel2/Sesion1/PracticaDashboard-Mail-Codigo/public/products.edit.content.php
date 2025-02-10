

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Producto
        <small> </small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!--    
            En esta sección cargaremos una tabla con los articulos que tengamos y de forma similar a como
            hicimos con los usuarios abriremos un modal para poder editar el registro en el que pulsemos.
            En esta ocasion tal y como vemos abajo mostraremos 2 botones , uno para editar y otro para borrar
            El borrado con confirmacion tal y como hicimos con sweetalert.
        
            TODO LO DE ABAJO ES MAQUETA , renderizar desde JavaScript
        -->
        
        <div id="renderTable-edit-products">
            

        </div>
         <!-- ventana modal en la que se mostrara la vista correspondiente una vez se pinche en el boton editar -->
        <div class="modal" id="modalEdit" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Editar producto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <span id="contenidoModalEdit"></span>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="button" id="btn-safe" class="btn btn-primary" onclick="safeEdit()">Guardar Cambios</button>
                  </div>
              </div>
          </div>
        </div>
       
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <!-- conexion con el script correspondiente con el trabajara esta vista -->
  <script src="js/func.edit.products.js" type="text/javascript"></script>
  



