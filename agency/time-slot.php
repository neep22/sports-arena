<!DOCTYPE html>
<html lang="en">
<?php include 'Session.php';
 Session:: init();
 ?>
<?php include 'lib/database.php';?>
<?php $db = new database;?>
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




    <section class="time-slot-area">
        <div class="container">
        <?php 
 
                 $db=new database();
                 if(isset($_POST['submit'])){
                     
                     $day=$_POST['dayID'];
                     $ownerid =$_SESSION['id'];
                     $start_time=$_POST['start_from'];
                     $end_time=$_POST['end_to'];
                     
                     if(empty($day)||empty($start_time)||empty($end_time)){
                         echo "fill must not be empty";
                     }else{
                        $query= "select* from  slot  where (dayID= '$day'and
                                              start_from='$start_time'and
                                              end_to='$end_time')

                        limit 1";
                        $mailcheck= $db->select($query);
                         if($mailcheck != false){
                        echo "<script>alert('Timeslot already exist')</script>";

                     }
                     
                     else{
                    $insert="INSERT INTO slot(dayID,ownerID,start_from,end_to) VALUES('$day','$ownerid','$start_time','$end_time')";
                         $insert_rows=$db->insert($insert);
                         if($insert_rows){
                             echo "<script>alert('TimeSlot Insert Success')</script>";
                         }else{
                             echo "<script>alert('TimeSlot Insert not Success')</script>";
                         }
                     }
                     
                 }
 
             }
 
 
                 ?>
           
            <div class="time-info text-center">
                <button type="button">given the time as a owner 👉</button>
                <p>Register now for our innovative sports software solutions, designed to tackle challenges in everyday sports activities and events.</p>
            </div>
            <div class="time-slot">
                <div class="logo time-logo">
                    <a href=""><span>s</span>ports arena</a>
                </div>
                <div class="availabilty">
                <div class="profile-info">
                        <ul class=" text-end">
                            <li><a href="" class=" d-inline-block text-dark border-2 border border-success mb-2"><i class="fa-solid fa-user"></i></a>
                            <ul>
                                    <li><a href="owner-profile.php">Profile</a></li>
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="time-list.php">Time List</a></li>
                                    <li><a href="owner_logout.php?action=logout">logout</a></li>
                                   
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                    <div class="regi-title">
                        <span>Time Slots with sports arena</span>
                        <p>Ignite your sports journey with SportsArena and get started now.</p>
                    </div>
                    <div class="time-form">
                        <p class="d-inline-flex gap-1 ps-2">
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">
                                Select Your Available Time Slots
                            </a>
                        </p>

                        <!-- Available Start -->
                        <div class="collapse holiday" id="collapse" >
                            <p>Available Days</p>
                        <form action="" method="post">

                        <?php 
				 
				   
                 
                 $db=new database();
                 $select_query= "select* from days";
                 $readquery=$db->select($select_query);  
                 if($readquery){
                    while($result_day=$readquery->fetch_assoc()){

                

                 

 
                 ?>
                            <div class="form-checks">
                                <input class="form-check-input" name="dayID" type="checkbox" value="<?php echo $result_day['id'];?>" id="flexCheckDefault">
                                <label class="form-check-label"  for="flexCheckDefault">
                                   <?php echo $result_day['day'];?>
                                </label>
                            </div>
                           <?php }}?> 
                          
                          
                          
                           
                            <button class="btn btn-primary btn-time" name=submit type="button" data-bs-toggle="collapse" href="#collapseTime" role="button" aria-expanded="false" aria-controls="collapseTime">Submit Available Days</button>
                        </div>
                        <!-- Available End -->


                        <!-- Fixed Time Start -->
                        <div class="collapse time" id="collapseTime">
                            <div class="input-container">
                                <button class="btn btn-primary add" id="add-field">Add Input Field</button>
                                <div class="time-title d-flex">
                                    <h5>From</h5>
                                    <h5>To</h5> 
                                </div>
                            </div>
                            <div id="dynamic-fields">
                                <div class="start-time d-flex">
                                    <input type="time" name="start_from"  class="start-timeinput">
                                    <input type="time" name="end_to" class="start-timeinput">
                                </div>
                                <!-- Dynamic input fields will be added here -->

                                
                            </div>

                            <button class="btn btn-primary btn-time-slot" name=submit type="submit">Submit</button>
                              
                        </div>
                        </form>  
                        <!-- Fixed Time End -->
                         
                        
                    </div>
                </div>
            </div>
        </div>
    </section>





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