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

    <!-- Services Banner Area Starts -->
    <section class="services-banner-area" style="background-image: url('assets/images/services-b.png');">
        <div class="container">
            <div class="services-banner">
                <span>Our Services</span>
                <div class="breadcrumb">    
                    <ul>
                        <li><a href="">home</a></li>
                        <li>/</li>
                        <li>services</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--Service Banner Area Ends-->
    
    <!--Service Area Starts Here-->

    <section class="services-area">
      <div class="container">
        <div class="section-title">
            <span>explore our <span>services</span></span>
            <p>Fostering excellence and empowering sports growth through tailored services for athletes, coaches, and enthusiasts.</p>
        </div>
        <div class="service-images">
            <div class="single-service-image">
                <img src="assets/images/services/service-01.png" alt="Court">
                <p>court rent</p>
                <a href="">learn more</a>
            </div>
            <div class="single-service-image">
                <img src="assets/images/services/service-02.png" alt="Group">
                <p>group lesson</p>
                <a href="">learn more</a>
            </div>
            <div class="single-service-image">
                <img src="assets/images/services/service-03.png" alt="Training">
                <p>training program</p>
                <a href="">learn more</a>
            </div>
            <div class="single-service-image">
                <img src="assets/images/services/service-04.png" alt="Private">
                <p>private lesson</p>
                <a href="">learn more</a>
            </div>
        </div>
        <a href="" class="btn btn-bg">view all services <i class='bx bx-right-arrow-circle'></i></a>
      </div>
    </section>

    <!-- Services Area End Here -->

    <!-- Admin Area Start Here -->
    <section class="admin-area pt-80 pb-80">
      <div class="container">
          <div class="section-title">
              <span>Admin</span>
              <p>Meet Our Admin</p>
          </div>
          <div class="admin">
              <div class="single-admin">
                  <a><img src="assets/images/admin/admin.jpg" alt="admin"></a>
                  <div class="admin-info">
                      <h1>Sanjida Sabiha</h1>
                  </div>
              </div>
              <div class="single-admin">
                  <a href=""><img src="assets/images/admin/samiha.png" alt=""></a>
                  <div class="admin-info">
                      <h1>Samiha Ispak Choudhury</h1>
                  </div>
              </div>
              <div class="single-admin">
                  <a href=""><img src="assets/images/admin/sameera.jpg" alt=""></a>
                  <div class="admin-info">
                      <h1>Mehzabeen Azad Chowdhury</h1>
                  </div>
              </div>
              <div class="single-admin">
                <a href=""><img src="assets/images/admin/admin-4.jpeg" alt=""></a>
                <div class="admin-info">
                    <h1>Nader Nihal Neep</h1>
                </div>
            </div>
          </div>
      </div>
  </section>
  <!-- Admin Area End Here -->


  <!--Services Promotional Banner-->
  <section class="service-prom-banner-area" style="background-image: url('assets/images/services/serv-banner.png');">
    <div class="container">
        <div class="service-promotion">
            <span>providing the best of services</span>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga consequuntur a doloremque corporis. Possimus autem adipisci animi ipsum dolor dolore!</p>
            <div class="convenient-btn">
                <a href="" class="btn btn-bg">View All Services</a>
            </div>
        </div>

    </div>
</section>

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
