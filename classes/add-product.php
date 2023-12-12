<?php

require_once 'db-conn.php';

class product extends MySql {


    public function catId($cat){
       
        $query = "SELECT id FROM categories WHERE title = '$cat'";
        $result = mysqli_query($this->conn, $query);
     
        $row = mysqli_fetch_assoc($result);
        
        return $row['id'];
    }


    public function addProduct($category , $name , $desc , $price , $imgNemName , $quantity ){
        $query = "INSERT INTO products(`category_id`, `name`, `description`, `price`, `image`, `quantity`) values ('$category' ,'$name' , '$desc' , '$price' , '$imgNemName' , '$quantity')";
        $result = mysqli_query($this->conn, $query);

        if($result)
        {
            return true;
        }
        return false;
    }


    public function getProduct(){
        $query = "SELECT * FROM products";
        $result = mysqli_query($this->conn, $query);
      
            $products = [];
            if(!empty($result)){
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
    
            return $products;
        }



    public function editProduct($id){
        $query = "SELECT * FROM products WHERE id='$id'";
        $result = mysqli_query($this->conn, $query);
       
            $products = [];
            if(!empty($result)){
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
         
            return $products;
        }
}

