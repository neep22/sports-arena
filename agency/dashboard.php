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
    <title>Sports Arena | Dashboard</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Responsive CSS -->
     <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body class="d-flex">
    <!-- Sidebar Area Start Here -->
    <section class="sidebar-area">
        <div class="sidebar-logo">
            <ul>
                <li class="active">
                    <a href="dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="owner-profile.php">
                        <i class="fas fa-user"></i>
                    <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="time-list.php">
                        <i class="fa-solid fa-clock"></i>
                        <span>Time List</span>
                    </a>
                    
                </li>

                <li>
                    <a href="time-slot.php">
                        <i class="fa-solid fa-clock"></i>
                        <span>Time Slot</span>
                    </a>
                    
                </li>

                  <li> 
                    <a href="agency-booking-list.php">
                    <i class="fas fa-chart-bar"></i>
                        <span>Booking List</span>
                    </a>
                    
                </li>
                <li class="sidebar-logout">
                    <a href="owner_logout.php?action=logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Log out</span>
                    </a>
                    
                </li>
            </ul>
        </div>
    </section>
    <!-- Sidebar Area Start Here -->

    <!-- Main Content Area Start Here -->
    <section class="main-content">
        <div>
            <div class="header-wrapper">
                <div class="header-title">
                    <h2>Dashboard</h2>
                </div>
                <div class="user-info">
                    <!--<div class="search">
                        <form action="">
                            <i class="fa-solid fa-search"></i>
                            <input type="text" placeholder="Search">
                        </form>
                    </div>-->
                    <img src="assets/images/user.png" alt="">
                </div>
            </div>
        </div>
        <!-- Card Area Start Here -->
        <div class="card-area">
            <span>Analytical Data</span>
            <div class="row">
                <div class="col-xl-4">
                 <div class="card-box">

                  <?php 
                    if(isset($_SESSION['id'])){
                      $sessionid=$_SESSION['id'];

                    }    
                    ?>

                   <?php
					      
                        
                          $booking_confirm="select * from booking 
                          where ownerId=$sessionid and status='confirm'";
                          $booking_confirm_read=$db->selectorder($booking_confirm);
                          $result_confirm=mysqli_num_rows($booking_confirm_read);
                          if($result_confirm!=false){         
     
                      
                    ?>
                     <div class="card-info">
                            <h4>confirm total customer</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, ipsam!</p>
                        </div>
                       
                         <h5>
                        
                           <?php echo   $result_confirm; ?>
                        
                        </h5>
                        <?php }else{
                             
                        ?>
                        <div class="card-info">
                            <h4>Confirm Total Customer</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, ipsam!</p>
                        </div>
                       
                         <h5>
                        
                           <?php echo  "0"; ?>
                        
                        </h5>
                        <?php }?>
                       
                     
                    </div>
						
                         
		
                  
                    
                </div>
                <div class="col-xl-4">
                    <div class="card-box">
                   <?php 
                      
                        $booking_pending="select * from booking 
                          where ownerId=$sessionid and status='pending'";
                          $booking_pending_read=$db->selectorder($booking_pending);
                          $result=mysqli_num_rows($booking_pending_read);
                          

                          if($result!=false){         
     
                      
                    ?>
                        <div class="card-info">
                            <h4>Pending</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, ipsam!</p>
                        </div>
                       
                         <h5>
                        
                           <?php echo   $result; ?>
                        
                        </h5>
                        <?php }else{
                             
                        ?>
                        <div class="card-info">
                            <h4>No Pending Request</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, ipsam!</p>
                        </div>
                       
                         <h5>
                        
                           <?php echo  "0"; ?>
                        
                        </h5>
                        <?php }?>
                       
                     
                    </div>
                
                </div>
                <div class="col-xl-4">
                    <div class="card-box">
                        <div class="card-info">
                            <h4>Cup of Tea</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, ipsam!</p>
                        </div>
                        <h5>100</h5>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Card Area End Here -->
    </section>
    <!-- Main Content Area End Here -->

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
    <script src="assets/js/script.js"></script>
    
</body>
</html>