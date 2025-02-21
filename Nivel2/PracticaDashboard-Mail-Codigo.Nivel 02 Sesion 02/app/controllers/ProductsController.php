<?php
require "../config/Database.php";
require "../models/ProductsModel.php";

$params = (object) filter_input_array(INPUT_POST);
$request = new ProductsController($params);

class ProductsController {
    
    private $db , $model , $params;
    
    function __construct($params) {
        $this->db = new Database();
        $this->db->_connect();
        
        $this->model = new ProductsModel($this->db);
        $this->params = $params;
        
        $this->initRequest();
    }
    
    function initRequest() {
        switch($this->params->serviceType){
            case 'load_products' :
                $this->loadProducts();
            break;
            case 'register_product' :
                $this->registerProduct();
            break;
            case 'get_category_data' :
                $this->getCategoryProducts();
            break;
            case 'load_product' :
                $this->loadProduct();
            break;
            case 'safe_product' :
                $this->safeProduct();
            break;
            case 'delete_product' :
                $this->deleteProduct();
            break;
            case 'check_cart_temp' :
                $this->checkCartTemp();
            break;
            case 'update_stock' :
                $this->updateStock();
            break;
            case 'preview_shop_cart' :
                $this->previewShopCart();
            break;
            case 'confirm_purchase' :
                $this->confirmPurchase();
            break;
            case 'delete_product_shop_cart' :
                $this->deleteProductShopCart();
            break;
            case 'update_shop_cart_stock' :
                $this->updateShopCartStock();
            break;
        }
    }
      
    function loadProducts() {
        $result = $this->model->_getProducts();
        $res_arr = $this->db->processResult($result);
            
        echo json_encode($res_arr);
    }

    function loadProduct() {
        $result = $this->model->_getProduct($this->params);
        $res_arr = $this->db->processResult($result);
            
        echo json_encode($res_arr);
    }

    function getCategoryProducts() {
        $result = $this->model->_getCategoryProducts();
        $res_arr = $this->db->processResult($result);

        echo json_encode($res_arr);
    }
    
    function registerProduct() {
        $success = true;
        $message = 'Producto creado correctamente';
        
        try {
            
            $result = $this->model->_insNewProduct($this->params);
            if($result === false) { throw new Exception; }

        } catch(Exception $ex){
            $success = false;
            $message = "Error al crear el nuevo producto.";
        }
               
        $response = array('success' => $success , 'message' => $message);
        echo json_encode($response);
    }

    function safeProduct() {
        $success =  true;
        $message = 'Datos modificados correctamente';

        try {
            $result = $this->model->_updateProduct($this->params);
            if ($result === false) { throw new Exception; }

        } catch (Exception $ex) {
            $success = false;
            $message = 'Error al modificar el producto';
        }

        $response = array('success' => $success , 'message' => $message);
        echo json_encode($response);
    }

    function deleteProduct() {        
        $success =  true;
        $message = 'Producto eliminado correctamente';

        try {
            $result = $this->model->_deleteProduct($this->params);
            if ($result === false) { throw new Exception; }

        } catch (Exception $ex) {
            $success = false;
            $message = 'No se pudo eliminar el producto';
        }

        $response = array('success' => $success , 'message' => $message);
        echo json_encode($response);
    }

    function checkCartTemp() {
        $success = true;
        $message = 'Se agrego el producto al carrito';

        $result = $this->model->_checkCartTemp($this->params);
        $res_arr = $this->db->processResult($result);

            try { 
                if($res_arr[0]->existe > 0) {
                $result = $this->model->_updateCartTemp($this->params);
                if ($result === false) { throw new Exception ('Error al modificar el producto del carrito '); }
                } else {
                    $result = $this->model->_insCartTemp($this->params);
                    if ($result === false) { throw new Exception ('Error al agregar el producto al carrito'); }
                }
    
            } catch (Exception $ex) {
                $success = false;
                $message= $ex->getMessage();
            }

        $response = array('success' => $success, 'message' => $message);
        echo json_encode($response);
    }

    function updateStock(){
        $success = true;
        $message = 'Se actualizo la tabla productos';

        try {
            $result = $this->model->_updateStock($this->params);
            if ($result === false) { throw new Exception; }

        } catch (Exception $ex) {
            $success = false;
            $message = 'Error al actualizar la tabla producto';
        }

        $response = array('success' => $success, 'message' => $message);
        echo json_encode($response);
    }

    function previewShopCart() {

        $result = $this->model->_previewShopCart();
        $res_arr = $this->db->processResult($result);
            
        echo json_encode($res_arr);
    }

    function deleteProductShopCart() {
        $success =  true;
        $message = 'Producto se ha eliminado de la cesta';

        try {
            $result = $this->model->_deleteProductShopCart($this->params);
            if ($result === false) { throw new Exception; }

        } catch (Exception $ex) {
            $success = false;
            $message = 'No se pudo eliminar el producto';
        }

        $response = array('success' => $success , 'message' => $message);
        echo json_encode($response);
    }

    function confirmPurchase(){
        $success = true;
        $message = 'Compra realizada con exito';
        
        try {

            $totalPrice = (float) $this->db->processResult($this->model->_getTotalPrice())[0]->totalPriceAmount;
    
            $result = $this->model->_insNewTicket($totalPrice);
            if($result === false) { throw new Exception ("Error al insertar el nuevo ticket");}

            $ticketID = (int) $this->db->processResult($this->model->_getLastTicketID())[0]->IDTicket;
           
            $result = $this->model->_insNewTicketDetails($ticketID);
            if($result === false) {throw new Exception("Error al insertar en ticketsdetails");}; 

            $this->model->_clearShopCartTemp();

        } catch(Exception $ex){
            $success = false;
            $message = $ex->getMessage();
        }

        $response = array('success' => $success , 'message' => $message);
        echo json_encode($response);
    }

    function updateShopCartStock() {
        $success = true;
        $message = 'Se actualizo la tabla temporal';

        try {
            $result = $this->model->_updateShopCartStock($this->params);
            if ($result === false) { throw new Exception; }

        } catch (Exception $ex) {
            $success = false;
            $message = 'Error al actualizar la tabla temporal';
        }

        $response = array('success' => $success, 'message' => $message);
        echo json_encode($response);
    }

}


