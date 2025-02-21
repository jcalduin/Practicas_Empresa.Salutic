  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Comprar Productos
        <small> </small>
        <span class="pull-right"><input type="button" class="btn btn-primary" id="" value="Finalizar compra" onclick="previewShopCart()"></span>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!--    
            Esta es la sección principal donde renderizaremos los registros que nos traigamos de BD
            La tabla de abajo es de ejemplo , deberemos borrarla de aqui y renderizarla desde fun.list.products.js como siempre
        -->

      <div id="renderTable-shop-products">

      </div>

      <div class="modal fade" id="modalShop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Resumen de compra</h4>
            </div>
            <div class="modal-body">
              <span id="contenidoModalShop"></span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" >Seguir comprando</button>
              <button type="button" id="btn-safe" class="btn btn-primary" onclick="confirmPurchase()">Confirmar compra</button>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="js/func.shop.products.js" type="text/javascript"></script>