<?php

   session_start();

   require "config/database.php";
  


   // get car data if add car button is clicked
   if (isset($_POST['submit'])) {
       $vmodel = filter_var($_POST['vmodel'], FILTER_SANITIZE_SPECIAL_CHARS);
       $vnumber = filter_var($_POST['vnumber'], FILTER_SANITIZE_SPECIAL_CHARS);
       $seat_capacity = filter_var($_POST['seat_capacity'], FILTER_SANITIZE_SPECIAL_CHARS);
       $rate_per_day = filter_var($_POST['rent_perday'], FILTER_SANITIZE_SPECIAL_CHARS);
       $carimg = $_FILES['carimg'];
       

    //    validate input value
    if (!$vmodel) {
        $_SESSION['post-error'] = "please enter car model";
    } elseif (!$vnumber) {
        $_SESSION['post-error'] = "please enter car number";
    } elseif (!$seat_capacity) {
        $_SESSION['post-error'] = "please enter seat capacity";
    } elseif (!$rate_per_day) {
        $_SESSION['post-error'] = "please enter car rent per day";
    } elseif (!$carimg) {
        $_SESSION['post-error'] = "please add car image";
    }  else {
           //work on car image
           //rename car image

           $time = time(); //  making each image name unique using timestemp
           $carimg_name = $time . $carimg['name'];
           $carimg_tmp_name = $carimg['tmp_name'];
           $carimg_destination_path = '../img/' . $carimg_name;
           
           //make sure file is an image 
           $allowed_files = ['png', 'jpg', 'jpeg'];
           $extention = explode('.', $carimg_name);
           $extention = end($extention);
           if (in_array($extention, $allowed_files)) {
               // make sure image size is not large (1mb+)
               if ($carimg['size'] < 11000000) {
                   // upload image
                   move_uploaded_file($carimg_tmp_name, $carimg_destination_path);
               }else {
                   $_SESSION['post-error'] = "file size too big. should be less than 1mb";
               }
           } else {
               $_SESSION['post-error'] = "file should be png, jpg, jpeg only";
           }

        
    }

    // redirect back to add car page if there was any problem
    if (isset($_SESSION['post-error'])) {
        // go back to add car page
          header('location:' . ROOT_URL . 'admin/add-car.php');
         die();
    } else{
           
        $user_id =  $_SESSION['userid'];
        // insert new car into cars table in database
        $add_car_sql = "INSERT INTO cars ( Vehicle_model, Vehicle_number, seating_capacity, rent_per_day, car_image, `availability`, user_id) VALUES ( '$vmodel', '$vnumber', '$seat_capacity', '$rate_per_day', '$carimg_name', '1', '$user_id')";
         $add_car_result = mysqli_query($connection, $add_car_sql);

              if(!mysqli_errno($connection)){
                // redirect to login page with success message
                 $_SESSION['post-done'] = "registration success. please log in";
                  header('location:' . ROOT_URL . 'index.php');
                 die();
         }


        //  ;
    }
    
   }else {
    // button is not clicked , bounce back to sign up page 
    header('location:' . ROOT_URL . 'admin/add-car.php');
    die();
   } 
  
?>