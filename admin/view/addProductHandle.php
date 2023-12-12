<?php
session_start();
include "db_connection.php";

if (isset($_POST['addProduct'])) {
    $cat = $_POST['cat'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $id = $_GET['id'];


    if (empty($title) || empty($price) || empty($quantity) || empty($cat)) {
        $error = 'All inputs are required !';
        header("Location: addProduct.php?error=$error");
        exit();
    } elseif (strlen($title) < 4) {
        $error = 'small title !';
        header("Location: addProduct.php?error=$error");
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9 .\/]*$/", $title)) {
        $error = 'invalid title !';
        header("Location: addProduct.php?error=$error");
        exit();
    } else {

        $imgName = $_FILES['img']['name'];
        $imgTmpName = $_FILES['img']['tmp_name'];
        $imgSize = $_FILES['img']['size'];
        $imgExt = pathinfo($imgName , PATHINFO_EXTENSION );
        $imgNemName = $title . "." . $imgExt;
        $allowed = array('jpg', 'jpeg');


        if ($imgSize > 12500000) {
            $error = 'too big img !';
            header("Location: addProduct.php?error=$error");
        } elseif (file_exists('uploads/'. $imgName)) {
            $error = 'This image is already exists !';
            header("Location: addProduct.php?error=$error");
        } elseif ($imgSize == 0) {
            $error = 'Please upload an image !';
            header("Location: addProduct.php?error=$error");
            exit();
        } elseif (!in_array($imgExt, $allowed)) {
            $error = 'you cannot upload this type of imgs !';
            header("Location: addProduct.php?error=$error");
        } else {
            $imgDestination = 'uploads/'. $imgName;
            move_uploaded_file($imgTmpName, $imgDestination);

       

            $sql = "INSERT INTO shop (title , descreption , category , price , image ) VALUES ('$title' , '$desc' , '$cat' , '$price' , '$imgName' )";
            $result = mysqli_query($conn , $sql);
            if($result){
            header("Location: /shop.php");
            exit();
            
        }else{
            $error = "unknown error!";
            header("Location: addProduct.php?error=$error");
            exit();
        }
       
        }
    }
}