<?php
require "../config/Database.php";
require "../models/ProductsModel.php";

$params = (object) filter_input_array(INPUT_POST);
$request = new ProductsController($params);

class UsersController {
    
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
            
        }
    }
      
    /*
        Estas funciones van a llamar a las distintas consultas que tenemos en el modelo
        Estas consultas nos devuelven en caso de ser (SELECT) un resultSet que mandaremos a la
        peticion AJAX para que el js procese y renderize la vista con los resultados.
     
        En caso de ser consultas de ejecucion (INSERT , UPDATE , DELETE) devolvera informacion
        sobre si ha sido posible ejecutar la consulta sobre la base de datos.
    */
    function loadProducts() {
        $result = $this->model->_getProducts();
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
            $success = !$success;
            $message = "Error al crear el nuevo producto. $ex->message";
        }
               
        $response = array('success' => $success , 'message' => $message);
        echo json_encode($response);
    }

}


