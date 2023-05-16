
<?php
  
      session_start();
      include "config/database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">

    
    <title>Document</title>
</head>
<body  style="background: #ff4f5a !important;">


       
    <div class="container-fluid" style="background: #ff4f5a !important;">
        <div class="form-container signup">
            <div class="logo-text">
               carRental <br> Add new car
            </div>
            <form action="add-car-logic.php" enctype="multipart/form-data" method="POST">
                
                <input type="text" placeholder="enter Vehicle model" name="vmodel" required>
                <input type="text" placeholder="enter Vehicle number" name="vnumber" required>
                <input type="number" placeholder="enter seat capacity" name="seat_capacity" required>
                <input type="number" placeholder="enter per day rent" name="rent_perday" required>
                <label for="car-img">add car image</label>
                <input type="file" name="carimg" id="car-img" required>
                <input class="btn" type="submit" name="submit" value="Add car">
                <p>go back at home page <a href="../index.php">Home page</a></p>
            </form>
        </div>
    </div>


    
</body>
</html>