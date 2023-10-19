<?php

require_once 'model/DataHandler.php';


class ContactsLogic {   

    private $DataHandler;

    public function __construct(){
    	$this->DataHandler = new Datahandler("localhost", "mysql", "user_db", "root", "");   
    }

    public function __destruct(){

    }
    
    public function createContact(){

        if (!isset($_REQUEST['create'])) {
            return;
        }

        $name = $_REQUEST['name'];
        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email'];
        $address = $_REQUEST['address'];
        if (empty($name) or empty($phone) or empty($email) or empty($address)) {
            return "Alle velden zijn vereist";
        } else {
            $sql = "INSERT INTO contacts (name, phone, email, address) VALUES('$name', '$phone', '$email', '$address')";
			$this->DataHandler->createData($sql);
			header("Location: index.php?con=contacts");
        }
    }

    public function readContact($id){
        try{
    		$sql = 'SELECT * FROM contacts WHERE `id` = ' . $id;
          	$results = $this->DataHandler->readData($sql);
         	$res = $results->fetchAll();
          	return $res;
        } catch (Exception $e){
            throw $e;
        }
    }

    public function readAllContacts($limit, $perPage) {
        try{
            $sql = "SELECT FOUND_ROWS() as total FROM contacts";
            $result1 = $this->DataHandler->countPages($sql, $perPage);
            
            $sql = "SELECT * FROM contacts LIMIT $limit, $perPage";
            $result = $this->DataHandler->readAllData($sql);

            $result->fetch(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();

            $arry = [$result1, $res];
            return $arry;
        } catch (Exception $e){
          throw $e;
        }
    }

    public function updateContact($id) {

		if (isset($_REQUEST['submit'])) {
            $name = $_REQUEST['name'];
            $phone = $_REQUEST['phone'];
            $email = $_REQUEST['email'];
            $address = $_REQUEST['address'];
            if (empty($name) or empty($phone) or empty($email) or empty($address)) {
                return "Alle velden zijn vereist";
            } else {
                $sql =  "UPDATE `contacts` SET `name`='{$name}',`phone`='{$phone}',`email`='{$email}',`address`='{$address}' WHERE `id` = " . $id;
                $this->DataHandler->updateData($sql);
                header("Location: index.php?con=contacts");
            }
        }
    }

    public function deleteContact($id) {
		try{
			$sql = 'DELETE FROM contacts WHERE `id` = ' . $id;
			$results = $this->DataHandler->deleteData($sql);
			header("Location: index.php?con=contacts");
			return $results;
		} catch (Exception $e){
			throw $e;
		}
    }

    public function multiDeleteContact($idStr){
        $sql = "DELETE FROM contacts WHERE id IN" . $idStr;
        $delete = $this->DataHandler->deleteData($sql);
    }

	public function searchContact($search){
		try{
		  	$sql = "SELECT * FROM `contacts` WHERE (id LIKE '%$search%' OR name LIKE '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%' OR address LIKE '%$search%')"; 
            $results = $this->DataHandler->readAllData($sql);
		  	$res = $results->fetchAll();
        	return $res;
		} catch (Exception $e){
		  	throw $e;
		}
	}
}
