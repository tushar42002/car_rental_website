

<?php
   include "partials/header.php";
?>




<?php
   
   $user_id = $_SESSION['userid'];
 
?>


    <!-- ================ cards ========================= -->

    <section class="cars">
        <h2 class="section-heading">booked cars</h2>
        <div class="car-cards">
            <?php
               if($admin == 1){
                $sql = "SELECT * FROM `bookedcar`";
                $result = mysqli_query($connection, $sql);
            
                while($row = mysqli_fetch_assoc($result)){

                    $sql2 = " SELECT * FROM `users` WHERE `id` = {$row['user_id']} ";
                    $result2 = mysqli_query($connection, $sql2);

                    $row2 = mysqli_fetch_assoc($result2);



                    $booked_car_sql = " SELECT * FROM `cars` WHERE `Vehicle_id` = {$row['car_id']} ";
                    $result3 = mysqli_query($connection, $booked_car_sql);

                    $row3 = mysqli_fetch_assoc($result3);

                    echo'<div class="car-card">
                            <div class="car-details">
                                <p> Vehicle model : <span>'. $row3['Vehicle_model'] .'</span> </p>
                                <p> Vehicle number : <span>'. $row3['Vehicle_number'] .'</span> </p>
                                <p> seating capacity : <span>'. $row3['seating_capacity'] .' adults</span> </p>
                                <p> rent per day : <span>Rs '. $row3['rent_per_day'] .'</span> </p>
                            </div>
                            <div class="img">
                                <img src="img/'. $row3['car_image'] .'" alt=" ">
                            </div>
                            <div>
            
                                <p>start date: <span>'. $row['start_date'] .'</span></p>
                                <p>booked for <span>' . $row['booked_for'] . ' days</span></p>
                            </div>
                            <div>
                                <p>customer name: <span>' . $row2['fullname'] . '</span></p>
                            </div>
                        </div>';
                }
                
               }else{
                $sql = "SELECT * FROM `bookedcar` WHERE user_id = $user_id";
                $result = mysqli_query($connection, $sql);

                while($row = mysqli_fetch_assoc($result)){

                    $sql2 = " SELECT * FROM `users` WHERE `id` = {$row['user_id']} ";
                    $result2 = mysqli_query($connection, $sql2);

                    $row2 = mysqli_fetch_assoc($result2);



                    $booked_car_sql = " SELECT * FROM `cars` WHERE `Vehicle_id` = {$row['car_id']} ";
                    $result3 = mysqli_query($connection, $booked_car_sql);

                    $row3 = mysqli_fetch_assoc($result3);

                    echo'<div class="car-card">
                            <div class="car-details">
                                <p> Vehicle model : <span>'. $row3['Vehicle_model'] .'</span> </p>
                                <p> Vehicle number : <span>'. $row3['Vehicle_number'] .'</span> </p>
                                <p> seating capacity : <span>'. $row3['seating_capacity'] .' adults</span> </p>
                                <p> rent per day : <span>Rs '. $row3['rent_per_day'] .'</span> </p>
                            </div>
                            <div class="img">
                                <img src="img/'. $row3['car_image'] .'" alt=" ">
                            </div>
                            <div>
            
                                <p>start date: <span>'. $row['start_date'] .'</span></p>
                                <p>booked for <span>' . $row['booked_for'] . ' days</span></p>
                            </div>
                            <div>
                                <p>customer name: <span>' . $row2['fullname'] . '</span></p>
                            </div>
                        </div>';
                }

               }
               
            ?>
            

        </div>
    </section>

    <!-- ================= footer   ==================================== -->

    <footer>
        <div class="social">
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-whatsapp"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-facebook"></i>
        </div>
        <div class="greeting">
            <div class="text">
                <h3>Thanks for visiting <i class="fas fa-greeting"></i> </h3>
                <p>we are happy and thankfull to you for giving some time for visiting our website have a good ride.
                    Thanku very
                    much. See you soon.
                </p>
            </div>
            <div class="bottom-links">
                <a href="#">Home</a>
                <a href="#about">booked car</a>
                <a href="#projects">rent</a>
                <a href="#projects">login</a>

            </div>
        </div>

        <div class="copyright">
            <p>Made with <i class="fas fa-heart"></i> by Trilok</p>
        </div>
    </footer>




    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>