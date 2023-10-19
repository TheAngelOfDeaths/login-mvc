<?php

require_once 'model/DataHandler.php';

class UsersLogic{

    public function __construct(){
        $this->DataHandler = new DataHandler("localhost", "mysql", "users_db", "root", "");
    }

    public function __destruct(){

    }

    public function createUsers($username, $password){
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $this->DataHandler->createData($sql);
    }

    public function readUsers(){

    }

    public function readAllUsers(){
        try {
            $sql = "SELECT FOUND_ROWS() as total FROM users";
            $result1 = $this->DataHandler->countPages($sql, $perPage);

            $sql = "SELECT * FROM users LIMIT $limit, $perPage";
            $result = $this->DataHandler->readAllData($sql);

            $result->fetch(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();

            $arry = [$result1, $res];
            return $arry;
        } catch (Exception $e){
            throw $e;
        }
    }

    public function updateUsers(){

    }

    public function deleteUsers(){

    }

    public function loginUsers($usersname, $password){
        $sql = "SELECT * FROM `users` WHERE (usersname LIKE '%$usersname%' AND password LIKE '%$password%'"; 
        $this->DataHandler->readAllData($sql);
        header("Location: index.php?");
    }
}

?>