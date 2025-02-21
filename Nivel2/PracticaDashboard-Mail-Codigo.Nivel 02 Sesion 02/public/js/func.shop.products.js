$( document ).ready(function() { //una vez que todos los documentos de la pagina esten cargados realiza la funcion loadproducts
    loadShopProducts();
});

function loadShopProducts() { //funcion para listar los productos
    var data = {
        serviceType : 'load_products'
    };


    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (response) {
            renderTableShopProducts(response); //se llama a la funcion para pintar la tabla en el html
            setupEventListenersResults();
        }
    })
};

function renderTableShopProducts(resultSet) { // funcion para pintar la lista correspondiente en la vista comprar productos
    
    let html = '<table class="table table-striped mg-top-4">';
    html += '<thead><tr>';
    html += '<th class="colorThead" scope="col">Articulo</th>';
    html += '<th class="colorThead" scope="col">Descripción</th>';
    html += '<th class="colorThead" scope="col">Categoría</th>';
    html += '<th class="colorThead" scope="col">Precio</th>';
    html += '<th class="colorThead" scope="col">Unidades</th>';
    html += '<th class="colorThead" scope="col">Comprar</th>';
    html += '</tr></thead>';
    html += '<tbody>';

    for (let key in resultSet) {
        let row = resultSet[key];

        html += '<tr data-id="' + row.IDProduct + '">';
        html += `<td>${row.name}</td>`;
        html += `<td>${row.description}</td>`;
        html += `<td>${row.IDCategory}</td>`;
        html += `<td>${row.price}€</td>`;
        html += `<td><input class="tamanio-input" type="number" value="1" class="form-control"></td>`;
        html += `<td><i class="fa fa-2x fa-shopping-cart shopcart-color clickable shopCart-button" aria-hidden="true"></i></td>`;
        html += '</tr>';

    }
    html += '</tbody></table>';  
  
    document.querySelector('#renderTable-shop-products').innerHTML = html;
}

function setupEventListenersResults() {

    $(document).on('click','.shopCart-button',function() {
        var id = $(this).closest('tr').data('id');
        var quantity = Number($(this).closest('tr').find('.tamanio-input').val()); //se le hace casting a la variable dada, ya que de normal no s devolvería un string y necesitamos que sea de tipo numérico
        checkStock(id , quantity);
    })
}

function checkStock(id, quantity) {

    var data = {
        serviceType: 'load_product',
        id: id,
        quantity : quantity
    }

    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (response) {
          for (let key in response){
            let row = response[key]
            if (row.stock >= data.quantity && data.quantity > 0){ 
                var totalProduct = row.price * quantity;  
                checkCartTemp(row.IDProduct,quantity,totalProduct,row.price,row.name); 
            } else {
                alert("Cantidad de producto no disponible")
            }
          }
        }
    });
}

function checkCartTemp(id,quantity,total,price,name) {

    var data = {
        serviceType: 'check_cart_temp',
        id: id,
        quantity: quantity,
        total: total,
        price: price,
        name: name,
        operator : '-'
    }

    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (response){
            if (response.success) {
                updateStock(quantity,id,data.operator);
                Swal.fire({
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "OK"
                });
            } else {
                Swal.fire({
                    text: response.message,
                    icon: "warning",
                    confirmButtonText: "OK"
                });
            }
        }
    })
}

function updateStock(quantity,id,operator) {

    var data = {
        serviceType: 'update_stock',
        id: id,
        quantity: quantity,
        operator: operator
    }

    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (r){
            if (r.success) {
                console.log(r.message);
            } else {
                console.log(r.message);
            }
        }
    })
}

function previewShopCart() {

    var data = {
        serviceType: 'preview_shop_cart'
    }

    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (r){
            $('#modalShop').modal();
            renderTableShopCart(r);
            setupEventListenerResultsShopCart()
        }
    })
}

