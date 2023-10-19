<?php

require_once 'model/UsersLogic.php';
require_once 'model/Display.php';

class UsersController{
    public function __construct() {
        $this->UsersLogic = new UsersLogic();
        $this->Display = new Display();
    }

    public function __destruct(){

    }

    public function handleRequest(){
        try {
            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'create'
                    $this->collectCreateUsers();
                    break;
                case 'read'
                    $this->collectReadUsers($_REQUEST['id']);
                    break
                case 'update'
                    $this->collectUpdateUsers($_REQUEST['id']);
                    break;
                case 'delete'
                    $this->collectDeleteUsers($_REQUEST['id']);
                    break;
                case 'login'
                    $this->collectloginUsers();
                    break;
                default:
                    $this->collectReadAllUsers();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectCreateUsers(){
        if (isset($_REQUEST['create'])) {
            $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
            $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

            if (empty($username) or empty($password)) {
                return "Alle velden zijn vereist";
            } else {
                private $pepper = 'c1isvFdxMDdmjOlvxpecFw';
                $password = hash_hmac("sha256", $password, $pepper);
                $users = $this->UsersLogic->createUser($username, $password);
            }
            include "view/users/create.php";
        }
    }

    public function collectReadUsers($id){

    }

    public function collectReadAllUsers(){
        try {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;      
            $perPage = 6;
            $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

            $res = $this->UsersLogic->readAllUsers($limit, $perPage);
            $pages = $res[0];

            $html3 = $this->Display->PageNavigation($pages, $page, "users");
            $html = $this->Display->createTable($res[1], false, "users");

            include "view/users/readAll.php";
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectUpdateUsers($id){

    }

    public function collectDeleteUsers($id){

    }

    public function collectLoginUsers(){
        try {
            if (isset($_REQUEST['submit_users'])) {
                $usersname = isset($_REQUEST['usersname']) ? $_REQUEST['usersname'] : null;
                $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
    
                if (empty($usersname) or empty($password)) {
                    return "Alle velden zijn vereist";
                } else {

                    $users = $this->UsersLogic->loginUsers($usersname, $password);
                }
                include "view/login.php";
            }
        } catch (Exception $e){
            throw $e;
        }     
    }
}


?>