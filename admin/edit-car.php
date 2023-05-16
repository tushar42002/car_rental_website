
<?php
  
  session_start();
  include "config/database.php";

  $id = $_GET['id'];

  $sql = "SELECT * FROM cars WHERE Vehicle_id = $id ";
  $result = mysqli_query($connection, $sql);

  $row = mysqli_fetch_assoc($result);


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
        <form action="edit-car-logic.php?carid=<?php echo $id; ?>" enctype="multipart/form-data" method="POST">
            
            <input type="text" placeholder="enter Vehicle model" value="<?php echo $row['Vehicle_model']; ?>" name="vmodel" required>
            <input type="text" placeholder="enter Vehicle number" value="<?php echo $row['Vehicle_number']; ?>" name="vnumber" required>
            <input type="number" placeholder="enter seat capacity" value="<?php echo $row['seating_capacity']; ?>" name="seat_capacity" required>
            <input type="number" placeholder="enter per day rent" value="<?php echo $row['rent_per_day']; ?>" name="rent_perday" required>
            <input class="btn" type="submit" name="submit" value="update detail">
            <p>go back at home page <a href="../index.php">Home page</a></p>
        </form>
    </div>
</div>



</body>
</html>