function setupEventListenerResultsShopCart() {
    $(".delete-button").on('click',function() {
        var id = $(this).closest('tr').data('id');
        var quantity = Number($(this).closest('tr').find('.cantidad-producto').val());
        var operator = '+';
        Swal.fire({
            text: `¿Quiere eliminar este producto de su cesta?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            if (result.value) {
                updateStock(quantity,id,operator);
                deleteProductShopCart(id);
            }
          })       
    })

    $(document).on('click', '.button-size', function() {
        let input = $(this).siblings('.cantidad-producto'); // Encuentra el input en la misma celda
        let currentValue = parseInt(input.val(), 10) || 1; // Obtiene el valor actual
    
        if ($(this).text() === '+') {
            input.val(currentValue + 1);        
        } else if ($(this).text() === '-') {
            if (currentValue > 1) { // Mínimo permitido
                input.val(currentValue - 1);
            }
        }
    });

    $(document).on("click",".button-size", function(){
        let input = $(this).siblings('.nueva-cantidad');
        let newValue = parseInt(input.val() || 1);
        let currentValue = newValue;
        if ($(this).text() === '+'){
            currentValue --
        } else {
            currentValue ++
        }

        if (newValue < 1) return;
        
        let id = $(this).closest('tr').data('id');

        console.log(currentValue,newValue,id);
        
        updateShopCart(currentValue,newValue,id);
    })
}

function renderTableShopCart(resultSet){

    let totalCompra = 0;

    let html = '<table class="table table-striped mg-top-4">';
    html += '<thead><tr>';
    html += '<th class="colorThead" scope="col">Articulo</th>';
    html += '<th class="colorThead" scope="col">Precio</th>';
    html += '<th class="colorThead" scope="col">Unidades</th>';
    html += '<th class="colorThead" scope="col">total</th>';
    html += '<th class="colorThead" scope="col">Eliminar</th>';
    html += '</tr></thead>';
    html += '<tbody>';

    for (let key in resultSet) {
        let row = resultSet[key];

        html += '<tr data-id="' + row.ID + '">';
        html += `<td>${row.name}</td>`;
        html += `<td>${row.priceUnit}</td>`;
        html += `<td class="tdContent">
                    <button class="button-size">+</button>
                    <input class="cantidad-producto input-size" value="${row.quantity}" readonly>
                    <button class="button-size">-</button>
                </td>`;
        html += `<td>${row.totalPriceProduct}</td>`;
        html += `<td><i class="fa fa-trash fa-lg delete-color clickable delete-button"></i></td>`;
        html += '</tr>';

        totalCompra += parseFloat(row.totalPriceProduct);

    }

    html += `<tr>
                <td colspan="3" class="text-right"><strong>Total de la compra:</strong></td>
                <td><strong id="totalCompra">${totalCompra.toFixed(2)}</strong>€ IVA incl.</td>
            </tr>`

    html += '</tbody></table>';  
  
    document.querySelector('#contenidoModalShop').innerHTML = html;
}

function updateShopCart(currentValue,newValue,id){

    data = {
        currentValue: currentValue,
        newValue: newValue,
        id: id,
        serviceType: 'load_product',
        operator :''
    }
   
    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (response){
            for (let key in response){
                let row = response[key]
                if ((row.stock + data.currentValue) >= data.newValue){ 
                    var totalProduct = row.price * data.newValue;
                    if(currentValue > data.newValue){
                        operator = '+';
                        updateStock(1,id,operator);
                        updateShopCartStock(id,newValue,totalProduct);
                    } else {
                        operator = '-';
                        updateStock(1,id,operator);
                        updateShopCartStock(id,newValue,totalProduct);
                    }
                } else {
                    alert("Cantidad de producto no disponible")
                }
            }
        }
    })
}

function updateShopCartStock(id,newValue,totalProduct) {

    var data = {
        id: id,
        newValue: newValue,
        totalProduct: totalProduct,
        serviceType: 'update_shop_cart_stock'
    }

    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (r) {
            if(r.success){
                console.log(r.message);
            }else {
                console.log(r.message)
            }
        }
    });
}

function deleteProductShopCart(id){

    data = {
        serviceType : 'delete_product_shop_cart',
        id: id
    }

    $.ajax({
        type: 'POST',
        url: '../app/controllers/ProductsController.php',
        data: data,
        dataType: 'json',
        success: function (r) {
            if (r.success) {
                Swal.fire({
                    text: r.message,
                    icon: "success",
                    confirmButtonText: "OK"
                });
                previewShopCart();
            } else  {
                Swal.fire({
                    text: r.message,
                    icon: "warning",
                    confirmButtonText: "OK"
                });
            }
            
        }
    });
}

function confirmPurchase(){
    var data = {
        serviceType: 'confirm_purchase',
        totalAmount : document.getElementById("totalCompra").textContent
    }
    
    if (data.totalAmount <= 0){
        alert('La cesta esta vacía')
    } else { 
        $.ajax({
            type: 'POST',
            url: '../app/controllers/ProductsController.php',
            data: data,
            dataType: 'json',
            success: function (r){
                if (r.success) {
                    Swal.fire({
                        title: r.message,
                        html: '<a href="#" id="">Pulse aquí</a> para ver detalle de compra',
                        icon: "success",
                        confirmButtonText: "OK"
                    });
                    $('#modalShop').modal('hide');
                    loadShopProducts();
                } else {
                    Swal.fire({
                        text: r.message,
                        icon: "warning",
                        confirmButtonText: "OK"
                    });
                }
            }
        })
    }

}

