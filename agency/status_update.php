<!DOCTYPE html>
<?php include 'Session.php';
 Session:: init();

 ?>
<?php include 'lib/database.php';?>
<?php $db = new database;?>
<?php include '../helper/Format.php';?>
<?php $fm = new Format;?>
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
            <div class="list-header">
                <div class="list-logo">
                    <a href="#"><span>s</span>ports arena</a>
                </div>

              
                <div class="list-profile">
                  
                    <ul>
                        <li>
							 <a href="#" class="mb-5 indoorname">
                 <?php echo $_SESSION['indoor_name'];?>
							</a>
						
						</li>
                    </ul>
                </div>
                <div class="profile-info">
                        <ul class=" text-end">
                            <li><a href="" class=" d-inline-block text-dark border-2 border border-success mb-2"><i class="fa-solid fa-user"></i></a>
                            <ul>
                                    <li><a href="owner-profile.php">Profile</a></li>
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="time-list.php">Time List</a></li>
                                    <li><a href="time-slot.php">Time Slot</a></li>
                                    <li><a href="owner_logout.php?action=logout">logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        
                  </div>
            </div>
        </div>
    </div>
    <!-- List header Area End -->
             <?php  
                   if(isset($_GET['editbookingaction'] )){
                   $editbooking=$_GET['editbookingaction'];

                   }
                  ?>
                  <?php 
                              if(isset($_POST['submit'])){
                                $status=$_POST['status'];
                                $update="update  booking
                                         set
                                         status='$status'
                                         where  bookig_id='$editbooking'
                                         ";

                                $udate_status=$db->update($update);
                                if( $udate_status){
                                   header('Location:agency-booking-list.php');

                                }
                            }
                           
                            ?>
          
          
                    <div class="container">
                        <div class="form-area">
                        <form action="" method="post">    
                     <div class="group-img">
                        <h4 class="mb-3" style="color:#097E52">Confirm Your Booking</h4>
                     <select name="status">
                                <option value="pending" >pending</option>
                                <option value="confirm">confirm</option>
                        </select>
                     </div>
                         <button type="submit" class="mt-3 ms-5 btn" name="submit">submit</button>
                        </form> 
                        </div>
                    </div>
                        
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
<!-- Owl Carosoul -->
<script src="assets/js/owl-carousl.min.js"></script>
<!-- Bootstrap.js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Slick JS -->
<script src="assets/js/slicknav.min.js"></script>
<!-- Slider JS -->
<script src="assets/js/slider.js"></script>
<!-- Main js -->
<script src="assets/js/main.js"></script>


<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>