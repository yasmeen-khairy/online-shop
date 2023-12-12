<?php


require_once '../App.php';

session_start();

if($request->hasRequest($request->post('login'))){
   $userId = $request->post('user_id');
    $email = $request->post('email');
    $password = $request->post('pass');
   
    if (empty($email) || empty($password))
     {
        $err = "All fields are required";
        header("Location: ../loginForm.php?error=$err");
        exit();
    }
    else
    {

      if ($login->getuser($email) == true) 
      {
        if ($login->checkuserpass( $email, $password) == true) 
        {
    
         if($login->role( $email) == true)
         {
          header("Location: ../admin/view/layout.php");
          exit();
         }
         else
          {
            $_SESSION['user-email'] = $email;
           header("Location: ../shop.php");
           exit();
          }
          
       }
       else 
       {
        $err = "wrong pass";
        header("Location: ../loginForm.php?error=$err");
        exit();
       }
     }
     else 
     {
        $err = "email not found";
        header("Location: ../loginForm.php?error=$err");
        exit();
     }
       
    }
}


