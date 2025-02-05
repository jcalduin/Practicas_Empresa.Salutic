  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Comprar Productos
        <small> </small>
        <span class="pull-right"><input type="button" class="btn btn-primary"  id="" value="Finalizar compra"></span>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!--    
            Esta es la sección principal donde renderizaremos los registros que nos traigamos de BD
            La tabla de abajo es de ejemplo , deberemos borrarla de aqui y renderizarla desde fun.list.products.js como siempre
        -->
        <div id="renderTable-stock-products">
            
            <table class="table table-hover">
                <thead>
                  <tr class="table-active-main">
                    <th scope="col">Articulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Comprar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Call Of Duty Black OPS 4</th>
                    <td>Juego de disparos y tal...</td>
                    <td>Videojuegos</td>
                    <td>55.95</td>
                    <td><input type="number" min="0" value="1"/></td>
                    <td class="text-center"><i class="fa fa-2x fa-shopping-cart shopcart-color" aria-hidden="true"></i></td>
                  </tr>
                  <tr>
                    <th scope="row">Interstellar</th>
                    <td>Pelicula de viajes interdimensionales y mas cosas...</td>
                    <td>Peliculas</td>
                    <td>17.95</td>
                    <td><input type="number" min="0" value="1"/></td>
                    <td class="text-center"><i class="fa fa-2x fa-shopping-cart shopcart-color" aria-hidden="true"></i></td>
                  </tr>
                  <tr>
                    <th scope="row">TYR - By the Light of the Northern Star</th>
                    <td>Musica folk noruega de pachangueo...</td>
                    <td>Musica</td>
                    <td>11.95</td>
                    <td><input type="number" min="0" value="1"/></td>
                    <td class="text-center"><i class="fa fa-2x fa-shopping-cart shopcart-color" aria-hidden="true"></i></td>
                  </tr>
                </tbody>
             </table>
        </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="js/func.list.products.js" type="text/javascript"></script>
  

