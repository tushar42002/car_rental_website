<?php

   session_start();

   require "admin/config/database.php";

   $carid = $_GET['id'];
    $user_id = $_SESSION['userid'];
  


   // get rent data if rent a car button is clicked
   if (isset($_POST['submit'])) {

    $start_date = $_POST['start_date'];
    $days = $_POST['days'];

    $book_sql = "INSERT INTO `bookedcar` ( `user_id`, `car_id`, `start_date`, `booked_for`, `date`) VALUES ( '$user_id', '$carid', '$start_date', '$days', current_timestamp())";
    $book_result = mysqli_query($connection, $book_sql);

    $sql = "UPDATE cars SET `availability`= 0 WHERE `Vehicle_id` = $carid" ;
    $result = mysqli_query($connection, $sql);
    
    header('location:' . ROOT_URL . 'booked-car.php');

   }else {
    //  button is not clicked , bounce back to sign up page 
     header('location:' . ROOT_URL . 'rent.php');
     die();
   } 
  
