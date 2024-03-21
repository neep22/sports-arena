<!DOCTYPE html>
<html lang="en">
<?php include 'Session.php';
 Session:: init();

 ?>
<?php include 'lib/database.php';?>
<?php $db = new database;?>
<?php include '../helper/Format.php';?>
<?php $fm = new Format;?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS -->
    <title>Sports Arena | Time Slot</title>
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

    <!-- List Table Area Start -->
    <div class="list-table-area">
        <div class="container">

        <!-- select time -->

        <?php 
         if(isset($_SESSION['id'])){
          $sessionid=$_SESSION['id'];

         }
          
        
        ?>

            <div class="list-table">
                <h3><span>Time Slot </span>List</h3>
               
                
                <table class="styled-table">
                  <tbody>
               
                    <h4>
                    </h4>
                   <div class="day-list">
                    <ul>
                    <?php
                    
                    $db=new database();
                  $query="select * from days";
                  $read_slot=$db->select($query);
                  if($read_slot){              
                    while($result=$read_slot->fetch_assoc()){

                ?>
                      <li><a data-bs-toggle="modal" data-bs-target="#exampleModal" class="button ms-3 me-5" href="?dayid=<?php echo $result['id'];?>"> <?php echo $result['day'];?></a>
                    </li>
                    <?php }} ?>
                    </ul>
                    </div>
                    
                  </tbody>
                </table>
            </div>

            
        </div>
    </div>
    <!-- List Table Area End -->
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
<!-- Modal Area Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Timelist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="get">
        <ul>
        <?php

             if(isset($_GET['dayid'] )){
              $dayid=$_GET['dayid'];

             }

              ?>
              
           
              
              <table class="styled-table">
            
                  
                    <tbody>
                    <?php
                        $query="Select  slot.*,days.day
                        from slot
                        inner join days on slot.dayID =days.id 
                        where slot.dayID=$dayid and slot.ownerID=$sessionid";
                        $queryread=$db->select($query);
                        if($queryread){
                          while($result=$queryread->fetch_assoc()){

                  ?>
                      <tr>
                        <td><button type="submit" class="mt-2 button"><?php echo $fm->formatDate($result['start_from']); ?>-<?php echo $fm->formatDate($result['end_to']); ?></button> </td>
                         <td>  <a class="button" href="edit_time.php?editTimeid=<?php echo $result['id']; ?>"  >Edit</a>
                                || 
                         <a class="pt-2 button1" onclick="alert(are you sure to delete!)"  href="delete_ownertime.php?deleteTimeid=<?php echo $result['id']; ?>">Delete</a>
                       </td>
                     
                        
            
                      </tr>
                      <?php }}?>
                      
                    </tbody>
                  </table>
            

          </ul>
        </form>
      </div>
  </div>
</div>
<!-- Modal Area End -->


<!-- Nested Modal -->
          




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