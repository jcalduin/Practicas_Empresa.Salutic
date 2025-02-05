

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
            
            <table class="table table-hover">
                <thead>
                  <tr class="table-active-main">
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Call Of Duty Black OPS 4</td>
                    <td>Juego de disparos y tal...</td>
                    <td>55.95</td>
                    <td>12</td>
                    <td class="txt-center"><i class="fa fa-edit fa-lg edit-color clickable"></i></td>
                    <td class="txt-center"><i class="fa fa-trash fa-lg delete-color clickable"></i></td>
                  </tr>
                  <tr>
                    <td>Interstellar</td>
                    <td>Pelicula de viajes interdimensionales y mas cosas...</td>
                    <td>17.95</td>
                    <td>4</td>
                    <td class="txt-center"><i class="fa fa-edit fa-lg edit-color clickable"></i></td>
                    <td class="txt-center"><i class="fa fa-trash fa-lg delete-color clickable"></i></td>
                  </tr>
                  <tr>
                    <td>TYR - By the Light of the Northern Star</td>
                    <td>Musica folk noruega de pachangueo...</td>
                    <td>11.95</td>
                    <td>7</td>
                    <td class="txt-center"><i class="fa fa-edit fa-lg edit-color clickable"></i></td>
                    <td class="txt-center"><i class="fa fa-trash fa-lg delete-color clickable"></i></td>
                  </tr>
                </tbody>
             </table>
        </div>
       
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="js/func.edit.products.js" type="text/javascript"></script>
  



