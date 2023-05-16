
<?php
   include "partials/header.php";
?>

    <!-- ================ cards ========================= -->

    <?php

$booked_car_sql = " SELECT * FROM `cars` WHERE `availability` = 1 ";
$result = mysqli_query($connection, $booked_car_sql);

?>

    <section class="cars">
        <h2 class="section-heading">cars available for rent</h2>
        <div class="car-cards">
            <?php
                 if(isset($_SESSION['user-login'])){
         
                        while($row = mysqli_fetch_assoc($result)){
                               $vid =   $row['Vehicle_id'];
                            echo' <div class=" car-card2">
                                   <form action="book-car.php?id='. $vid .'" method="POST">
                                     <div class="car-details">
                                         <p> Vehicle model : <span>'. $row['Vehicle_model'] .'</span> </p>
                                         <p> Vehicle number : <span>'. $row['Vehicle_number'] .'</span> </p>
                                         <p> seating capacity : <span>'. $row['seating_capacity'] .' adults</span> </p>
                                         <p> rent per day : <span>Rs '. $row['rent_per_day'] .'</span> </p>
                                     </div>
                                     <div class="img">
                                         <img src="img/'. $row['car_image'] .'" alt=" ">
                                     </div>
                                     <div class="days">
                                     <input type="text" name="start_date" id="" placeholder="start date" onfocus="this.type=\'date\'" onblur="this.type=\'text\'">
                                   <select name="days" id="">
                                     <option value="">nuber of days</option>
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                     <option value="6">6</option>
                                     <option value="7">7</option>
                                     <option value="8">8</option>
                                     <option value="9">9</option>
                                     <option value="10">10</option>
                                   </select>
                                 </div>
                                 <div class="page-btn card-btn">
                                    <input type="submit" name="submit" value="book now">
                                 </div>
                                 </form> 
                                 </div>';
                                
                         }

                  } else{
                    
                    while($row = mysqli_fetch_assoc($result)){
                    
                       echo' <div class="car-card">
                                <div class="car-details">
                                    <p> Vehicle model : <span>'. $row['Vehicle_model'] .'</span> </p>
                                    <p> Vehicle number : <span>'. $row['Vehicle_number'] .'</span> </p>
                                    <p> seating capacity : <span>'. $row['seating_capacity'] .' adults</span> </p>
                                    <p> rent per day : <span>Rs '. $row['rent_per_day'] .'</span> </p>
                                </div>
                                <div class="img">
                                    <img src="img/'. $row['car_image'] .'" alt=" ">
                                </div>
                                <div class="days">
                                <input type="text" name="" id="" placeholder="start date" onfocus="this.type=\'date\'" onblur="this.type=\'text\'">
                              <select name="" id="">
                                <option value="">nuber of days</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                                <option value="">6</option>
                                <option value="">7</option>
                                <option value="">8</option>
                                <option value="">9</option>
                                <option value="">10</option>
                              </select>
                            </div>
                            <div class="page-btn car-btn">
                              <a href="login.php"><i class="fas fa-car"> </i> rent a car</a>
                            </div>
                        </div>';
                           
                    }  
        
                  }
            ?>
            

        </div>
    </section>



    <section class="process-container">
        <h2 class="section-heading">how do i rent a car</h2>
        <div class="process">
            <div class="step">
                <img src="img/step1.jpg" alt="">
                <p>choose the car you like</p>
            </div>
            <div class="arrow">------------></div>
            <div class="step">
                <img src="img/step2.jpg" alt="">
                <p>make a payment, submit document and conclude a contract </p>
            </div>
            <div class="arrow">------------></div>
            <div class="step">
                <img src="img/step3.jpg" alt="">
                <p>take a trip by car</p>
            </div>
        </div>
    </section>


    <!-- ================= footer   ==================================== -->


    <?php
  include "partials/footer.php";
?>


</body>

</html>