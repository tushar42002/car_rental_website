
<?php
   include "partials/header.php";
?>


    
    <div class="container-fluid">
        <div class="form-container signup">
            <div class="logo-text">
               carRental <br> Sign up 
            </div>
           <?php echo '<form action="'. ROOT_URL .'registration-logic.php" method="POST">
                
                <input type="text" placeholder="enter name" name="fullname" required autocomplete="off">
                <input type="email" placeholder="enter email id" name="email" required autocomplete="off">
                <input type="number" placeholder="enter Phone no." name="phone" required autocomplete="off">
                <input type="password" name="password" id="" placeholder="enter password" required autocomplete="off">';

                if ($admin == 1) {
                     echo'<input class="btn" type="submit" name="submit" value="new employee">';
                }else{
                    echo'<input class="btn" type="submit" name="submit" value="sign up">';
                }

            echo'
                <p>Already have an account <a href="'. ROOT_URL .'login.php">log in</a></p>
                
                </form>';
            ?>
        </div>
    </div>

</body>
</html>