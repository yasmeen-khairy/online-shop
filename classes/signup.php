<?php

require_once 'db-conn.php';
class signup extends MySql {

    
    public function adduser($name, $email, $hashed_password, $phone ,$address){
        $query = "INSERT INTO users(`name`, `email`, `password`, `phone` ,`address`) values ('$name', '$email', '$hashed_password', '$phone' ,'$address')";
        $result = mysqli_query($this->conn, $query);

        if($result){
            return true;
        }
        return false;
    }


}