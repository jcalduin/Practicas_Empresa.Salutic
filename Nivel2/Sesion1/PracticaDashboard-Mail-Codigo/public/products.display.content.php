 <!-- VISTA DONDE SE LISTAN LOS PROTUCTOS CONTIENE UN div con id="renderTable-stock-products que genera una tabla llamando al
  archivo js correspondiente -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Productos
        <small> </small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!--    
            Esta es la sección principal donde renderizaremos los registros que nos traigamos de BD
            La tabla de abajo es de ejemplo , deberemos borrarla de aqui y renderizarla desde fun.list.products.js como siempre
        -->
        <div id="renderTable-stock-products">
            
            
        </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <!-- se enlaza el script correspondiente con el cual trabajar nuestra página -->
  <script src="js/func.list.products.js" type="text/javascript"></script>
