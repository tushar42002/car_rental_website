<?php
   include "partials/header.php";
 
?>



<section class="header">
    <div class="header-text">
        <h1 class="header-title">want a car for rent</h1>
        <div class="h-btn">
            <div class="page-btn">
                <a class="" href="#cars"><i class="fas fa-car"></i>
                    Rent a car</a>
            </div>
        </div>
    </div>
    <div class="header-img">
        <img src="img/header-img.jpg" alt="">
    </div>
</section>


<section class="img-slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/slide2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/slide3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- =========================== some spesification ==================== -->

<section class="specification">
    <h1 class="section-heading">why choose us?</h1>
    <div class="content">
        <div class="specific">
            <h2><img src="img/maintain.png" alt=""></h2>
            <div class="specific-text">
                <h3>well maintained cars</h3>
                <p>Regular sevice & maintenance</p>
            </div>
        </div>
        <div class="specific">
            <h2><img src="img/delivery.jpg" alt=""></h2>
            <div class="specific-text">
                <h3>anywhere delivery</h3>
                <p>we hand deliver and pick-up your car from your doorstep. office or nearby airports</p>
            </div>
        </div>
        <div class="specific">
            <h2><img src="img/price-match.png" alt=""></h2>
            <div class="specific-text">
                <h3>price match guarantee</h3>
                <p>Found the same deal for less? we'll match the price</p>
            </div>
        </div>
        <div class="specific">
            <h2> <img src="img/money.png" alt=""></h2>
            <div class="specific-text">
                <h3>Flexible rentals</h3>
                <p>Cancel or change most booking for free upto 48 hours before pick-up</p>
            </div>
        </div>
    </div>
</section>

<!-- ================ cards ========================= -->






<section class="cars" id="cars">
    <h2 class="section-heading">cars available for rent</h2>
    <div class="car-cards">

        <?php

          $booked_car_sql = " SELECT * FROM `cars` WHERE `availability` = 1 LIMIT 5";
          $result = mysqli_query($connection, $booked_car_sql);
          
          if(isset($_SESSION['user-login'])){
         
            
            if($admin == 0){ 
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
            }else{

                while($row = mysqli_fetch_assoc($result)){
                       
                    echo'
                      <div class="car-card">
                         <div class="car-details">
                           <p> Vehicle model : <span>'. $row['Vehicle_model'] .'</span> </p>
                           <p> Vehicle number : <span>'. $row['Vehicle_number'] .'</span> </p>
                           <p> seating capacity : <span>'. $row['seating_capacity'] .'</span> </p>
                           <p> rent per day : <span>Rs '. $row['rent_per_day'] .'</span> </p>
                         </div>
                         <div class="img">
                           <img src="img/'. $row['car_image'] .'" alt=" ">
                         </div>
                         <div class="page-btn car-btn">
                           <a href="'. ROOT_URL .'/admin/edit-car.php?id='. $row['Vehicle_id'] .'">edit <i class="fas fa-edit"></i></a>
                         </div>
                      </div>';
                  }

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
                      <a href="login.php"><i class="fas fa-car"></i>rent a car</a>
                    </div>
                </div>';
                   
            }  

          }

        ?>
    </div>
    <div class=" page-btn allcar-btn ">
        <a href="rent.php"> all cars</a>
    </div>
</section>



<section class="process-container">
    <h2 class="section-heading">how do i rent a car</h2>
    <div class="process">
        <div class="step">
            <img src="img/step1.jpg" alt="">
            <p>choose the car you like</p>
        </div>
        <div class="arrow">-----></div>
        <div class="step">
            <img src="img/step2.jpg" alt="">
            <p>make a payment, submit document and conclude a contract </p>
        </div>
        <div class="arrow">-----></div>
        <div class="step">
            <img src="img/step3.jpg" alt="">
            <p>take a trip by car</p>
        </div>
    </div>
</section>


<?php
  include "partials/footer.php";
?>


</body>

</html>