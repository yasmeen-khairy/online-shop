<?php
require_once '../App.php';
require_once '../classes/db-conn.php';


if($request->hasRequest($request->post('addProduct'))){

    $category = $request->post('cat');
    $name = $request->post('title');
    $desc = $request->post('desc');
    $price = $request->post('price');
    $quantity = $request->post('quantity');

    $imgName = $_FILES['img']['name'];
    $imgTmpName = $_FILES['img']['tmp_name'];
    $imgSize = $_FILES['img']['size'];
    $imgExt = pathinfo($imgName , PATHINFO_EXTENSION );
    $allowed = array('jpg', 'jpeg');


    if ($imgSize > 12500000) {
        $err = 'too big img !';
        header("Location: ../admin/view/addProduct.php?error=$err");
        exit();
    } elseif (file_exists('../img/products/'. $imgName)) {
        $err = 'This image is already exists !';
        header("Location: ../admin/view/addProduct.php?error=$err");
        exit();
    } elseif ($imgSize == 0) {
        $err = 'Please upload an image !';
        header("Location: ../admin/view/addProduct.php?error=$err");
        exit();
    } elseif (!in_array($imgExt, $allowed)) {
        $err = 'you cannot upload this type of imgs !';
        header("Location: ../admin/view/addProduct.php?error=$err");
        exit();
    } else {
        $imgDestination = '../img/products/'. $imgName;
        move_uploaded_file($imgTmpName, $imgDestination);
    
    
    if (empty($request)) {
        $err = "All fields are required";
        header("Location: ../admin/view/addProduct.php?error=$err");
        exit();

    }
    elseif (empty($category) || $category=='Choose category') 
    {
        $err = "Choose category";
        header("Location: ../admin/view/addProduct.php?error=$err");
        exit();
    }
    else
    {
       
        if ($product->addProduct($product->catId($category) , $name , $desc , $price , $imgName , $quantity) == true) {
           $success = "product added successfully";
        header("Location: ../admin/view/addProduct.php?success=$success");
        exit();
        }else {
           echo 'error';
  
              }
        }
    }
    }
