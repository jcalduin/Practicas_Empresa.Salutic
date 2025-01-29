<?php

class UsersModel {
    
    private $table = "users";
    private $fields = array(
        "IDUser","name","nick","password","address","phoneNumber","dni"
    );
    
    private $db_instance;   
    function __construct($db_instance = null) {
        $this->db_instance = $db_instance;
    }
    
    function _getAll() {
        /*
            COMPLETAR esta funcion para que nos devuelva el resultSet de la consulta SQL
            
        */ 
        $sql = "SELECT * FROM $this->table";
        $resultSet = $this->db_instance->getSQL($sql);
        return $resultSet;
    }
    
    function _insNewUser($params) {
        if (!isset($this->db_instance)) {return null;}

        $sql = "INSERT INTO {$this->table} (".implode(",",$this->fields).")";
        $sql .= "VALUES (null,'$params->nombre','$params->nick','$params->password','$params->address','$params->phone','$params->dni')";

        return $this->db_instance->execSQL($sql);
        
    }

    function _delUser($params){
        $sql = "DELETE FROM $this->table WHERE IDUser = $params->id";
        $resultSet = $this->db_instance->execSQL($sql);
        return $resultSet;
    }
    
}

