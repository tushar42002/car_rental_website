<?php

   session_start();

   require "admin/config/database.php";
   


   // get signup data if signup button is clicked
    if (isset($_POST['submit'])) {
       $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_SPECIAL_CHARS);
       $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
       $phone = filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS);
       $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

       $admin = $_SESSION['admin'];
      
       

    //    validate input value
    if($fullname == " "){
        $_SESSION['signup'] = "please enter your  name";
    } elseif (!$phone) {
        $_SESSION['signup'] = "please enter your phone";
    } elseif (!$email) {
        $_SESSION['signup'] = "please enter your email";
    } elseif (strlen($password) < 8) {
        $_SESSION['signup'] = "password should be more than 8 characters";
    } else {
        // cheack if password don't match

        if(!$password){
            $_SESSION['signup'] = " enter password";
        } else{
            // hash pasword
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // cheak if username or email is exists or not
            $user_check_query = "SELECT * FROM `users` WHERE phone = '$phone 'OR email = '$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = "username or email already exists";
            } else {
                  // redirect back to signup page if there was any problem
               if (isset($_SESSION['signup'])) {
                   //go back to signup page
                   $_SESSION['signup-data'] = $_POST;
                       header('location:' . ROOT_URL . 'registration.php');
                      die();
                } else{
                  // insert new user into user table in database

                  if ($admin == 1) {
                    
                     $inset_user_query = "INSERT INTO `users` ( `fullname`, `email`, `phone`, `password`, `is_admin`, `date`) VALUES ( '$fullname', '$email', '$phone', '$hashed_password', '1', current_timestamp())";
                     $inset_user_result = mysqli_query($connection, $inset_user_query);
                  }else {
                    $inset_user_query = "INSERT INTO `users` ( `fullname`, `email`, `phone`, `password`, `is_admin`, `date`) VALUES ( '$fullname', '$email', '$phone', '$hashed_password', '0', current_timestamp());";
                    $inset_user_result = mysqli_query($connection, $inset_user_query);
                  }

                 
            
                  if(!mysqli_errno($connection)){
                    //    redirect to home page with success message
                      $_SESSION['signup-success'] = "registration success. please log in";

                      if ($admin == 1) {
                        header('location:' . ROOT_URL . 'index.php');
                      } else{
                          header('location:' . ROOT_URL . 'login.php');
                      }
                          die();
                   }
                }   
          }
        }
    }

    
 }else {
    //  button is not clicked , bounce back to sign up page 
     header('location:' . ROOT_URL . 'registration.php');
     die();
    } 

  
?>