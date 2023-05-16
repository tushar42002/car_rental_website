<?php

   session_start();

   require "config/database.php";

   $carid = $_GET['carid'];

  


   // get signup data if signup button is clicked
   if (isset($_POST['submit'])) {
       $vmodel = filter_var($_POST['vmodel'], FILTER_SANITIZE_SPECIAL_CHARS);
       $vnumber = filter_var($_POST['vnumber'], FILTER_SANITIZE_SPECIAL_CHARS);
       $seat_capacity = filter_var($_POST['seat_capacity'], FILTER_SANITIZE_SPECIAL_CHARS);
       $rate_per_day = filter_var($_POST['rent_perday'], FILTER_SANITIZE_SPECIAL_CHARS);
     


    //    validate input value
    if (!$vmodel) {
        $_SESSION['post-error'] = "please enter car model";
    } elseif (!$vnumber) {
        $_SESSION['post-error'] = "please enter car number";
    } elseif (!$seat_capacity) {
        $_SESSION['post-error'] = "please enter seat capacity";
    } elseif (!$rate_per_day) {
        $_SESSION['post-error'] = "please enter car rent per day";
    }  else {

    // redirect back to edit page if there was any problem
    if (isset($_SESSION['post-error'])) {
        // go back to edit page
          header('location:' . ROOT_URL . 'admin/edit-car.php');
         die();
    } else{

        // removing image rom data base
           
        $user_id =  $_SESSION['userid'];
        // udate car details into cars table in database
        // $add_car_sql = "UPDATE `cars` SET `Vehicle_model` = {$vmodel},`Vehicle_number` = {$vnumber}, `seating_capacity` = $seat_capacity, `rent_per_day`=$rate_per_day, `user_id` = $user_id  WHERE `Vehicle_id` = $carid";
        //  $add_car_result = mysqli_query($connection, $add_car_sql);

        $sql = "UPDATE cars SET Vehicle_model = '$vmodel', Vehicle_number = '$vnumber', seating_capacity = '$seat_capacity', rent_per_day = '$rate_per_day', user_id = '$user_id' WHERE `Vehicle_id` = $carid" ;
        $result = mysqli_query($connection, $sql);

              if(!mysqli_errno($connection)){
                // redirect to login page with success message
                 $_SESSION['post-done'] = "registration success. please log in";
                  header('location:' . ROOT_URL . 'index.php');
                 die();
         }

        //  ;
        }

    }
    
   }else {
    // button is not clicked , bounce back to sign up page 
    header('location:' . ROOT_URL . 'admin/add-car.php');
    die();
   } 
  
?>




