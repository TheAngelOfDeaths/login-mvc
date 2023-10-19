<?php

require_once 'model/ProductsLogic.php';
require_once 'model/Display.php';

class ProductsController{
    public function __construct(){
        $this->ProductsLogic = new ProductsLogic();
        $this->Display = new Display();
    }

    public function __destruct(){
        
    }

    public function handleRequest(){
        try{

            isset($_GET['con']) === 'products' ? $_GET['con'] : '';
            
            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'create':
                    $this->collectCreateProduct();
                    break;
                case 'read':
                    $this->collectReadProduct($_REQUEST['id']);
                    break;
                case 'delete':
                    $this->collectDeleteProduct($_REQUEST['id']);
                    break;
                case 'update':
                    $this->collectUpdateProduct($_REQUEST['id']);
                    break;
                case 'search':
                    $this->collectSearchProduct();
                    break;               
                default:
                    # code...
                    $this->collectReadallProducts();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function collectCreateProduct(){
        $res = $this->ProductsLogic->createProduct();
        include 'view/products/create.php';
    }

    public function collectReadProduct($id){

        $res = $this->ProductsLogic->readProduct($id);
        $html = $this->Display->createTable($res, false);

        include 'view/products/read.php';
    }

    public function collectReadallProducts(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;     
        $perPage = 6;
        $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        $res = $this->ProductsLogic->readAllProducts($limit, $perPage);
        $pages = $res[0];

        $html3 = $this->Display->PageNavigation($pages, $page, 'products');
        $html = $this->Display->createTable($res[1], false, 'products');
       // $html2 = $this->Display->createSelect($res);

        include 'view/products.php';
    }

    public function collectUpdateProduct($id){
        $res = $this->ProductsLogic->readProduct($id);
        $contacts = $this->ProductsLogic->updateProduct($id);
        include 'view/products/updata.php';
    }

    public function collectDeleteProduct($id){
        $res = $this->ProductsLogic->deleteProduct($id);
        $msg = "Het is gelukt om een persoon te deleten.";
        include 'view/products/delete.php';
    }

    public function collectSearchProduct(){
        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : null;
        if(isset($_POST['searchSubmit'])){
            $res = $this->ProductsLogic->searchProduct($search);
            $html = $this->Display->createTable($res, false);
        }
        include 'view/products/search.php';
    }
}


?>