<?php

require_once 'model/ContactsLogic.php';
require_once 'model/Display.php';

class ContactsController {
    public function __construct() {
        $this->ContactsLogic = new ContactsLogic();
        $this->Display = new Display();
    }
    
    public function __destruct() {}
    public function handleRequest() {
        try{
            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'create':
                    # code...
                    $this->collectCreateContact();
                    break;
                case 'read':
                    # code...
                    $this->collectReadContact($_REQUEST['id']);
                    break;
                case 'update':
                    # code...
                    $this->collectUpdateContact($_REQUEST['id']);
                    break;
                case 'delete':
                    # code...
                    $this->collectDeleteContact($_REQUEST['id']);
                    break;
                case 'search':
                    $this->collectSearchContact($_REQUEST['search']);
                    break;
                case 'multidelete':
                    $this->collectMultiDeleteContact();
                    break;
                default:
                    # code...
                    $this->collectReadallContacts();
                    break;
                }
        } catch (Exception $e) {
            throw $e;
        }
    }

        public function collectReadContact($id){

            $res = $this->ContactsLogic->readContact($id);
            $html = $this->Display->createTable($res, true);
            //$html2 = $this->Display->createSelect($res);

            include 'view/contacts/read.php';
        }

        public function collectCreateContact(){
            $res = $this->ContactsLogic->createContact();
            include 'view/contacts/create.php';
        }

        public function collectReadallContacts(){
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;      
            $perPage = 6;
            $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

            $res = $this->ContactsLogic->readAllContacts($limit, $perPage);
            $pages = $res[0];

            $html3 = $this->Display->PageNavigation($pages, $page, "contacts");
            $html = $this->Display->createTable($res[1], false, "contacts");
            // $html2 = $this->Display->createSelect($res);

            include 'view/contacts.php';
        }

        public function collectUpdateContact($id){
            $res = $this->ContactsLogic->readContact($id);
            $contacts = $this->ContactsLogic->updateContact($id);
            //$html2 = $this->Display->createSelect($res);
            $msg = "Het is gelukt om een persoon te updaten.";
            include 'view/contacts/updata.php';
        }

        public function collectDeleteContact($id){   
            $res = $this->ContactsLogic->deleteContact($id);
            $msg = "Het is gelukt om een persoon te deleten.";
            include 'view/contacts/delete.php';
        }

        public function collectMultiDeleteContact(){
            print_r($_POST['checked_id']);
            if(isset($_POST['multi_submit'])){ 
                // If id array is not empty 
                if(!empty($_POST['checked_id[]'])){ 
                    // Get all selected IDs and convert it to a string 

                    

                   // $idStr = implode(',', $_POST['checked_id']); 
                   // $delete = $this->ContactsLogic->multiDeleteContact($idStr);
                    // Delete records from the database 
                     
                    // If delete is successful 
                    // if($delete){ 
                    //     $statusMsg = 'Selected users have been deleted successfully.'; 
                    // }else{ 
                    //     $statusMsg = 'Some problem occurred, please try again.'; 
                    // } 
                }else{ 
                    $statusMsg = 'Select at least 1 record to delete.'; 
                } 
            } 
        }

        public function collectSearchContact($search){
            $res = $this->ContactsLogic->searchContact($search);
            $html = $this->Display->createTable($res, false, "contacts");
            //$html2 = $this->Display->createSelect($res);
            include 'view/contacts/search.php';
        }
}

?>