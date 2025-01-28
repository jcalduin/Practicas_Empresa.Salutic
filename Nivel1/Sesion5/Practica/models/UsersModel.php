<?php

class UsersModel {
    
    private $table = "users";
    private $fields = array(
        /*
            COMPLETAR este array con los campos de la tabla users que hallamos creado.
        */ 
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
        /*
            COMPLETAR esta funcion para que nos inserte un nuevo registro en nuestra tabla users
            con los datos que recibimos como parametros($params)
        */ 
        
    }

    function _delUser($params){
        $sql = "DELETE FROM $this->table WHERE IDUser = $params->id";
        $resultSet = $this->db_instance->execSQL($sql);
        return $resultSet;
    }
    
}

