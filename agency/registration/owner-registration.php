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
    <link rel="stylesheet" href="../assets/css/style.css">
     <!-- Responsive CSS -->
     <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body>
<?php

include('database.php');
include('OwnerSendEmail.php');
?>
      <?php

				
					        $db=new database();
					        if(isset($_POST['submit'])) {
							$full_name = $_POST['full_name'];
                            $username=$_POST['username'];
							$OwnerEmail = $_POST['OwnerEmail'];
      						$OwnerPassword = $_POST['OwnerPassword'];
							$OwnerCon_password= $_POST['OwnerCon_password'];
                            $mobile = $_POST['mobile'];
                            $division = $_POST['division']; 
                            $city = $_POST['city']; 
                            $indoor_name = $_POST['indoor_name'];
                            $indoor_location = $_POST['indoor_location'];   	

							$code = rand();
                            if(strlen($OwnerPassword)<8){
                                echo "<script>alert('password should be at least 8 digit')</script>";
                            }elseif   ($OwnerPassword != $OwnerCon_password){
								echo "<script>alert('password not match!')</script>";		
							}elseif(!preg_match("/^([a-zA-Z' ]+)$/",$full_name)){
								
							echo "<script>alert('Error! Only Alphabets and Whitespace are allowed')</script>";
							}elseif(!preg_match("/^\\S+@\\S+\\.\\S+$/",$OwnerEmail)){
								
							echo "<script>alert('This is Not Valid Email')</script>";
							}else

							 if ($full_name =='' 
                              || $username==''
                              || $mobile=='' 
                              || $OwnerEmail =='' 
                              || $division==''
                              || $city==''
                              || $indoor_name==''
                              || $indoor_location==''
                              || $OwnerPassword ==''
                              || $OwnerCon_password ==''){
							echo "<script>alert('Field Must Not Be Empty')</script>";
						}else{
							$emailquery= "select* from  owners  where OwnerEmail= '$OwnerEmail' limit 1";
			                $mailcheck= $db->select($emailquery);
							 if($mailcheck != false){
							echo "<script>alert('email already exist')</script>";

						 }
							
							else{
								
							$sql = "INSERT INTO owners (full_name,OwnerEmail,OwnerPassword,username,mobile,division,city,indoor_name,indoor_location,usertype,code) VALUES('$full_name','$OwnerEmail','$OwnerPassword','$username','$mobile','$division','$city','$indoor_name','$indoor_location','owner','$code')";

							$result = $db->insert($sql);

								  if ($result) {

								   echo "<script>alert('Please wait till we verify your email')</script>";

                                   $sendMl->send($code,$OwnerEmail);
                
								
								}
								 else{
							  echo "<script>alert('Something wrong')</script>";
				    }
				}
			}
		 }


?>

    <!-- Registraion Area Start Here -->
    <section class="registration-area">
        <div class="container">
            <div class="register-info text-center">
                <button type="button">register Now as a owner 👉</button>
                <p>Register now for our innovative sports software solutions, designed to tackle challenges in everyday sports activities and events.</p>
            </div>
            <div class="registration">
                <div class="logo">
                    <a href=""><span>s</span>ports arena</a>
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
                                <input type="text" class="form-control" name="OwnerEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="pass-group group-img">
                                <input type="password" class="form-control pass-input" name="OwnerPassword" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="pass-group group-img">
                                <input type="password" class="form-control pass-confirm" name="OwnerCon_password" placeholder="Confirm Password">
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="group-img">
                                <input type="phone" class="form-control" name="mobile" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="group-img">
                                <select name="division" id="">
                                    <option value="0">Division</option>
                                    <option value="1">Dhaka</option>
                                    <option value="2">Barisal</option>
                                    <option value="3">Chittagong</option>
                                    <option value="4">Khulna</option>
                                    <option value="5">Mymensingh</option>
                                    <option value="6">Rajshahi</option>
                                    <option value="7">Rangpur</option>
                                    <option value="8">Sylhet</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="group-img">
                                <input type="text" class="form-control" name="city" placeholder="City">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="group-img">
                                <input type="text" class="form-control" name="indoor_name" placeholder="Your Indoor Sports Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="group-img">
                                <input type="text" class="form-control" name="indoor_location" placeholder="Indoor Location">
                            </div>
                        </div>
                        <div class="form-check d-flex justify-content-start align-items-center policy">
                            <div class="d-inline-block">
                                <input class="form-check-input" type="checkbox" value="" id="policy">
                            </div>
                            <label class="form-check-label" for="policy">By continuing you indicate that you read and agreed to the <a href="terms-condition.html">Terms of Use</a></label>
                        </div>
                        <button class="btn btn-bg" name="submit" type="submit">Create Account</button>
                    </form>
                    <div class="bottom-text">
                        <p>Have an account? <a href="owner-login.php">Sign In!</a></p>
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