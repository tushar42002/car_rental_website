<?php

   require 'constants.php';

   //connect database

   $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

   if (mysqli_errno($connection)) {
      die(mysqli_errno($connection));
   }

?>