<?php

class ProductsModel {
    
    // Estos 2 parametros los tendremos que configurar segun la tabla que hallamos creado
    private $table = "products";
    private $fields = array(
        "IDProduct","name","description","IDCategory","price","stock"
    );
    
    private $db_instance;   
    function __construct($db_instance = null) {
        $this->db_instance = $db_instance;
    }
    
    function _getProducts() {
        if(!isset($this->db_instance)){ return null;}
        
        $sql = "SELECT * FROM $this->table";  
        $resultSet = $this->db_instance->getSQL($sql);
        return $resultSet;
    }

    function _getProduct($params){
        if(!isset($this->db_instance)){ return null;}

        $sql = "SELECT * FROM $this->table WHERE IDProduct = $params->id";
        $resultSet = $this->db_instance->getSQL($sql);
        return $resultSet;
    }

    function _getCategoryProducts() {
        if(!isset($this->db_instance)){ return null; }

        $sql = "SELECT * FROM categories";
        $resultSet = $this->db_instance->getSQL($sql);

        return $resultSet;
    }
    
    function _insNewProduct($params) {
        if(!isset($this->db_instance)){ return null; }

        

        $sql = "INSERT INTO {$this->table} (".implode(",",$this->fields).")";
        $sql .= "VALUES (null,'$params->nombre','$params->descripcion',$params->categoria,$params->precio,$params->stock)";


        return $this->db_instance->execSQL($sql);
    }

    function _updateProduct($params) {
        if(!isset($this->db_instance)){ return null; }

        $sql = "UPDATE {$this->table} SET name = '$params->editName' , 
                                            description = '$params->editDescription' ,
                                            price = $params->editPrice,
                                            stock = $params->editStock WHERE IDProduct = $params->editIDProduct";

        
        return $this->db_instance->execSQL($sql);
    }

    function _deleteProduct($params) {
        if (!isset($this->db_instance)) {return null;}

        $sql = "DELETE FROM $this->table WHERE IDProduct = $params->id";
        $resultSet = $this->db_instance->execSQL($sql);
        return $resultSet;
    }

    function _checkCartTemp($params){

        if(!isset($this->db_instance)){ return null;}

        $sql = "SELECT COUNT(*) AS existe FROM shopcarttemp WHERE ID = $params->id";
        $resultSet = $this->db_instance->getSQL($sql);

        return $resultSet;
    }

    function _updateCartTemp($params){

        if(!isset($this->db_instance)){ return null;}

        $sql="UPDATE shopcarttemp SET quantity = quantity + $params->quantity ,
                                        totalPriceProduct = totalPriceProduct + $params->total WHERE ID = $params->id";  
                        
        return $this->db_instance->execSQL($sql);
    }

    function _insCartTemp($params) {

        if(!isset($this->db_instance)){ return null; }

        $sql= "INSERT INTO shopcarttemp (ID,name,priceUnit,quantity,totalPriceProduct) VALUES ($params->id,'$params->name',$params->price,$params->quantity,$params->total)";

        return $this->db_instance->execSQL($sql);
    }

    function _updateStock($params) {

        if(!isset($this->db_instance)){ return null;}

        $sql="UPDATE {$this->table} SET stock = stock $params->operator $params->quantity WHERE IDProduct = $params->id";

        return $this->db_instance->execSQL($sql);
    }

    function _previewShopCart() {

        if(!isset($this->db_instance)){ return null;}
        
        $sql = "SELECT * FROM shopcarttemp";  
        $resultSet = $this->db_instance->getSQL($sql);
        return $resultSet;
    }

    function _deleteProductShopCart($params){
        if (!isset($this->db_instance)) {return null;}

        $sql = "DELETE FROM shopcarttemp WHERE ID = $params->id";
        $resultSet = $this->db_instance->execSQL($sql);
        return $resultSet;
    }

    function _getTotalPrice(){

        if(!isset($this->db_instance)){ return null;}

        $sql="SELECT SUM(totalPriceProduct) AS totalPriceAmount FROM shopcarttemp";
        $resultSet = $this->db_instance->getSQL($sql);
        
        return $resultSet;
    }

    function _insNewTicket($totalPrice) {

        if(!isset($this->db_instance)){ return null; }

        $sql= "INSERT INTO tickets (IDTicket,amount) VALUES (null,$totalPrice)";

        return $this->db_instance->execSQL($sql);
    }

    function _getLastTicketID() {

        if(!isset($this->db_instance)){ return null; }

        $sql = "SELECT IDTicket FROM tickets ORDER BY IDTicket DESC LIMIT 1";
        $resultSet = $this->db_instance->getSQL($sql);
        
        return $resultSet;
    }

    function _insNewTicketDetails($ticketID) {
        if(!isset($this->db_instance)){ return null; }

        $sql = "INSERT INTO ticketdetails (IDTicket,IDProduct,product_quantity,amount) 
                    SELECT $ticketID,ID,quantity,totalPriceProduct FROM shopcarttemp";
        
        return $this->db_instance->execSQL($sql);
    }

    function _clearShopCartTemp() {

        if(!isset($this->db_instance)){ return null; }

        $sql = "DELETE FROM shopcarttemp";
        
        $resultSet = $this->db_instance->execSQL($sql);
        return $resultSet;
    }

    function _updateShopCartStock($params){
        if(!isset($this->db_instance)){ return null;}

        $sql="UPDATE shopcarttemp SET quantity = $params->newValue ,
                                        totalPriceProduct = $params->totalProduct WHERE ID = $params->id";  
                        
        return $this->db_instance->execSQL($sql);
    }
}

