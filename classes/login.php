<?php

require_once 'db-conn.php';
require_once '../App.php';

class login extends MySql{

    public function getuser($email){

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($result) == 1){
           
            return true;
            }else {
                return false;
            }
           
    
        }

        public function checkuserpass($email , $password){
            
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($this->conn, $query);
           
            if(mysqli_num_rows($result) == 1){
           $row = mysqli_fetch_assoc($result);
                $hashedpassword =$row['password'];
             
                if(password_verify($password,$hashedpassword)) {
                    return true;
                }else {
                    return false;
                }
            }
               
        }
            
       
        
        
        public function role($email){
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($this->conn, $query);
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                if ($row['role'] == 'admin') {
                    return true;
                }
                return false;
                } 
        }
                  
}
    
     
    
