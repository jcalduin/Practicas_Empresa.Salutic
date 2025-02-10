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
}

