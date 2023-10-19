<?php

require_once 'controller/ContactsController.php';
require_once 'controller/ProductsController.php';
require_once 'controller/UsersController.php';

class MainController{
    public function __construct(){
        $this->ContactsController = new ContactsController();
        $this->ProductsController = new ProductsController();
        $this->UsersController = new UsersController();
    }

    public function __destruct(){

    }

    public function handleRequest(){
        try {
            $controller = isset($_GET['con']) ? $_GET['con'] : '';

            switch ($controller){
                case 'contacts':
                    $this->ContactsController->handleRequest();
                    break;
                case 'products':
                    $this->ProductsController->handleRequest();
                    break;
                case 'users':
                    $this->UserssController->handleRequest();
                default:
                    $this->ContactsController->handleRequest();
                    break;
            }

        } catch (Exception $e){
            return $e;
        }
    }
}

?>