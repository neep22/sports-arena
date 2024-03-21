<!DOCTYPE html>
<?php 
include('database.php');

?>
<?php include 'Session.php';
 Session:: init();
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS -->
    <title>Sports Arena</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
     <!-- Slicknav Css -->
     <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
 <!-- Top Header Area Starts -->
 <div class="top-header-area">
        <div class="container">
            <div class="user-action">
              <?php if(isset($_SESSION['login'])==false){
				         ?>
                 
               <div class="user-profile">
                    <i class="fa fa-home"></i>
                    <a href="agency/owner-login.php"><span class="primary"> Admin</span></a> 
                </div>
                <div class="user-profile">
                    <i class="fa fa-home"></i>
                    <a href="agency/owner-login.php"><span class="primary"> owner login</span></a> 
                </div>
                <?php } ?>
                <?php if(isset($_SESSION['login'])==true){
				         ?>
                <div class="user-profile">
                    <i class="fa-regular fa-user"></i>
                    <a href="booking-profile.php"><span class="primary"> my profile</span></a> 
                </div>
                <div class="user-review">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <a href="review.php"><span class="primary">review</span></a> 
                </div>
                <div class="user-history">
                  <i class="fa-solid fa-clock-rotate-left"></i>
                  <a href="booking-list.php"><span class="primary">history</span></a> 
              </div>
       
                <div class="user-logout">
                    <i class="fa-sharp fa-solid fa-right-to-bracket"></i>
                    <a href="logout.php?action=logout"><span class="primary">logout</span></a>
                </div>
                <?php }?>

                <?php if(isset($_SESSION['login'])==false){
				         ?>

                <div class="user-logout">
                    <i class="fa-sharp fa-solid fa-right-to-bracket"></i>
                    <a href="user-login.php"><span class="primary">login</span></a>
                </div>
                <?php } ?>
               
            </div>
        </div>
    </div>
    <!-- Top Header Area Ends -->
    <!-- Header Area Start -->
    <header class="header-area">
        <div class="container">
            <div class="header">
              <div class="logo">
                <a href="index.php"><span>s</span>ports arena</a>
            </div>
            <div class="menu">
                <ul id="menu">
                    <li><a href="index.php">home</a></li>
                    <li><a href="about.php">about us</a></li>
                    <li><a href="services.php">services</a></li>
                    <li><a href="booking.php">booking</a></li>
                    <li><a href="contact.php">contact us</a></li>
                </ul>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

     <!-- Contact Banner Area Start  -->
     <section class="contact-banner-area" style="background-image: url('assets/images/about-banner.jpg');">
        <div class="container">
            <div class="contact-banner">
                <span>Contact us</span>
                <div class="breadcrumb">    
                    <ul>
                        <li><a href="">home</a></li>
                        <li>/</li>
                        <li>contact us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Banner Area End  -->

    <!-- Contact Area Start -->
    <section class="contact-area pt-80 pb-80">
        <div class="container">
            <div class="section-title">
                <span>connect <span>with us</span></span>
            </div>
            <div class="section-caption">
                <p>we would love to respond to your queries and help you succeed. <br>feel free to get in touch with us</p>
            </div>
            <?php				
					        $db=new database();
					        if(isset($_POST['submit'])) {
							$name = $_POST['name'];
							$email = $_POST['email'];				
                            $mobile = $_POST['mobile']; 	
                            $subject=$_POST['subject'];										
                            
                            if ($name =='' 
                              || $mobile=='' 
                              || $email ==''
                              ||$subject=='' ){
							echo "<script>alert('Field Must Not Be Empty')</script>";
						   }else if(!preg_match("/^([a-zA-Z' ]+)$/",$name)){		
							echo "<script>alert('Error! Only Alphabets and Whitespace are allowed')</script>";
							}elseif(!preg_match("/^\\S+@\\S+\\.\\S+$/", $email)){					
							echo "<script>alert('This is Not Valid Email')</script>";
                            }else{
							$emailquery= "select* from  contact  where email= '$email' limit 1";
			                $mailcheck= $db->select($emailquery);
							 if($mailcheck != false){
							echo "<script>alert('email already exist')</script>";
						 }						
						else{
								
							$sql = "INSERT INTO contact(name,email,mobile,subject) VALUES('$name','$email','$mobile','$subject')";

							$result = $db->insert($sql);

								  if ($result) {

								   echo "<script>alert('Your Message is Sent')</script>";
								
								}
								 else{
							  echo "<script>alert('something wrong')</script>";
				    }
				}
			}
		 }


