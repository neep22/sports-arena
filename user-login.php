<!DOCTYPE html>
<html lang="en">
<?php include 'Session.php';
Session:: init();
 ?>
<?php include 'database.php';?>
<?php $db = new database;?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS -->
    <title>Sports Arena | LogIn</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
            <?php   
            if($_SERVER['REQUEST_METHOD'] =='POST'){
			 
             $email= mysqli_real_escape_string($db->link,$_POST['email']);
             $password= md5($_POST['password']);
             $query= "SELECT * FROM  users WHERE email='$email' AND password= '$password' ";
             $result= $db->select($query);
             if($result != false){
                 $value=$result->fetch_array();
                   Session::set("login",true);
                   Session::set("login",false);
				   Session::set("email",$value['email']);
				   Session::set("password",$value['password']);
                   Session::set("full_name",$value['full_name']);
                   Session::set("mobile",$value['mobile']);
                   Session::set("email",$value['email']);
				   Session::set("usertype",$value['usertype']);
				   Session::set("id",$value['id']);
				   
				   header("Location:booking.php");
				   }else{
				echo   "<script>alert('email or password not match')</script>";
			  }
		 }   
    ?>

    <div class="login-area">
        <div class="container">
            <div class="login-info text-center">
                <button type="button">Log In Now As A User👉</button>
                <p>Log in right away for our advanced sports software solutions, created to address issues in regular sporting events and activities.</p>
            </div> 
            <div class="login">
                <div class="logo">
                    <a href=""><span>s</span>ports arena</a>
                </div>
                <div class="login-form card">
                    <div class="login-title">
                        <span>get started with sports arena</span>
                        <p>Ignite your sports journey with SportsArena and get started now.</p>
                    </div>
                    <div class="owner-login">
                        <!-- Toggle 1: Login as User -->
                        <form action="" method="post">
                            <div class="mb-3">
                              <label for="userUsername" class="form-label">Username or Email</label>
                              <input type="email" class="form-control" id="userUsername" name="email" required>
                            </div>
                            <div class="mb-3">
                              <label for="userPassword" class="form-label">Password</label>
                              <input type="password" class="form-control" id="userPassword" name="password" required>
                            </div>
                            <div class="form-check d-flex justify-content-start align-items-center policy">
                                <div class="d-inline-block">
                                    <input class="form-check-input" type="checkbox" value="" id="policy">
                                </div>
                                <label class="form-check-label" for="policy">remember password</label>
                                <a href="UserForgotPass.php">forget password</a>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-bg">Login</button>
                              </div>
                        </form>
                        <div class="bottom-text">
                            <p>Create Your User Account <a href="user-registration.php">Sign Up!</a></p>
                            </div>
                            <div class="bottom-text">
                            <p>If You Want To Sign With a Owner Account? <a href="agency/owner-login.php">Sign In!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/popper.min.js"></script>
    <!-- Bootstrap.js -->
    <script src="assets/js/bootstrap.min.js"></script>
     <!-- Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <!-- Main js -->
    <script src="assets/js/banner.js"></script>
    <script src="assets/js/slider.js"></script>
    <script src="assets/js/count.js"></script>
</body>
</html>