
<?php
   include "partials/header.php";
?>

<?php

    $booked_car_sql = " SELECT * FROM `cars` WHERE `availability` = 1 ";
    $result = mysqli_query($connection, $booked_car_sql);

?>


    <!-- ================ cards ========================= -->

    <section class="cars">
        <h2 class="section-heading">booked cars</h2>
        <div class="car-cards">
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    echo'<div class="car-card">
                            <div class="car-details">
                                <p> Vehicle model : <span>'. $row['Vehicle_model'] .'</span> </p>
                                <p> Vehicle number : <span>'. $row['Vehicle_number'] .'</span> </p>
                                <p> seating capacity : <span>'. $row['seating_capacity'] .' adults</span> </p>
                                <p> rent per day : <span>Rs '. $row['rent_per_day'] .'</span> </p>
                            </div>
                            <div class="img">
                                <img src="img/'. $row['car_image'] .'" alt=" ">
                            </div>
                            <div class="page-btn car-btn">
                              <a href="edit-car.php?id='. $row['Vehicle_id'] .'">edit <i class="fas fa-edit"></i></a>
                          </div>
                        </div>';
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