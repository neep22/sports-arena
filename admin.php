<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'Session.php';
 Session:: init();
 ?>
<?php include 'database.php';?>
<?php $db = new database;?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS -->
    <title>Sports Arena | Registration</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
     <!-- Slicknav Css -->
     <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
    <!-- Registraion Area Start Here -->
    <?php   
            if($_SERVER['REQUEST_METHOD'] =='POST'){
			 
             $email= mysqli_real_escape_string($db->link,$_POST['email']);
             $password= md5($_POST['password']);
             $query= "SELECT * FROM  users WHERE email='$email' AND password= '$password' ";
             $result= $db->select($query);
             if($result != false){
                 $value=$result->fetch_array();
                   Session::set("login",true);
				   Session::set("email",$value['email']);
				   Session::set("password",$value['password']);
				   Session::set("usertype",$value['usertype']);
				   Session::set("id",$value['id']);
                  
				   
				   header("Location:admin/index.php");
				   }else{
				echo   "<script>alert('email or password not match')</script>";
			  }
		 }   
    ?>
    <section class="user-registration-area">
        <div class="container">
            <div class="register-info text-center">
                <button type="button">Log In as admin 👉</button>
                <p>Register now for our innovative sports software solutions, designed to tackle challenges in everyday sports activities and events.</p>
            </div>
            <div class="registration">
                <div class="logo">
                    <a href="#"><span>s</span>ports arena</a>
                </div>
                <div class="registration-form">
                    <div class="regi-title">
                        <span>get started with sports arena</span>
                        <p>Ignite your sports journey with SportsArena and get started now.</p>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="group-img">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="pass-group group-img">
                                <input type="password" class="form-control pass-input" name="password" placeholder="Password">
                            </div>
                        </div>
                        
                        <div class="form-check d-flex justify-content-start align-items-center policy">
                            <div class="d-inline-block">
                                <input class="form-check-input" type="checkbox" value="" id="policy">
                            </div>
                            <label class="form-check-label" for="policy">Remember Me</label>
                        </div>
                        <button class="btn btn-bg" name="submit" type="submit">Sign In</button>
                    </form>
                    <div class="bottom-text">
                        <p>Haven't an account? <a href="admin-registration.php">Sign Up!</a></p>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Registraion Area End Here -->

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