<?php

require "APPConfig.php";

class Database {
    
    private $db_name , $db_user , $db_pass , $db_host;
    private $db_config ,$db_conn;
    
    function __construct() {
        $appcfg = new APPConfig();
        $this->db_config = $appcfg->getDBConfig();
        
        $this->db_host = $this->db_config['db_host'];       
        $this->db_user = $this->db_config['db_user'];
        $this->db_pass = $this->db_config['db_pass'];
        $this->db_name = $this->db_config['db_name'];       
    }
    
    function _connect(){
        $this->db_conn = mysqli_connect($this->db_host , $this->db_user , $this->db_pass , $this->db_name);
        if ($this->db_conn->connect_error) { die("Connection failed: " . $this->db_conn->connect_error); } 
    }
    
    function _close(){
        if($this->existConn()) { mysqli_close($this->db_conn); }
    }
    
    function getSQL($sql) {
        if($this->existConn()) { return $this->db_conn->query($sql); }
    }
    
    function execSQL($sql) {
        if($this->existConn()) { return $this->db_conn->query($sql); }
    }
    
    function existConn() {
        return $this->db_conn;
    }
    
    function processResult($result) {
        $res_arr = array();
        while($row = $result->fetch_object()){
            $res_arr[] = $row;
        }
        return $res_arr;
    }
    
    
}


