<?php

class ProductsModel {
    
    // Estos 2 parametros los tendremos que configurar segun la tabla que hallamos creado
    private $table = "";
    private $fields = array(
        
    );
    
    private $db_instance;   
    function __construct($db_instance = null) {
        $this->db_instance = $db_instance;
    }
    
    function _getProducts() {
        if(!isset($this->db_instance)){ return null; }
        
        $sql = "SELECT * FROM $this->table";  
        return $this->db_instance->getSQL($sql);
    }
    
    function _insNewProduct($params) {
        if(!isset($this->db_instance)){ return null; }
        
        $sql = "";
        return $this->db_instance->execSQL($sql);
    }
    
}

