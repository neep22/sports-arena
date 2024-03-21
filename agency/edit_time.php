<?php include 'Session.php';
 Session:: init();
 ?>
<?php include 'lib/database.php';?>
<?php $db = new database;?>

<?php include '../helper/Format.php';?>
<?php $fm = new Format;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS -->
    <title>Sports Arena | Time Slot | Edit</title>
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
    <section class="list-header-area">
        <div class="container">
            <div class="list-header pt-4 pb-4">
                <div class="list-logo">
                    <a href="#"><span>s</span>ports arena</a>
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
                                    <li><a href="owner_logout.php?action=logout">logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
        </div>
    </section>
    <!-- List header Area End -->

    <!-- Edit Time Slot Area Start -->
    <section class="edit-time-area">
        <div class="container">
            <div class="edit-time mt-5">
                <h4 class="text-capitalize text-center fw-bolder fs-1">edit time</h4>
            </div>
            <div class="edit-timeform mt-5">

            <?php
                $db=new database();

                if(isset($_GET['editTimeid'] )){
                $editTimeid=$_GET['editTimeid'];

                }

            ?>

          



                <form action="" method="post">

                <?php
            //Update time
                $db=new database();
                if(isset($_POST['submit'])){
             
                $start_time=$_POST['start_from'];
                $end_time=$_POST['end_to'];
                

                
                if(empty($start_time)||empty($end_time)){
                    echo "fill must not be empty";
                }else{
                   $query= "select* from  slot  where (start_from='$start_time'and end_to='$end_time')
                                                           

                   limit 1";
                   $mailcheck= $db->select($query);
                    if($mailcheck != false){
                   echo "<script>alert('Timeslot already exist')</script>";

                }
                
                else{
                     $updateTime="update slot 
                      set
                      start_from='$start_time',
                      end_to='$end_time'
                      where id='$editTimeid'
                     " ;
                    $update_rows=$db->update($updateTime);
                    if($update_rows){
                        echo "<script>alert('TimeSlot update Success')</script>";
                    }else{
                        echo "<script>alert('TimeSlot Insert not Success')</script>";
                    }
                }
                
            }

        }
           
           
           
           ?>

 


                <?php
                // selsect for edit Time
                        $query="Select *
                        from slot
                        where id=$editTimeid ";
                        $queryread=$db->select($query);
                        if($queryread){
                          while($result=$queryread->fetch_assoc()){

                  ?>



                    <label for="" class="fs-5 text-capitalize">start time:</label>
                    <input type="time" value="<?php echo $result['start_from'];?>" name="start_from" class="start-edit-time">
                    <br/>
                    <br/>
                    <label for="" class="fs-5 text-capitalize">end time:</label>
                    <input type="time" value="<?php echo $result['end_to'];?>" name="end_to" class="start-edit-time">
                    <br/>
                    <br/>
                   <?php }}?> 
                   <button class="btn btn-primary btn-time-slot" type="submit" name="submit">Update</button>
                </form>
               
            </div>
        </div>
    </section>
    <!-- Edit Time Slot Area End -->



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
<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>