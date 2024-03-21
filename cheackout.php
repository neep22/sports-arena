<?php include 'Session.php';
 Session:: init();
 ?>
<?php include 'database.php';?>
<?php include 'helper/format.php';?>
<?php $db = new database;?>
<?php $fm = new Format;?>
 <?php if(isset($_SESSION['login'])==true){
	?>
<!DOCTYPE html>
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



     <!-- checkout Area starts -->

          <!-- php for time and day get -->

              <?php
                  if(isset($_GET['dayid'])){
                      $dayid=$_GET['dayid'];
                    
                  }
               
              ?>

              <?php
                if(isset($_GET['bookslotid'])){
                    $bookslotid=$_GET['bookslotid'];
                  
                }    
              ?>

              <?php
                  if(isset($_GET['ownerid'])){
                      $ownerid=$_GET['ownerid'];
                    
                  }
               
              ?>


                <?php

                if(isset($_POST['submit'])){
                                    
                  $userid =$_SESSION['id'];
                  $dayId =$_POST['dayId'];
                  $start_time=$_POST['start_time'];
                  $end_time=$_POST['end_time']; 
              
                  $payment_method=$_POST['payment_method'];
                  if(empty($start_time)||empty($end_time)){
                    echo "fill must not be empty";
                 }else{
                   $query= "select* from  booking  where (dayId='$dayId' and
                                                          ownerId='$ownerid' and
                                                          start_time='$start_time'and
                                                          end_time='$end_time')

                   limit 1";
                   $mailcheck= $db->select($query);
                    if($mailcheck != false){
                   echo "<script>alert('Timeslot already booked')</script>";

                }else{
                $insert="INSERT INTO booking(ownerId,dayId,userId,start_time,end_time,status,payment_method)
                VALUES('$ownerid','$dayId','$userid','$start_time','$end_time','pending','$payment_method')";
                  $insert_rows=$db->insert($insert);
                  if($insert_rows){
                      echo "<script>alert('booking Success please wait for ownner confirmation')</script>";
            }else{
                echo "<script>alert('TimeSlot Insert not Success')</script>";
            }
          }       
        }
      }
    
     ?>


            

    
     <div class="payment-area pt-80 pb-80">
        <div class="container"> 
            <div class="Payment-details">
            <h4>Booking Details</h4>
            <form action="" method="post">
            <?php
            //select time and day by reference 
                        $query="Select  slot.*,days.day,days.id
                        from slot
                        inner join days on slot.dayID =days.id 
                        inner join owners on slot.ownerID =owners.id 
                        where slot.dayID=$dayid and slot.id=$bookslotid
                       
                        ";
                        $read=$db->select($query);
                        if($read){
                          while($result=$read->fetch_assoc()){
                      
                   ?>

                <label>Name</label> <br/>
                <input type ="text" value="<?php echo $_SESSION['full_name']; ?>" name="Name" readonly required/> <br/><br/> 
                <label>Phone</label> <br/>
                <input type ="phone" value="<?php echo $_SESSION['mobile']; ?>" name="mobile" readonly required/> <br/><br/>  
                <label>Email Address</label> <br/>
                <input type ="email" value="<?php echo $_SESSION['email']; ?>" name="email" readonly required/> <br/><br/>
                <label>Day </label> <br/>
                <input type ="text" value="<?php  echo $result['dayID'];?>" name="dayId" required/> <br/><br/>  
                <label> Start Time </label> <br/>
                <input type="time" value="<?php  echo $result['start_from']; ?>" name="start_time" readonly/> <br/><br/>
                <label> End Time </label> <br/>
                <input type="time" value="<?php echo $result['end_to']; ?>" name="end_time" readonly/> <br/><br/>
                </div>
                <?php }}?>
                
            <div class="order-details">
                <h4>Your Order</h1>
                  <div class="card mb-5" style="width: 72rem;">
                    <div class="card-body">
                    <div class="form-check ms-3">
                          <input class="form-check-input" type="radio" name="payment_method" value="cash" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">
                            Cash on delivary
                          </label>
                          
                         <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 122.88 118.34"><title>cash-on-delivery</title><path d="M29.82,7.46h0A2.54,2.54,0,0,0,27.24,10v5.76l-7.45,7.45V6.88A6.91,6.91,0,0,1,21.8,2h0a7,7,0,0,1,4.87-2H116a7,7,0,0,1,4.87,2h0a7.11,7.11,0,0,1,2,4.86V80.24c0,1.83-.45,3.94-2,4.87h0a6.92,6.92,0,0,1-4.86,2H61.68A22,22,0,0,0,60.06,82l2.4-2.39h50.45a2.54,2.54,0,0,0,2.52-2.53V10a2.54,2.54,0,0,0-2.54-2.54H99.09V33.89L84.51,26.6,70,33.89V7.46ZM9.34,77.7l-3.18,18a1.41,1.41,0,0,1-.3.64,7,7,0,0,0-1.61,3.28,1.82,1.82,0,0,0,.5,1.82L16.28,113a5.27,5.27,0,0,0,2.8,1.43,7.07,7.07,0,0,0,3.75.11l.09,0,2.17-.54c3.33-.81,6.23-1.53,8.93-4l3.46-3.61a1.15,1.15,0,0,1,.14-.17c.05,0,.39-.39.85-.82,2.36-2.32,5.3-5.18,3.51-7.68l-1.39-1.39c-.67.65-1.38,1.28-2.06,1.9s-1.21,1.06-1.75,1.6a1.46,1.46,0,0,1-2.07-2.07c.53-.54,1.2-1.13,1.88-1.74,2.35-2.06,5-4.43,3.59-6.5l-1.37-1.37-.2-.25c-.79.81-1.66,1.58-2.51,2.33-.62.55-1.2,1.06-1.74,1.6a1.47,1.47,0,0,1-2.07,0,1.45,1.45,0,0,1,0-2.07c.53-.54,1.2-1.13,1.88-1.73,2.35-2.07,5-4.44,3.59-6.51l-1.37-1.37a1.78,1.78,0,0,1-.24-.32l-4,4a1.46,1.46,0,0,1-2.07-2.07l7.55-7.55c1.81-1.81,2.22-3.69,1.75-5.12-.17-.52,0-.53-.38-.9a3.33,3.33,0,0,0-.63-.49h0c-.11,0-.19-.06-.3-.17a2.78,2.78,0,0,0-.4-.16c-1.25-.42-2.44.32-4.08,1.71l-.07.06c-.18.15-.36.31-.54.49L17.27,85.34a1.47,1.47,0,0,1-2.07,0,1.45,1.45,0,0,1-.14-1.91L9.34,77.7Zm9.46,1.08.51-.5L29.64,67.94a10.08,10.08,0,1,1,11.28-2.08l-.1.1a2.39,2.39,0,0,1,.23.22,6.11,6.11,0,0,1,.85,1L54.72,54.41a5.08,5.08,0,0,1,0-7.15l-9.55-9.55a5.05,5.05,0,0,1-7.14,0L11.46,64.28a5.08,5.08,0,0,1,0,7.15l7.34,7.35Zm22.54-3.4a10.48,10.48,0,0,1-1.22,1.42l-1.49,1.5,0,0a1.67,1.67,0,0,1,.32.24l1.43,1.44a1.83,1.83,0,0,1,.21.26,4.93,4.93,0,0,1,.26,6,1.46,1.46,0,0,1,.53.34l1.43,1.43a1.78,1.78,0,0,1,.21.27,5,5,0,0,1,0,6.35,1.19,1.19,0,0,1,.18.15l1.43,1.43a2.78,2.78,0,0,1,.21.27c3.33,4.55-.64,8.41-3.83,11.53l-.82.82-3.55,3.73-.12.11c-3.25,3-6.48,3.74-10.21,4.65l-2.13.53-.06,0a12.7,12.7,0,0,1-5.49.39A8.1,8.1,0,0,1,14.28,116L1.89,103.55A4.6,4.6,0,0,1,.55,99.08,11.82,11.82,0,0,1,3,94.39L6.26,75.62v-.08c0-.23.08-.49.13-.78L0,68.38,42.16,26.22,66.33,50.39l-25,25Z"/></svg>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="payment_method" value="bkash" id="flexRadioDefault2" checked>
                          <label class="form-check-label" for="flexRadioDefault2">
                            bkash
                          </label>
                          
                          <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" version="1.1" id="Layer_1" viewBox="-37.0635 -39.1825 321.217 235.095"><defs id="defs157"><style id="style155">.cls-1{fill:#d12053}.cls-2{fill:#e2136e}.cls-3{fill:#9e1638}.cls-4{fill:#231f20}.cls-5{fill:#808285}</style></defs><path transform="translate(.01)" id="polygon161" class="cls-1" d="M223.65 62.45l-53.03-8.31 7.03 31.6z"/><path transform="translate(.01)" id="polygon163" class="cls-2" d="M223.65 62.45L183.69 6.93l-13.06 47.22z"/><path transform="translate(.01)" id="polygon165" class="cls-1" d="M169.39 53.51L127.52 0l54.83 6.55z"/><path transform="translate(.01)" id="polygon167" class="cls-3" d="M150.32 31.15L127.07 9.24h6.12z"/><path transform="translate(.01)" id="polygon169" class="cls-1" d="M234.96 35.46l-9.84 26.69-15.95-22.06z"/><path transform="translate(.01)" id="polygon171" class="cls-2" d="M183.84 84.14l38.61-15.51 1.62-4.93z"/><path transform="translate(.01)" id="polygon173" class="cls-3" d="M152.96 113.41l16.54-58.02 8.39 37.75z"/><path transform="translate(.01)" id="polygon175" class="cls-2" d="M236.5 35.67l-4.06 11.02 14.64-.24z"/><path id="path177" d="M.01 40.09c.71.06 1.43.19 2.19.19s1.38-.13 2.19-.19v23.47c2.31-3.93 5.22-6.52 9.5-6.52 7.74 0 11.06 7.66 11.06 14.7 0 8.43-4.5 16.5-12.39 16.5a8.66 8.66 0 01-7.77-4.47c-1.32 1.16-2.49 2.55-3.74 3.81h-1zm4.28 34.52c0 6.84 2.9 11.61 7.67 11.61 6.19 0 8.18-8.32 8.18-14.22 0-6.85-2.26-12.24-7.62-12.3-6.26-.05-8.23 7.36-8.23 14.92" class="cls-2"/><path id="path179" d="M45.14 55.27l-4.66 6c4.38 6.4 8.92 12.67 13.32 19.15l4.44 7v.35c-1.09-.07-2.08-.21-3-.21-.92 0-2.08.14-3.06.21-1.21-2.24-2.41-4.31-3.78-6.34l-12-17.75c-.27-.28-.92-.5-.92-.21v24.3c-.88-.07-1.65-.21-2.41-.21-.76 0-1.64.14-2.41.21V40.09c.77.06 1.6.21 2.41.21s1.53-.15 2.41-.21v21.52c0 .42.82.14 1.36-.42a37.1 37.1 0 002.92-3.42l13.49-17.7c.71.06 1.42.21 2.19.21s1.36-.15 2.14-.21z" class="cls-4"/><path id="path181" d="M81.43 82.4c0 2.48-.16 3.74 3.07 2.92v1.39a8.87 8.87 0 01-1.65.63c-2.85.57-5.21.06-5.65-3.67l-.49.55a10.17 10.17 0 01-8.12 4c-3.88 0-7.28-3.06-7.28-7.75 0-7.23 5-8.18 10.13-9.13 4.34-.82 5.82-1.2 5.82-4.25 0-4.7-2.3-7.42-6.41-7.42a6.85 6.85 0 00-6.52 4.37h-.6v-3.52a14.2 14.2 0 018.87-3.48c5.75 0 8.88 3.48 8.88 10.65zm-4.38-10.47l-1.93.44c-3.73.82-9.32 1.45-9.32 7.24 0 4 2 6 5.36 6a6.83 6.83 0 004.44-2.44c.4-.46 1.5-1.54 1.5-2z" class="cls-4"/><path id="path183" d="M91.2 81.56c1.3 2.49 3.72 4.72 6.3 4.72a5.67 5.67 0 005.38-5.78c0-8.56-12.95-3-12.95-14.08 0-6.08 4-9.37 8.93-9.37a11.57 11.57 0 016.2 1.64 32.79 32.79 0 00-1.3 4.5h-.5c-.72-2.09-2.63-4.19-4.66-4.19-2.74 0-5 1.85-5 5.28 0 8.11 12.95 3.79 12.95 13.94 0 6.79-5.26 10-10.1 10a12.73 12.73 0 01-6.84-2 34.42 34.42 0 001.15-4.65z" class="cls-4"/><path id="path185" d="M113.93 40.09c.73.06 1.44.19 2.2.19.76 0 1.38-.13 2.2-.19v23.09c1.92-3.87 4.93-6.14 8.83-6.14 6.36 0 8.83 4.36 8.83 12.36v18.37c-.83-.07-1.47-.19-2.2-.19-.73 0-1.48.13-2.2.19V70.85c0-7-1.41-10.53-6.08-10.53-4.94 0-7.18 3.56-7.18 10.15v17.3c-.82-.07-1.47-.19-2.2-.19-.73 0-1.46.13-2.2.19z" class="cls-4"/><path id="path187" d="M7.98 150.96l-.19-1.59h-.08a4.7 4.7 0 01-3.85 1.87A3.59 3.59 0 010 147.62c0-3 2.71-4.71 7.58-4.69v-.26a2.59 2.59 0 00-2.85-2.9 6.28 6.28 0 00-3.28.94l-.52-1.52a7.87 7.87 0 014.14-1.12c3.86 0 4.8 2.63 4.8 5.15v4.72a17.38 17.38 0 00.21 3zm-.38-6.43c-2.5-.05-5.34.39-5.34 2.84a2 2 0 002.16 2.19 3.14 3.14 0 003-2.11 2.46 2.46 0 00.13-.73z" class="cls-5"/><path id="path189" d="M19.15 133.64a22 22 0 014.14-.36c2.26 0 3.73.39 4.82 1.28a3.68 3.68 0 011.46 3.1 4.17 4.17 0 01-3 3.86v.05a4.53 4.53 0 013.62 4.4 4.73 4.73 0 01-1.48 3.52c-1.23 1.12-3.21 1.64-6.07 1.64a26.28 26.28 0 01-3.52-.21zm2.27 7.19h2.05c2.4 0 3.81-1.25 3.81-2.94 0-2.06-1.56-2.87-3.86-2.87a9.44 9.44 0 00-2 .16zm0 8.42a12.47 12.47 0 001.9.1c2.34 0 4.51-.86 4.51-3.41 0-2.4-2.06-3.39-4.54-3.39h-1.87z" class="cls-5"/><path id="path191" d="M33.27 133.64a23.68 23.68 0 014.33-.37c2.42 0 4 .44 5.08 1.44a4.36 4.36 0 011.38 3.33 4.61 4.61 0 01-3.31 4.48v.08c1.35.47 2.16 1.72 2.57 3.55a27.8 27.8 0 001.36 4.82h-2.32a22.92 22.92 0 01-1.17-4.2c-.52-2.42-1.46-3.33-3.51-3.41h-2.15v7.61h-2.26zm2.26 8h2.32c2.42 0 4-1.33 4-3.33 0-2.27-1.64-3.26-4-3.29a9.21 9.21 0 00-2.24.21z" class="cls-5"/><path id="path193" d="M50.25 145.44l-1.82 5.52h-2.35l6-17.56h2.73l6 17.56h-2.45l-1.88-5.52zm5.76-1.77l-1.72-5.06c-.4-1.14-.65-2.18-.91-3.2h-.05c-.26 1-.55 2.11-.89 3.18l-1.72 5.08z" class="cls-5"/><path id="path195" d="M75.23 150.39a11.32 11.32 0 01-4.64.83c-5 0-8.67-3.12-8.67-8.88 0-5.5 3.72-9.22 9.17-9.22a9.42 9.42 0 014.16.78l-.54 1.87a8.33 8.33 0 00-3.54-.73c-4.12 0-6.85 2.63-6.85 7.24 0 4.3 2.47 7.06 6.75 7.06a9 9 0 003.69-.73z" class="cls-5"/><path id="path197" d="M83.6 133.64a22 22 0 014.14-.36c2.26 0 3.73.39 4.82 1.28a3.68 3.68 0 011.46 3.1 4.17 4.17 0 01-3 3.86v.05a4.53 4.53 0 013.62 4.4 4.73 4.73 0 01-1.48 3.52c-1.23 1.12-3.21 1.64-6.07 1.64a26.29 26.29 0 01-3.52-.21zm2.27 7.19h2.05c2.4 0 3.81-1.25 3.81-2.94 0-2.06-1.56-2.87-3.86-2.87a9.44 9.44 0 00-2 .16zm0 8.42a12.47 12.47 0 001.9.1c2.34 0 4.51-.86 4.51-3.41 0-2.4-2.06-3.39-4.54-3.39h-1.89z" class="cls-5"/><path id="path199" d="M104.6 150.96l-.18-1.59h-.08a4.71 4.71 0 01-3.86 1.87 3.59 3.59 0 01-3.85-3.62c0-3 2.71-4.71 7.58-4.69v-.26a2.6 2.6 0 00-2.86-2.92 6.3 6.3 0 00-3.29.94l-.52-1.52a7.85 7.85 0 014.14-1.12c3.86 0 4.8 2.63 4.8 5.15v4.72a17.39 17.39 0 00.21 3zm-.34-6.44c-2.5-.05-5.34.39-5.34 2.84a2 2 0 002.16 2.19 3.13 3.13 0 003-2.11 2.33 2.33 0 00.13-.73z" class="cls-5"/><path id="path201" d="M110.18 141.77c0-1.3 0-2.37-.1-3.41h2l.13 2.08a4.64 4.64 0 014.17-2.37c1.75 0 4.45 1 4.45 5.37v7.53h-2.23v-7.27c0-2-.75-3.73-2.92-3.73a3.27 3.27 0 00-3.08 2.34 3.48 3.48 0 00-.15 1.07v7.58h-2.29z" class="cls-5"/><path id="path203" d="M126.89 144.14h.06c.31-.44.75-1 1.12-1.43l3.7-4.35h2.76l-4.87 5.19 5.54 7.42h-2.78l-4.35-6-1.17 1.3v4.74h-2.3v-18.54h2.26z" class="cls-5"/><path id="path205" d="M156.87 150.5a8.5 8.5 0 01-3.62.73c-3.8 0-6.27-2.58-6.27-6.44a6.4 6.4 0 016.77-6.7 7.66 7.66 0 013.18.65l-.52 1.78a5.27 5.27 0 00-2.66-.6c-2.89 0-4.45 2.14-4.45 4.77 0 2.92 1.88 4.71 4.38 4.71a6.52 6.52 0 002.81-.63z" class="cls-5"/><path id="path207" d="M170.81 144.55c0 4.66-3.23 6.7-6.28 6.7-3.41 0-6-2.5-6-6.49 0-4.22 2.76-6.69 6.25-6.69s6.03 2.63 6.03 6.48zm-10 .13c0 2.76 1.59 4.84 3.83 4.84s3.83-2.06 3.83-4.9c0-2.14-1.07-4.84-3.78-4.84s-3.89 2.51-3.89 4.91z" class="cls-5"/><path id="path209" d="M173.7 141.77c0-1.3 0-2.37-.1-3.41h2l.11 2h.08a4.34 4.34 0 014-2.32 3.74 3.74 0 013.57 2.53 5.34 5.34 0 011.41-1.64 4.3 4.3 0 012.79-.88c1.66 0 4.14 1.09 4.14 5.47v7.42h-2.24v-7.14c0-2.43-.89-3.89-2.73-3.89a3 3 0 00-2.71 2.08 4 4 0 00-.18 1.15v7.79h-2.24v-7.55c0-2-.89-3.47-2.63-3.47a3.14 3.14 0 00-2.84 2.3 3.23 3.23 0 00-.18 1.12v7.61h-2.25z" class="cls-5"/><path id="path211" d="M195.41 142.47c0-1.62-.05-2.92-.1-4.11h2.06l.1 2.16h.05a5 5 0 014.48-2.45c3.05 0 5.34 2.58 5.34 6.41 0 4.54-2.76 6.77-5.73 6.77a4.41 4.41 0 01-3.88-2h-.06v6.85h-2.26zm2.26 3.36a5.67 5.67 0 00.1.94 3.55 3.55 0 003.44 2.69c2.42 0 3.83-2 3.83-4.87 0-2.53-1.33-4.69-3.76-4.69a4 4 0 00-3.62 3.77z" class="cls-5"/><path id="path213" d="M217.22 150.96l-.19-1.59h-.07a4.7 4.7 0 01-3.85 1.87 3.59 3.59 0 01-3.86-3.62c0-3 2.71-4.71 7.58-4.69v-.26a2.6 2.6 0 00-2.87-2.92 6.27 6.27 0 00-3.28.94l-.52-1.52a7.83 7.83 0 014.14-1.12c3.85 0 4.79 2.63 4.79 5.15v4.72a17.86 17.86 0 00.21 3zm-.34-6.44c-2.5-.05-5.35.39-5.35 2.84a2 2 0 002.17 2.19 3.14 3.14 0 003-2.11 2.48 2.48 0 00.13-.73z" class="cls-5"/><path id="path215" d="M222.78 141.77c0-1.3 0-2.37-.1-3.41h2l.13 2.08a4.64 4.64 0 014.17-2.37c1.74 0 4.45 1 4.45 5.37v7.53h-2.29v-7.27c0-2-.76-3.73-2.92-3.73a3.26 3.26 0 00-3.07 2.34 3.34 3.34 0 00-.15 1.07v7.58h-2.3z" class="cls-5"/><path id="path217" d="M237.74 138.36l2.76 7.45c.29.83.6 1.82.81 2.58h.06c.23-.76.49-1.72.8-2.63l2.5-7.4h2.42l-3.44 9c-1.64 4.32-2.76 6.54-4.32 7.89a6.27 6.27 0 01-2.81 1.48l-.57-1.93a6.07 6.07 0 002-1.12 7 7 0 001.93-2.55 1.82 1.82 0 00.18-.55 2.15 2.15 0 00-.16-.6l-4.67-11.62z" class="cls-5"/></svg>
                        </div>
                        <div class="form-check ms-3">
                          <input class="form-check-input" type="radio" value="nogod" name="payment_method" id="flexRadioDefault2" checked>
                          <label class="form-check-label" for="flexRadioDefault2" >
                            nogod
                          </label>
                          
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" xml:space="preserve" y="0" x="0" id="Layer_1" version="1.1" viewBox="-45 -32.75825 390 196.5495"><style id="style1431" type="text/css">.st0{fill:#eb2329}.st1{fill:#f89621}</style><style type="text/css" id="style1431-6">.st0{fill:#eb2329}.st1{fill:#f89621}</style><style type="text/css" id="style1384">.st0{fill:#ed1c24}.st1{fill:#f7941d}</style><g transform="translate(-1266.194 -110.295) scale(2.59472)" id="g1438"><g id="g1406" transform="translate(481.988 41.407)"><g id="g1390"><path id="path1386" d="M80.6 20.7H60.4c-.4 0-.6.3-.6.6v1.6c0 .4.3.6.6.6h15.1v8.4c-.4-.6-.9-1.2-1.4-1.8-1.8-1.8-3.7-2.7-5.7-2.7-1.6 0-2.9.8-4 2.2-.9 1.2-1.4 2.6-1.4 3.9 0 1.3.2 3 1.2 4.6 1.2 1.9 3.2 2.5 5 2.5 2.3 0 4.2-1.6 4.2-3.7 0-1.2-.6-2.2-1.7-2.9l-1.1-.6v1.8c-.1.5-.9 1.2-1.8 1.2-.8 0-1.5-.3-2-.8-.3-.3-.5-.9-.4-1.3 0-.6.2-1.1.6-1.6.5-.6 1-.9 1.8-.9 2 0 3.7.9 5.1 2.9 1.1 1.7 1.7 3.3 1.7 5.1V44l3 1.8c.1.1.2.1.3.1.4 0 .6-.3.6-.6V23.6h1.2c.4 0 .6-.3.6-.6v-1.6c0-.4-.3-.7-.7-.7z" class="st0" fill="#ed1c24"/><path id="path1388" d="M121 20.7H95.4c-.4 0-.6.3-.6.6v2.8c-2.5-2.6-4.7-3.9-6.7-3.9-1.9 0-3.5.4-4.9 1.5-1.3 1-2.1 2.3-2.1 3.8 0 4.5 5 4.4 6.3 3.8.2-.1.5-.3.8-.3 1 0 1.4.8 1.4 1.5 0 1-1.5 1.9-3.3 1.9-1 0-1.6-.3-2-.9l-.8-1.2-.5 1.4c-.1.3-.3.7-.3 1.2 0 1 .5 2 1.5 2.9.9.8 2 1.2 3.2 1.2 1.9 0 3.5-.7 4.5-2.1.9-1.1 1.3-2.4 1.3-3.9 0-.8-.3-1.7-1-2.7-.8-1.2-1.8-1.8-2.9-1.8-.4 0-.9.1-1.4.3-.2.1-.6.2-.7.2-.2 0-.5-.1-.7-.4-.2-.2-.4-.5-.4-1 0-1.1 1-2.2 2.8-2.2h.1c1.2 0 2.4.6 3.5 1.7.9.9 1.6 1.8 2.2 2.8v15.9l3 1.8c.1.1.2.1.3.1.4 0 .6-.3.6-.6V23.6h4.6v13.9l3.6 1.5h.2c.3 0 .6-.2.6-.6v-.1c.6-4.1 2.4-6.9 5.4-8.6v.8c0 .6 0 2.1.1 2.9 0 .5 0 .8.1 1.1 0 1.6.2 4 .7 5.8 1 3.4 2.7 4.2 3.9 4.2h.1c.7 0 1.3-.2 1.7-.6.2-.2.5-.6.5-1.3 0-.6-.1-1.1-.3-1.5l-.3-.5-.6.1c-.6.2-.9.2-.9.1h-.1c-.2 0-.2 0-.3-.1-.2-.1-.6-.4-.9-1.5-.2-.8-.3-1.9-.3-2.5 0-4.5.9-7.9 2.4-8.6h.1c.2-.1.4-.3.4-.6 0-.1 0-.2-.1-.3v-.1c-.7-1.4-2.2-2.4-4.2-2.9h-.4c-1.6.3-3.5 1.4-5.9 3.4-.6.5-1.2 1-1.7 1.5v-5.5h14c.4 0 .6-.3.6-.6v-1.6c.1-.4-.2-.7-.6-.7z" class="st0" fill="#ed1c24"/></g><path id="path1392" d="M53.2 28.1c0 .7 0 1.3-.1 1.9-.2 2.8-.9 5.4-2 7.8-.4 1-.9 1.9-1.5 2.8-4.2 6.6-11.6 11-20 11-3.6 0-7-.8-10-2.2C11.6 45.7 6 37.5 6 28.1 6 18.8 11.4 10.8 19.1 7c-.6.8-1.2 1.6-1.7 2.5 0 .1-.1.1-.1.2-.3.3-.6.5-.9.8-.4.3-.7.7-1.1 1l-.2.2-.2.2c-.1.1-.2.3-.4.4-.2.3-.5.6-.7.9-1 1.3-1.8 2.7-2.4 4.2-.1.1-.1.3-.2.4-.1.2-.1.4-.2.5 0 .1-.1.2-.1.3-.1.3-.2.5-.3.8-.1.2-.1.4-.2.5 0 .1-.1.2-.1.3 0 .2-.1.4-.1.6l-.3 1.8c0 .2 0 .3-.1.5v2.4c0 6.4 2.9 12.2 7.6 15.9 3.6 2.9 8.1 4.7 13 4.7 4.5 0 8.6-1.4 12-3.9 2.5-1.8 4.5-4.1 6-6.8.2-.4.4-.7.6-1.1 1.2-2.5 1.9-5.2 1.9-8.1v-.7c0-.7 0-1.3-.1-2l.1.1c.3.3.6.5.9.8.3-.5.6-.9.9-1.4.2.9.3 1.8.4 2.8.1.9.1 1.6.1 2.3z" class="st0" fill="#ed1c24"/><path id="path1394" d="M32.4 9.2L28 1.1c-7.3 3.3-12.3 10.6-12.3 19.1 0 4.3 1.3 8.3 3.5 11.6-.2-1.1-.2-2.2-.2-3.4.1-8.7 5.6-16.1 13.4-19.2z" class="st1" fill="#f7941d"/><path id="path1396" d="M35.9 13.2c1.8-.5 3.8-.7 5.7-.7 1.2 0 2.5.1 3.6.3l-.1-3.6-.2-7.2c-.8-.1-1.7-.2-2.6-.2-4 0-7.7 1.3-10.7 3.4L34 9.6c-4.3 1.5-7.8 4.5-10 8.4-1.1 1.9-1.9 4.1-2.2 6.4.6-1.2 1.3-2.3 2.1-3.3 2.9-3.8 7.1-6.7 12-7.9z" class="st0" fill="#ed1c24"/><path id="path1398" d="M46.4 9.1l.2 5.1c-1.7-.5-3.4-.8-5.3-.8-3.5 0-6.8 1-9.7 2.7-3.6 2.2-6.4 5.7-7.8 9.8 1.4-1.9 3.1-3.6 5.1-4.9 2.9-1.9 6.4-3 10.1-3 2.8 0 5.4.6 7.8 1.7 1.8.8 3.4 1.9 4.8 3.3l2.8-4.2 3.6-5.5c-3.2-2.6-7.2-4.2-11.6-4.2z" class="st1" fill="#f7941d"/><path id="path1400" d="M50.9 25.7v.7c0 4.2-1.7 7.7-1.9 8.1-.2.4-.4.7-.6 1.1-1.5 2.7-3.5 5-6 6.8-3.4 2.4-7.5 3.9-12 3.9-4.9 0-9.5-1.7-13-4.7-4.6-3.8-7.6-9.5-7.6-15.9v-2.4c0-.2 0-.3.1-.5l.3-1.8c0-.2.1-.4.1-.6 0-.1.1-.2.1-.3.1-.2.1-.4.2-.5.1-.3.2-.6.3-.8 0-.1.1-.2.1-.3.1-.2.1-.4.2-.5.1-.1.1-.3.2-.4.6-1.5 1.5-2.9 2.4-4.2.2-.3.5-.6.7-.9.1-.1.2-.3.4-.4.1-.1.1-.2.2-.2.1-.1.1-.2.2-.2.3-.4.7-.7 1.1-1 .3-.3.6-.5.9-.8 0 .1-.1.1-.1.2s-.1.2-.1.2c-1.2 2.4-2 5.3-2.3 8.3-.1.8-.1 1.6-.1 2.5 0 10.8 6.3 19.5 14.1 19.5h.8c1.1 0 2.2-.2 3.3-.4 5.3-1.4 9.2-6.3 9.2-12v-.3c-.1-3.4-1.5-6.5-3.8-8.6 1.6 0 3.2.3 4.7.7 2.9.7 5.5 2.1 7.8 3.9l.1.1c-.1.4 0 1.1 0 1.7z" class="st1" fill="#f7941d"/><g id="g1404"><path id="path1402" d="M50.9 25.7v.7c0 4.4-2 8.2-2 8.2-.2.4-.4.7-.6 1.1-1.5 2.7-3.6 5-6.1 6.8-3.5 2.6-7.7 3.9-12.1 3.9-4.8 0-9.4-1.7-13.1-4.7-4.8-3.9-7.6-9.8-7.6-16 0-6.2 2.8-12.1 7.6-16l.2-.2c0 .1-.1.1-.1.2s-.1.1-.1.2c-4.7 3.9-7.4 9.6-7.4 15.8 0 6.2 2.7 11.9 7.5 15.9 3.6 3 8.3 4.6 13 4.6 4.3 0 8.5-1.3 12-3.9 2.5-1.8 4.5-4.1 6-6.8.2-.4.4-.7.5-1.1 0 0 2-3.7 2-8.1v-.7c0-.7 0-1.3-.1-2v-.1l.1.1.1.1c.2.8.2 1.4.2 2z" class="st1" fill="#f7941d"/></g></g></g></svg>
                        </div>
                        <button class="btn btn-bg d-block mt-5 mb-5 ms-1 ml-5" type="submit" name="submit" value="confirm booking" >Place Order</button>
                    </div>

                    
                 </form>
                  </div>
            </div>
        </div>
    </div>
    
    <!-- Payment Area Endss -->

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
                <li><a href="booking.html">booking</a></li>
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
      <?php }else{
       header("Location:user-login.php");
    }
    ?>
      <!-- Footer Area Ends -->