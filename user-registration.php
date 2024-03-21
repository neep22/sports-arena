<!DOCTYPE html>
<html lang="en">
<head>
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
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
<?php

include('database.php');
include('registration/UserSendEmail.php');
?>
                            <?php				
					        $db=new database();
					        if(isset($_POST['submit'])) {
							$full_name = $_POST['full_name'];
                            $username=$_POST['username'];
							$email = $_POST['email'];
      						$password = md5($_POST['password']);
							$con_password= md5($_POST['con_password']);
                            $mobile = $_POST['mobile']; 							
							$code = rand();
                            if(strlen (md5($password)<8)){
                                echo "<script>alert('password should be at least 8 digit')</script>";
                            }elseif(md5($password) != md5($con_password)){
								echo "<script>alert('password not match!')</script>";		
							}elseif(!preg_match("/^([a-zA-Z' ]+)$/",$full_name)){
								
							echo "<script>alert('Error! Only Alphabets and Whitespace are allowed')</script>";
							}else
                            if(!preg_match("/^\\S+@\\S+\\.\\S+$/", $email)){
								
							echo "<script>alert('This is Not Valid Email')</script>";
							}else

							 if ($full_name =='' 
                              || $username==''
                              || $mobile=='' 
                              || $email =='' 
                              || md5($password) ==''
                              || md5($con_password) ==''){
							echo "<script>alert('Filed Must Not Be Empty')</script>";
						   }else{
							$emailquery= "select* from  users  where email= '$email' limit 1";
			                $mailcheck= $db->select($emailquery);
							 if($mailcheck != false){
							echo "<script>alert('email already exist')</script>";

						 }
							
							else{
								
							$sql = "INSERT INTO users(full_name,email,password,username,mobile,usertype,code) VALUES('$full_name','$email','$password','$username','$mobile','user','$code')";

							$result = $db->insert($sql);

								  if ($result) {

								   echo "<script>alert('Please Waiting For Verify,We Will Send You a Email')</script>";

							    	$sendMl->send($code,$email);
                
								
								}
								 else{
							  echo "<script>alert('something wrong')</script>";
				    }
				}
			}
		 }


?>
    <!-- Registraion Area Start Here -->
    <section class="user-registration-area">
        <div class="container">
            <div class="register-info text-center">
                <button type="button">register Now as a user 👉</button>
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
                                <input type="text" class="form-control" name="full_name" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="group-img">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="group-img">
                                <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                            </div>
                        </div>
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
                        <div class="form-group">
                            <div class="pass-group group-img">
                                <input type="password" class="form-control pass-confirm" name="con_password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-check d-flex justify-content-start align-items-center policy">
                            <div class="d-inline-block">
                                <input class="form-check-input" type="checkbox" value="" id="policy">
                            </div>
                            <label class="form-check-label" for="policy">By continuing you indicate that you read and agreed to the <a href="">Terms of Use</a></label>
                        </div>
                        <button class="btn btn-bg" name="submit" type="submit">Create Account</button>
                    </form>
                    <div class="bottom-text">
                        <p>Have an account? <a href="user-login.php">Sign In!</a></p>
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