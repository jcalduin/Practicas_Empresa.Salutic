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
    
}


