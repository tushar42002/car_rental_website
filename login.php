

<?php
   include "partials/header.php";

   if (isset($_SESSION['user-login'])) {
    header('location:'. ROOT_URL .'index.php');
   }
?>
    
    <div class="container-fluid">
        <div class="form-container">
            <div class="logo-text">
               carRental <br> login 
            </div>
           <?php echo '<form action="'. ROOT_URL .'login-logic.php" method="POST">
                <input type="text" name="email_phone" placeholder="enter email or mobile no" required autocomplete="off">
                <input type="password" name="password" id="" placeholder="enter password" required  autocomplete="off">
                <input class="btn" type="submit" name="submit" value="login">

                <p>doesn\'t have an account <a href="'. ROOT_URL .'registration.php">create new account</a></p>
                
            </form>';
            ?>
        </div>
    </div>

</body>
</html>



