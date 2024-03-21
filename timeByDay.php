<!DOCTYPE html>
<?php include 'database.php';?>
<?php include 'helper/format.php';?>
<?php $db = new database;?>
<?php $fm = new Format;?>
<?php include 'Session.php';
 Session:: init();
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS -->
    <title>Sports Arena | Time Slot | TimeList By Day</title>
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

    <!-- List Day Area Start Here -->
    <section>

       
             <?php
                  if(isset($_GET['dayid'])){
                      $dayid=$_GET['dayid'];
                    
                  }
               
              ?>

              <?php
                if(isset($_GET['ownerbyid'])){
                    $ownerbyid=$_GET['ownerbyid'];
                  
                }    
              ?>


        <div class="container">
            <!-- List Table Area Start -->
      <div class="list-table-area">
        <div class="container">
            <div class="list-table">
                <h3><span>Time Slot </span>List</h3>
                <table class="styled-table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                     

                    <?php
                        $query="Select  slot.*,days.day
                        from slot
                        inner join days on slot.dayID =days.id 
                        inner join owners on slot.ownerID =owners.id 
                        where slot.dayID=$dayid and slot.ownerID=$ownerbyid
                        order by slot.id
                        ";
                        $read=$db->select($query);
                        if($read){
                          while($result=$read->fetch_assoc()){
                      
                   ?>
                      <tr>
                        <td>1</td>
                        <td>
                            <button type="button" class="button"><?php echo $fm->formatDate($result['start_from']); ?>-<?php echo $fm->formatDate($result['end_to']); ?></button>
                  
                        </td>
                        <td>
                            <a class="button" href="cheackout.php?bookslotid=<?php echo $result['id']; ?>&dayid=<?php echo $result['dayID'];?>&ownerid=<?php echo $result['ownerID'];?>">Book Now</a>
                        </td> 
                      </tr>

                      <?php }}else{
                        header("Location:not_available.php");
                         }?>
                      
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- List Table Area End -->
        </div>
    </section>
    <!-- List Day Area End Here -->

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