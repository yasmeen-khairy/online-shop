<?php

require_once 'db-conn.php';
class category extends MySql {

    
    public function addcat($title){
        $query = "INSERT INTO categories(`title`) values ('$title')";
        $result = mysqli_query($this->conn, $query);

        if($result){
            return true;
        }
        return false;
    }
    public function checkcat ($title){
        $query = "SELECT * FROM categories WHERE title = '$title'";
        $result = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($result) == 1){

            return true;
        }
        return false;
    }

    public function getCats(){
        $query = "SELECT * FROM categories";

        $result = mysqli_query($this->conn, $query);

        $categories = [];
        if(!empty($result)){
            $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        return $categories;
    }
}

