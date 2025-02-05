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
            
            <table class="table table-hover">
                <thead>
                  <tr class="table-active-main">
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Call Of Duty Black OPS 4</td>
                    <td>Juego de disparos y tal...</td>
                    <td>Videojuegos</td>
                    <td>55.95</td>
                    <td>12</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Interstellar</td>
                    <td>Pelicula de viajes interdimensionales y mas cosas...</td>
                    <td>Peliculas</td>
                    <td>17.95</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>TYR - By the Light of the Northern Star</td>
                    <td>Musica folk noruega de pachangueo...</td>
                    <td>Musica</td>
                    <td>11.95</td>
                    <td>7</td>
                  </tr>
                </tbody>
             </table>
        </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="js/func.list.products.js" type="text/javascript"></script>
  

