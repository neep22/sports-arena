<!doctype html>
<html class="no-js" lang="en">
<?php include('lib/database.php');?>

<?php include('helper/format.php');?>
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
    
<?php
	  $db=new database();
	  if(isset($_GET['deletetimeslots'])){
		$deletetimeslots=$_GET['deletetimeslots'];
		$deletequery="delete from timeslot where id= $deletetimeslots";
		$timeslotsdelete=$db->delete($deletequery);
		if($timeslotsdelete){
			echo"<script>alert('Time Slot Delete Succsessful')</script";
		}else{
			echo"<script>alert('Time Slot Delete Not Succsessful')</script";

		}
	  }
	 
	 
	 ?>
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
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>TimeSlot List</h1>
                        <div class="module-body table">
							<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
                                            <th>#</th>
											<th>Days</th>
                                            <th>Start Date</th>							
									    	<th>End Date</th>
                                            <th>Weekend</th>
                                            <th>Action</th>
                                            
                                            
										</tr>
									</thead>
									<tbody>
										<!-- Select Batches    start--> 
                                        <?php
                       
                                  $db= new database(); 
                                  $subquery="select * from timeslot";
                                  $timeslot_read=$db->select($subquery);
                                if($timeslot_read){
                                 $i=0;
                           
                                  while($result=$timeslot_read->fetch_assoc()){
                                  $i++;
                  
          

      


          ?>
					
													
					             <tr class="odd gradeX">
					            	 <td><?php echo $i; ?></td>
					            	 <td><?php echo $result['all_days']; ?></td>
                                     <td><?php echo $result['start_dates']; ?></td>
                                     <td><?php echo $result['end_dates']; ?></td>
                                     <td><?php echo $result['weekend']; ?></td>
                                    



					            		           
						             <td><a href="editTimeSlots.php?editid=<?php echo $result['id']; ?>">Edit</a> || 
					            	 <a onclick="alert('Are You Sure To Delete ?')" href ="?deletetimeslots=<?php echo $result['id']; ?>">Delete</a></td>
					            	 
					                       </tr>
					                     </tr>			
								    	 <?php }}; ?>	<!--/.content-->		 						
  					               </tr>					
								</table>
							</div>
						</div>															
					</div><!--/.content-->
                 </div>
              </div>
        </div>
 </div>