$( document ).ready(function() { //una vez que todos los documentos de la pagina esten cargados realiza la funcion loadproducts
    loadProducts();
});

function loadProducts() { //funcion para listar los productos
    var data = {
        serviceType : 'load_products'
    };


    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (response) {
            renderTableProducts(response); //se llama a la funcion para pintar la tabla en el html
        }
    })
};

function renderTableProducts(resultSet) { //funcion que pinta la tabla en el html
    
    let html = '<table class="table table-striped mg-top-4">';
    html += '<thead><tr>';
    html += '<th scope="col">Id</th>';
    html += '<th scope="col">Nombre</th>';
    html += '<th scope="col">Descripción</th>';
    html += '<th scope="col">Categoría</th>';
    html += '<th scope="col">Precio</th>';
    html += '<th scope="col">Stock</th>';
    html += '</tr></thead>';
    html += '<tbody>';

    for (let key in resultSet) {
        let row = resultSet[key];

        let categoryName ="";
        if (row.IDCategory == 1) {categoryName = "Videojuegos"}
        else if (row.IDCategory == 2) {categoryName = "Peliculas"}
        else if (row.IDCategory == 3) {categoryName = "Ropa"}
        else if(row.IDCategory == 4) {categoryName = "Alimentación"};

        html += '<tr data-id="' + row.IDProduct + '">';
        html += `<td>${row.IDProduct}</td>`;
        html += `<td>${row.name}</td>`;
        html += `<td>${row.description}</td>`;
        html += `<td>${categoryName}</td>`;
        html += `<td>${row.price}</td>`;
        html += `<td>${row.stock}</td>`;
        html += '</tr>';
    }
    html += '</tbody></table>';  
 
   
    document.querySelector('#renderTable-stock-products').innerHTML = html;
}