?>
            <div class="contact-box">
                <div class="contact-left">
                    <h3>Send your request</h3>
                    <form action="" method="post">
                        <div class="input-row">
                            <div class="input-group">
                                <input type="text" name="name" placeholder="Name">
                            </div>
                            <div class="input-group">
                                <input type="text" name="mobile" placeholder="Phone Number">
                            </div>
                            <div class="input-group">
                                <input type="email" name="email" placeholder="Email">
                            </div>
                            <div class="input-group">
                                <textarea name="subject" id=""  rows="5" placeholder="Message"></textarea>
                            </div> 
                            <button class="btnbtn-bg" type="submit" name="submit" >Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="contact-right">
                    <h3>reach us</h3>
                    <div class="single-info">
                        <i class="fa-solid fa-computer"></i>
                        <h2>website <span><a href="">sportsarena.com</a></span></h2>
                    </div>
                    <div class="single-info">
                        <i class="fa-solid fa-phone"></i>
                        <h2>Phone<span><a href="tel: 12345678">+12345678</a></span></h2>
                    </div>
                    <div class="single-info">
                        <i class="fa-solid fa-envelope"></i>
                        <h2>Email<span><a href="mailto:sportsarena@.com">sportsarena@.com</a></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->

    <!-- Footer Area Start -->
    <footer class="footer-area pt-80" style="background-image: url(assets/images/footer-img.jpeg);">
        <div class="container">
          <div class="footer">
            <div class="footer-about">
              <h2>sports arena</h2>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.<br>Neque sed asperiores nisi nemo tenetur expedita temporibus</p>
            <ul class="social-link">
              <li> <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li> <a href="https://twitter.com/?lang=en" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
            </ul>
          </div>
            <div class="quick-links">
              <h2>quick links</h2>
              <ul>
                <li><a href="about.php">about</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="">booking</a></li>
                <li><a href="contact.php">contact</a></li>
              </ul>
            </div>
            <div class="footer-contact">
              <h2>contact info</h2>
              <ul class="info">
                <li>
                  <span><i class="fa-solid fa-phone"></i></span>
                  <p><a href="tel: 12345678">+12345678</a></p>
                </li>
                <li>
                  <span><i class="fa-solid fa-envelope"></i></span>
                  <p><a href="mailto:sportsarena@company.com">sportsarena@company.com</a></p>
                </li>
              </ul>
            </div>
        </div>
        <div class="footer-bottom">
          <p>© All Copyright <?php echo date('Y')?> by sportsarena</p>
       </div>
        </div>
      </footer>
      <!-- Footer Area End -->
    
     
         <!-- Jquery JS -->
         <script src="assets/js/jquery.min.js"></script>
         <!-- Popper JS -->
         <script src="assets/js/popper.min.js"></script>
         <!-- Bootstrap.js -->
         <script src="assets/js/bootstrap.min.js"></script>
          <!-- Slick JS -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
          <!-- Slicknav js -->
       <script src="assets/js/slicknav.min.js"></script>
         <!-- Main js -->
         <script src="assets/js/banner.js"></script>
         <script src="assets/js/slider.js"></script>
         <script src="assets/js/count.js"></script>
         <script src="assets/js/slicknav.js"></script>
        
  
  </body>
  </html>
