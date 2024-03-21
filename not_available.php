<!DOCTYPE html>
<html lang="en">
<?php include 'Session.php';
 Session:: init();
 ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS -->
    <title>Sports Arena | Time Slot | Not Available Time</title>
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
                <a href="index.html"><span>s</span>ports arena</a>
              </div>
              <div class="menu">
                <ul id="menu">
                    <li><a href="index.php">home</a></li>
                    <li><a href="about.php">about us</a></li>
                    <li><a href="service.php">services</a></li>
                    <li><a href="booking.php">booking</a></li>
                    <li><a href="contact.php">contact us</a></li>
                  </ul>
                 
                
              </div>        
            </div>
        </div>
    </header>
     <!-- Header Area End -->

    <!-- Not Available Time Start Here -->
    <section>
        <div class="container">
            <div class="not-available">
                <div class="not-available-info">
                    <span>sorry!!</span>
                    <i class="fa-solid fa-xmark"></i>
                    <h4>Timeslot not available</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- Not Available Time End Here -->

    <!-- Footer Area Starts -->
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
              <li><a href="about.html">about</a></li>
              <li><a href="services.html">services</a></li>
              <li><a href="">booking</a></li>
              <li><a href="contact.html">contact</a></li>
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
        <p>© All Copyright 2023 by sportsarena</p>
     </div>
      </div>
    </footer>
    <!-- Footer Area Ends -->


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
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>