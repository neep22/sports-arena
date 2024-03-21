<!DOCTYPE html>
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

    <!-- About Banner Area Start Here -->
    <section class="about-banner-area" style="background-image: url('assets/images/about-banner.jpg');">
        <div class="container">
            <div class="about-banner">
                <span>about us</span>
                <div class="breadcrumb">    
                    <ul>
                        <li><a href="">home</a></li>
                        <li>/</li>
                        <li>about</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- About Banner Area End Here -->

    <!-- About Area Start Here -->
    <section class="about-info-area pt-80 pb-80">
        <div class="container">
            <div class="about-mission">
                <div class="about-img">
                    <div class="single-about">
                        <img src="assets/images/about/about-1.png" alt="About">
                    </div>
                    <div class="single-about">
                        <img src="assets/images/about/about-2.jpg" alt="About">
                    </div>    
                    <div class="single-about">
                            <img src="assets/images/about/about-3.jpg" alt="About">
                    </div>    
                </div>
                <div class="about-info">
                    <div class="vision">
                        <span>your vision</span>
                        <p>We envision a thriving sports ecosystem with innovative technologies that enhance skills and cultivate a love for the sport. Our platform inspires individuals to unleash their full potential in sports.</p>
                        <p>We revolutionize sports, empowering coaches and players to excel. Our platform offers comprehensive tools and support for growth within the sports community. Join us and reach new heights of excellence!</p>
                    </div>
                    <div class="mission">
                        <span>our mission</span>
                        <p>We provide coaches and players with a seamless platform for connectivity, personalized insights, and educational resources. Together, we foster a collaborative community that supports growth and success in sports.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End Here -->

    <!-- Working Area Start Here -->
    <section class="working-area pt-80 pb-80">
        <div class="container">
            <div class="section-title">
                <span>how it <span>works</span></span>
            </div>
            <div class="section-caption">
                <p>Simplifying the booking process for venues, and athletes.</p>
            </div>
            <div class="working">
                <div class="single-work">
                    <div class="work-icon">
                        <div class="work-icon-inner">
                            <img src="assets/images/work/work-icon1.svg" alt="Icon">
                        </div>
                    </div>
                    <span>join us</span>
                    <p>Quick and Easy Registration: Get started on our software platform with a simple account creation process.</p>
                    <a href="" class="btn btn-bg">register now<i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="single-work">
                    <div class="work-icon">
                        <div class="work-icon-inner">
                            <img src="assets/images/work/work-icon2.svg" alt="Icon">
                        </div>
                    </div>
                    <span>select indoor</span>
                    <p>Book your favourite venues for premium facilities. You can choice any kind of vanue in Bangladesh</p>
                    <a href="" class="btn btn-bg">register now<i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="single-work">
                    <div class="work-icon">
                        <div class="work-icon-inner">
                            <img src="assets/images/work/work-icon3.svg" alt="Icon">
                        </div>
                    </div>
                    <span>Booking Process</span>
                    <p>Easily book, pay, and enjoy a seamless experience on our user-friendly platform.Also book your valid timeslot</p>
                    <a href="" class="btn btn-bg">booking now<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Working Area End Here -->
  
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