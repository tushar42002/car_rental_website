<?php
  
  session_start();
  include "admin/config/database.php";

 
  if(isset($_SESSION['user-login'])){
     $admin = $_SESSION['admin'];
  }else{
    $admin = 0; 
  }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental - Home</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="icons/css/all.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400;600;700;800&display=swap" rel="stylesheet">

</head>

<div class="navbar">
    <nav>
      <div class="logo">
        <a href="#">carRental</a>
      </div>
      <div class="menulink">
        <div class="menubtn-box">
          <div class="bar1 bar"></div>
          <div class="bar2 bar"></div>
          <div class="bar3 bar"></div>
        </div>
        <ul class="links">
        <li><a href="index.php">Home</a></li>
        <?php

        if(isset($_SESSION['user-login'])){

          
        
           if($admin == 1){
              echo'
                  <li><a href="booked-car.php">booked</a></li>
                  <li><a href="available.php">available</a></li>
                  <li><a href="registration.php">add employee</a></li>
                  <li><a href="' . ROOT_URL . 'admin/add-car.php">new car</a></li>
                  <li><a href="logout.php">log out</a></li>';

          }else{
             echo' <li><a href="rent.php">rent</a></li>
             <li><a href="booked-car.php">booked</a></li>
             <li><a href="logout.php">log out</a></li>';
           
           }

        } else{
          echo'<li><a href="rent.php">rent</a></li>
           <li><a href="login.php">login</a></li>';
        }
      
        ?>

        </ul>
      </div>
    </nav>
  </div>
