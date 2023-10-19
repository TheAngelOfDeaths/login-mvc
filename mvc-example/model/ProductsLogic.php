<?php

require_once 'model/DataHandler.php';

class ProductsLogic{
    private $DataHandler;

    public function __construct(){
    	$this->DataHandler = new Datahandler("localhost", "mysql", "user_db", "root", "");   
    }

    public function __destruct(){

    }

    public function createProduct(){

        if (!isset($_REQUEST['create'])) {
            return;
        }

        $product_type_code = $_REQUEST['product_type_code'];
        $supplier_id = $_REQUEST['supplier_id'];
        $product_name = $_REQUEST['product_name'];
        $product_price = $_REQUEST['product_price'];
        $other_product_details = $_REQUEST['other_product_details'];
        if (empty($product_type_code) or empty($supplier_id) or empty($product_name) or empty($product_price) or empty($other_product_details)) {
            return "Alle velden zijn vereist";
        } else {
            $sql = "INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details) 
                    VALUES('$product_type_code', '$supplier_id', '$product_name', '$product_price', '$other_product_details')";
			$this->DataHandler->createData($sql);
			header("Location: index.php?con=products");
        }
    }

    public function readProduct($id){
        try{
    		$sql = 'SELECT * FROM products WHERE `id` = ' . $id;
          	$results = $this->DataHandler->readData($sql);
         	$res = $results->fetchAll();
          	return $res;
        } catch (Exception $e){
            throw $e;
        }
    }

    public function readAllProducts($limit, $perPage) {
        try{
            $sql = "SELECT FOUND_ROWS() as total FROM products";
            $result1 = $this->DataHandler->countPages($sql, $perPage);
            
            $sql = "SELECT id as id, product_name, Replace(Replace(Concat('€ ', Format(`product_price`, 2)), ',', ''), '.', ',') AS `product_price`, supplier_id, product_type_code, other_product_details FROM products LIMIT $limit, $perPage";
            $result = $this->DataHandler->readAllData($sql);

            $result->fetch(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();

            $arry = [$result1, $res];
            return $arry;
            return $res;
        } catch (Exception $e){
          throw $e;
        }
    }

    public function updateProduct($id) {

		if (isset($_REQUEST['submit'])) {
            $product_type_code = $_REQUEST['product_type_code'];
            $supplier_id = $_REQUEST['supplier_id'];
            $product_name = $_REQUEST['product_name'];
            $product_price = $_REQUEST['product_price'];
            $other_product_details = $_REQUEST['other_product_details'];
            if (empty($product_type_code) or empty($supplier_id) or empty($product_name) or empty($product_price) or empty($other_product_details)) {
                return "Alle velden zijn vereist";
            } else {
                $sql =  "UPDATE `products` SET `product_type_code`='{$product_type_code}',`supplier_id`='{$supplier_id}',`product_name`='{$product_name}',`product_price`='{$product_price}',`other_product_details`='{$other_product_details}' WHERE `id` = " . $id;
                $this->DataHandler->updateData($sql);
				$msg = "Het is gelukt om een persoon te updaten.";
                header("Location: index.php?con=products");
				return $msg;
            }
        }
    }

    public function deleteProduct($id) {
		try{
			$sql = 'DELETE FROM products WHERE `id` = ' . $id;
			$results = $this->DataHandler->deleteData($sql);
			header("Location: index.php?con=products");
			return $results;
		} catch (Exception $e){
			throw $e;
		}
    }

    public function searchProduct($search){
		try{
		  	$sql = "SELECT * FROM `products` WHERE (id LIKE '%$search%' OR product_type_code LIKE '%$search%' OR supplier_id LIKE '%$search%' OR product_name LIKE '%$search%' OR product_price LIKE '%$search%' OR other_product_details LIKE '%$search%')"; 
		  	$results = $this->DataHandler->readAllData($sql);
		  	$res = $results->fetchAll();
        	return $res;
		} catch (Exception $e){
		  	throw $e;
		}
	}
}

?>