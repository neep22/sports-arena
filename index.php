<!DOCTYPE html>
<?php include 'Session.php';
 Session:: init();
 ?>
 <?php include 'database.php';?>
 <?php $db = new database;?>
 <?php include 'helper/Format.php';?>
<?php $fm = new Format;?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a href="admin.php"><span class="primary"> Admin</span></a> 
                </div>
                <div class="user-profile">
                    <i class="fa fa-home"></i>
                    <a href="agency/owner-login.php"><span class="primary"> Owner login</span></a> 
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
              <div class="menu" >
                <ul id="menu" >
                    <li><a href="index.php">home</a></li>
                    <li><a href="about.php">about us</a></li>
                    <li><a href="services.php">services</a></li>
                    <li><a href="booking.php">booking</a></li>
                    <li><a href="contact.php">contact us</a></li>
                  </ul>
                
              </div>
            </div>
        </div>
    </header>
     <!-- Header Area End -->
	 
      <!-- Banner Area Start --> 
      <div id="carouselExampleSlidesOnly" class=" banner-area carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/slider-1.jpeg" class="d-block w-100" alt="Banner">
          </div>
          <div class="carousel-item">
            <img src="assets/images/slider-2.jpeg" class="d-block w-100" alt="Banner">
          </div>
          <div class="carousel-item">
            <img src="assets/images/slider-3.jpeg" class="d-block w-100" alt="Banner">
          </div>
        </div>
    </div>
    <div class="banner">
      <h1>world class sports field & premium <span>management</span></h1>
      <p>This website is a comprehensive online platform designed to efficiently manage and facilitate activities within indoor sports arenas. With a user-friendly interface, the website caters to stadium owners, sports event organizers, athletes, and sports enthusiasts.</p>
      <a href="booking.php" class="button btn btn-bg">book now</a>
    </div>
      <!-- Banner Area End -->

   <!-- Service Area Start -->
   <section class="service-area pt-80 ">
    <div class="container">
      <div class="section-title">
        <span>services we  <span>provide</span></span>
    </div>
    <div class="section-caption">
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga minima culpa natus temporibus!<br>
        Temporibus doloremque nulla hic perspiciatis tempora? Laboriosam possimus mollitia ipsa.</p>
    </div>
      <div class="services">
        <div class="single-service">
          <h2>01</h2>
          <span>booking management</span>
          <p>This platform allows users to book the stadium for various sports events, tournaments, and practice sessions. It provides a real-time calendar displaying available time slots and enables secure online payments Regular updates on upcoming events, sports-related news keep visitors engaged and informed.</p>
          <a href="services.php">read more</a>
        </div>
        <div class="single-service">
          <h2>02</h2>
          <span>facility information</span>
          <p>Detailed information about  stadium's facilities, amenities, seating capacity, and technical specifications is provided to help users make informed decisions Event organizers can utilize the website to plan  manage sports events. with options for ticketing, marketing, and participant registration.</p>
          <a href="services.php">read more</a>
        </div>
        <div class="single-service">
          <h2>03</h2>
          <span>membership</span>
          <p>Users can subscribe to membership plans, unlocking benefits like exclusive access, discounts, and priority booking. The website is integrated with social media channels to promote events, share updates, and connect with a broader audience.Visitors can leave feedback and reviews, helping stadium improve.</p>
          <a href="services.php">read more</a>
        </div>
      </div>
    </div>
   </section>
    <!-- Service Area End -->
     <!-- Review Area Starts -->
        <div class="review-area pt-80 pb-80">
      <div class="container">
        <div class="section-title">
          <span>what people say <span>about us</span></span>
      </div>
      <div class="reviews">

       <?php 
        //php code for review select
         $review_query="select * from reviews where status='confirm'
                        order by id desc limit 3";
         $review_read =$db->select($review_query);
         if($review_read){
                  while($review_result=$review_read->fetch_assoc()){

       
       ?>
        <div class="single-review">
         <h5 style="font-size:14px"><?php echo $fm->DateTime($review_result['date_time']); ?></h5>
          <h4><?php echo $review_result['name']; ?></h4>
          <p><?php echo $review_result['review']; ?></p>
        </div>

        <?php }} ;?>
        
        
      </div>
      </div>
    </div>
    <!-- Review Area Ends -->

  <!-- Partner Area Start -->
  <section class="partner-area pt-80 pb-80">
    <div class="container">
      <div class="section-title">
        <span>partnering with <span>organizations</span></span>
    </div>
        <div class="slider">
            <div class="slides"><img src="assets/images/partner-1.png" alt="logo-1"></div>
            <div class="slides"><img src="assets/images/partner-2.png" alt="logo-2"></div>
            <div class="slides"><img src="assets/images/partner-3.png" alt="logo-3"></div>
            <div class="slides"><img src="assets/images/partner-4.png" alt="logo-4"></div>
            <div class="slides"><img src="assets/images/partner-5.png" alt="logo-5"></div>
            <div class="slides"><img src="assets/images/partner-6.png" alt="logo-6"></div>
            <div class="slides"><img src="assets/images/partner-7.png" alt="logo-7"></div>
        </div> 
    </div>
</section>
 <!-- Partner Area End -->
 

    <!-- newsletter Area Start -->
    <section class="newsletter-area pt-80 pb-80" style="background-image: url(assets/images/banner-2.jpeg);">
      <div class="container">
          <div class="newsletter">
            <h1>sign up to get our news letter</h1>
            <p>join our newsletter to recieve update, services and discounts</p>
            <form action="" class="newsletter-form">
              <input type="email" name="" class="emailInput" placeholder="Email">
              <input type="submit" name="" class="btn " value="subscribe">
            </form>
          </div>
      </div>
    </section>
    <!-- newsletter Area End -->

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
       <script src="assets/js/slicknav.js"></script>

 
      

</body>
</html>