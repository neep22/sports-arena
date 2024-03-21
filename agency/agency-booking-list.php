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
                    
                    <li class="active">
                    <a href="">
                    <i class="fas fa-chart-bar"></i>
                        <span>Booking List</span>
                    </a>
                    
                </li>
                <li class="sidebar-logout">
                    <a href="logout.php">
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
                <h2>Booking List</h2>
            </div>
            <div class="user-info">
                <div class="search">
                    <form action="">
                        <i class="fa-solid fa-search"></i>
                        <input type="text" placeholder="Search">
                    </form>
                </div>
                <img src="assets/images/user.png" alt="">
            </div>
        </div>
    </div>
    <!-- Booking Table Starts -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-hover table-bordered mt-5">
                   <tr class="text-center">  
                       <th>#</th>
                       <th>Customer Name</th>
                       <th>Mobile</th>
                       <th>Start Time</th>
                       <th>End Time</th>                
                       <th>Booking Date/Day</th>
                       <th>Status</th>
                   </tr>

                   <?php 
                    if(isset($_SESSION['id'])){
                      $sessionid=$_SESSION['id'];

                    }    
                    ?>
                  
                  <?php 
                    //php for booking list 
                      $query="Select  booking.*,days.day,owners.indoor_name,owners.indoor_location,owners.city,
                      users.full_name,users.mobile,users.email
                      from booking
                      inner join days on booking.dayId =days.id 
                      inner join owners on booking.ownerId =owners.id 
                      inner join users on booking.userId =users.id 
                      where booking.ownerId=$sessionid
                      ";
                      $read=$db->select($query);
                      if($read){
                        while($result=$read->fetch_assoc()){
                    
                    
                     ?>

                            
                   <tr class="text-center">
                       <td><?php echo $result['bookig_id'];  ?></td>
                       <td><?php echo $result['full_name'];  ?></td>
                       <td><?php echo $result['mobile'];  ?></td>
                       <td><?php echo  $fm->formatDate($result['start_time']);  ?></td>
                       <td><?php echo $fm->formatDate($result['end_time']);  ?></td>
                       <td><?php echo $result['day'];  ?></td>
                     
                       <td><button type="button" class="booking-btn"><a style="color:white" href="status_update.php?editbookingaction=<?php echo $result['bookig_id'];?>"> <?php echo $result['status']; ?></a></button>

                       
                    </td>
                   </tr>
                   <?php }}?>
                  
                </table>
           </div>
        </div>
        
      </div>
      <!-- Booking Table Ends -->
</section>
<!-- Main Content Area End Here -->

    


</body>
</html>