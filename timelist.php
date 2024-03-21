<!DOCTYPE html>
<html lang="en">

<?php include 'database.php';?>
<?php include 'helper/format.php';?>
<?php $db = new database;?>
<?php $fm = new Format;?>
<?php include 'Session.php';
 Session:: init();
 ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS -->
    <title>Sports Arena | Time Slot</title>
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
    <!-- List header Area End -->

    <!-- List Table Area Start -->
    <div class="list-table-area">
        <div class="container">

        <!-- select time -->
        <?php
                 
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
                     //day for time list
                    
                      $db=new database();
                      $query="select * from days";
                      $read_slot=$db->select($query);
                      if($read_slot){              
                      while($result=$read_slot->fetch_assoc()){

                  ?>
                    <?php 
                      if(isset($_GET['timelistid'])){
                        $ownerid= $_GET['timelistid'];
                     
                       
                       $query_owner="select * from owners where id='$ownerid'";
                       $read_owner=$db->select($query_owner);
                       if($read_owner){              
                       while($result_owner=$read_owner->fetch_assoc()){
                    
                    
                    ?>
                      <li><a   class="button ms-3 me-5" href="timeByDay.php?dayid=<?php echo $result['id'];?>&ownerbyid=<?php echo $result_owner['id']; ?> "> <?php echo $result['day'];?></a>
                    </li>
                    <?php }} ?>
                    <?php  }}} ?>
                    
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
         <?
           /*if(isset($_GET)){
         
              $dayid=$_GET['dayid'];
              $ownerbyid=$_GET['ownerbyid'];
            }*/

             
              ?>
             

         

              
           
              
              <table class="styled-table">
            
                  
                    <tbody>
                    <?php
                        /*$query="Select  slot.*,days.day,owners.id
                        from slot
                        inner join days on slot.dayID =days.id 
                    
                        where slot.dayID='$dayid' and slot.ownerID='$ownerbyid'";
                        $queryread=$db->select($query);
                        if($queryread){
                          while($result=$queryread->fetch_assoc()){
                      */
                  ?>
                      <tr>
                        <td><button type="submit" class="mt-2 button">
                        
                        </button> </td>
                         <td> <button type="button" class="mt-2 button"> <a href=""  >Edit</a></button>
                                
                        
                     
                        
            
                      </tr>
                      <?php /*}}*/?>
                      
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
 <!-- Slicknav js -->
 <script src="assets/js/slicknav.min.js"></script>
<!-- Main js -->
<script src="assets/js/main.js"></script>
<script src="assets/js/slicknav.js"></script>


<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>