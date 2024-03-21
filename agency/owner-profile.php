<?php include 'Session.php';
 Session:: init();

 ?>
<?php include 'lib/database.php';?>
<?php $db = new database;?>

<!DOCTYPE html>
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
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
     <!-- Responsive CSS -->
     <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body>
    <!-- List header Area Start -->
    <div class="list-header-area">
        <div class="container">
            <div class="">
                <div class="list-logo pt-4 pb-4 text-center">
                    <a href="#" class="text-dark"><span>s</span>ports arena</a>
                    <p>Indoor Name:<?php echo $_SESSION['indoor_name'];?></p>
                </div>
            </div>

            <div class="profile-info">
        <ul class=" text-end">
              <li><a href="" class=" d-inline-block text-dark border-2 border border-success mb-2"><i class="fa-solid fa-user"></i></a>
                 <ul>
                    <li><a href="owner-profile.php">Profile</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="time-list.php">Time List</a></li>
                    <li><a href="time-slot.php">Time Slot</a></li>
                    <li><a href="owner_logout.php?action=logout">Logout</a></li>

                    </ul>
                  </li>
          </ul>
                        
        </div>
        </div>

        
    </div>
    <!-- List header Area End -->


<!-- Booking Profile Area Start -->
<section class="booking-prof pt-80 pb-80">
    <div class="container">
        <div class="section-title">
            <span><span class="fs-1">my profile!!</span></span>
           
        </div>

        
        <div class="booking-profile d-flex mt-4">
            
            
          <div class="booking-img">
            <img src="assets/images/booking.jpg" alt="">
          </div>
          <div class="profile-form ">
            <form action="" method="post" >
                <br/>
                <br/>
                <label class="fs-5 text-capitalize pb-2" for="">Owner Name:</label>
                <input type="text" value="<?php echo $_SESSION['full_name'];?>" name="full_name"/>
                <br/>
                <br/>
                <label class="fs-5 text-capitalize pb-2" for="">Phone Number:</label>
                <input type="text" value="<?php echo $_SESSION['mobile'];?>" name="mobile"/>
                <br/>
                <br/>
                <label class="fs-5 text-capitalize pb-2" for="">Email:</label>
                <input class="bg-light" value=" <?php echo $_SESSION['OwnerEmail'];?>" type="email" name="OwnerEmail"/>
            </form>
        </div>
        </div>
        
    </div>

    
</section>
<!-- Booking Profile Area End -->

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
<!-- Footer Area End -->

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