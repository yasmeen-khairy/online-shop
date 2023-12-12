<?php
require_once '../App.php';


if($request->hasRequest($request->post('addCategory'))){

    $title = $request->post('name');
    if (empty($title)) {
        $err = "All fields are required";
        header("Location: ../admin/view/addCategory.php?error=$err");
        exit();

    }else{
        $result2 = $category->checkcat($title);
        if ($result2 == true) {
            $err = "exist";
            header("Location: ../admin/view/addCategory.php?error=$err");
            exit();
        }else {
            $result = $category->addcat($title);
            if($result){
      
              $err = "Added suucessfull";
              header("Location: ../admin/view/addCategory.php?error=$err");
              exit();
  
             } else{
              $err = "error";
              header("Location: ../admin/view/addCategory.php?error=$err");
              exit();
  
  
              }
        }
       
    }
}