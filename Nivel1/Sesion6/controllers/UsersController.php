<?php
require "../config/Database.php";
require "../models/UsersModel.php";

$params = (object) $_POST;
$request = new UsersController($params);

class UsersController {
    
    private $db , $model , $params;
    
    function __construct($params) {
        $this->db = new Database();
        $this->db->_connect();
        
        $this->model = new UsersModel($this->db);
        $this->params = $params;
        
        $this->initRequest();
    }

    function initRequest() {
        switch($this->params->serviceType){
            case 'load_users':
                $this->loadUsers();
            break;
            case 'register_user':
                $this->registerUser();
            break;
            case 'delete-user':
            $this->deleteUser();
            break;
            case 'load_user':
                $this->loadUser();
            break;
            case 'safe_user':
                $this->safeUser();
            break;
        }
    }

    function loadUsers() {
        $result = $this->model->_getAll();
        $res_arr = $this->db->processResult($result);
        
        echo json_encode($res_arr);
    }

    function loadUser() {
        $result = $this->model->_getUser($this->params);
        $res_arr = $this->db->processResult($result);
        
        echo json_encode($res_arr);
    }

    function safeUser() {
        $success =  true;
        $message = 'Datos modificados correctamente';

        try {
            $result = $this->model->_updateUser($this->params);
            if ($result === false) { throw new Exception; }

        } catch (Exception $ex) {
            $success = false;
            $message = 'Error al modificar el usuario';
        }

        $response = array('success' => $success , 'message' => $message);
        echo json_encode($response);
    }
   
    function registerUser() {
        $success = true;
        $message = 'Usuario creado correctamente';
        
        try {           
            $result = $this->model->_insNewUser($this->params);
            if($result === false) { throw new Exception; }
        } catch(Exception $ex){
            $success = false;
            $message = "Error al crear nuevo usuario.";
        }
               
        $response = array('success' => $success , 'message' => $message);
        echo json_encode($response);
    }

    function deleteUser() {
        $success = true;
        $message = 'Usuario creado correctamente';
        
        try {           
            $result = $this->model->_delUser($this->params);
            if($result === false) { throw new Exception; }

        } catch(Exception $ex){
            $success = !$success;
            $message = "Error al crear nuevo usuario.";
        }
               
        $response = array('success' => $success , 'message' => $message);
        echo json_encode($response);
    }
}