<?php
require_once '../App.php';


if($request->hasRequest($request->post('signup'))){


    $name = $request->post('username');
    $email = $request->post('email');
    $password = $request->post('pass');
    $phone = $request->post('phone');
    $address = $request->post('add');
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (empty($name) || empty($email) || empty($password) || empty($phone) || empty($address)) {
        $err = "All fields are required";
        header("Location: ../signupForm.php?error=$err");
        exit();
    } elseif (strlen($name) < 3) {
        $err = "short name !";
        header("Location: ../signupForm.php?error=$err");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = "Not valid email !";
        header("Location: ../signupForm.php?error=$err");
        exit();
    } elseif (!preg_match("/^01[0125][0-9]{8}/" , $phone)) {
        $err = "Wrong phone number !";
        header("Location: ../signupForm.php?error=$err");
        exit();
    } elseif (strlen($hashed_password) < 4) {
        $err = "Short password !";
        header("Location: ../signupForm.php?error=$err");
        exit();
    } else {

    $result = $signup->adduser($name, $email, $hashed_password, $phone ,$address);
if($result){
    
    header("Location: ../shop.php");
    exit();


} else{

}
    }
} else{
    echo 'error';
}