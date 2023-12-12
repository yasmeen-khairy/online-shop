<?php
include "db_connection.php";
session_start();
if (isset($_POST['confirm'])) {
  $email = $_POST['email'];
  $newpass = $_POST['newpass'];
  $confirmpass = $_POST['confirmpass'];


  if (empty($email) || empty($newpass) || empty($confirmpass)) {
    $err = "All fields are required";
    header("Location: forgetPassword.php?error=$err");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err = "Not valid email !";
    header("Location: forgetPassword.php?error=$err");
    exit();
  } elseif ($newpass != $confirmpass) {
    $err = "paswords is not identical !";
    header("Location: forgetPassword.php?error=$err");
    exit();
  } else {
    $npass = md5($newpass);
    $result = mysqli_query($conn,"UPDATE users SET password='$npass' WHERE email='$email'");
           if($result){
        header("Location: login.php?success=your password changed successfully");
        exit();
      }
    }
  }
