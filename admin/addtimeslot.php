<!doctype html>
<html class="no-js" lang="en">
<?php include('lib/database.php');?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Indoor Sports</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
            
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <div class="header-left">
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>            

                              <div class="dropdown for-message">
                           
                            <div class="dropdown-menu" aria-labelledby="message">              
            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>


                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>


                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>TimeSlot</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"></strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Add Your TimeSlot</h3>
                                           
                                           <?php 
				 
                                         $db=new database();
                                         if(isset($_POST['submit'])){
         
                                          $all_days=$_POST['all_days'];
                                          $start_dates=$_POST['start_dates'];
                                          $end_dates=$_POST['end_dates'];
                                          $weekend=$_POST['weekend'];
                                          $insert="INSERT INTO timeslot (all_days,start_dates,end_dates,weekend) VALUES('$all_days','$start_dates','$end_dates','$weekend')";
                                          $insert_rows=$db->insert($insert);
                                          if($insert_rows){
                                              echo "<script>alert('Time Slot Inset Success')</script>";
                                          }else{
                                          echo "<script>alert('Time Slot Inset Not Success')</script>";
                                          }
                                      }
                     
                             ?>              
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group text-center">
                                        
                                            </div>
                                            <div class="form-group">
                                                <label>Day</label>
                                                <input type="text" name="all_days" class="form-control" required>
                                            </div>
                                                <div class="form-group">
                                                    <label>Start Time</label>
                                                    <input type="time" name="start_dates" class="form-control" required>
                                            
                                                </div>
                                                <div class="form-group">
                                                    <label>End Time</label>
                                                    <input type="time" name="end_dates" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Weekend</label>
                                                    <input type="text" name="weekend"  class="form-control"  required>
                                                  
                                                </div>
                
                        
                                         <div>
                                             <button id="payment-button"  name="submit" type="submit" class="btn btn-lg btn-info btn-block">Insert</span>                               
                                      </div>
                             </form>
                       </div>
                </div>
            </div>
     </div> <!-- .card -->

</div>
<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
