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
                                            <h3 class="text-center">Add Your Contact Info</h3>
                                           
                                            <?php				
					        $db=new database();
					        if(isset($_POST['submit'])) {
							$name = $_POST['name'];
							$email = $_POST['email'];				
                            $mobile = $_POST['mobile']; 	
                            $subject=$_POST['subject'];										
                            
                            if ($name =='' 
                              || $mobile=='' 
                              || $email ==''
                              ||$subject=='' ){
							echo "<script>alert('Field Must Not Be Empty')</script>";
						   }else if(!preg_match("/^([a-zA-Z' ]+)$/",$name)){		
							echo "<script>alert('Error! Only Alphabets and Whitespace are allowed')</script>";
							}elseif(!preg_match("/^\\S+@\\S+\\.\\S+$/", $email)){					
							echo "<script>alert('This is Not Valid Email')</script>";
                            }else{
							$emailquery= "select* from  contact  where email= '$email' limit 1";
			                $mailcheck= $db->select($emailquery);
							 if($mailcheck != false){
							echo "<script>alert('email already exist')</script>";
						 }						
						else{
								
							$sql = "INSERT INTO contact(name,email,mobile,subject) VALUES('$name','$email','$mobile','$subject')";

							$result = $db->insert($sql);

								  if ($result) {

								   echo "<script>alert('Your Message is Sent')</script>";
								
								}
								 else{
							  echo "<script>alert('something wrong')</script>";
				    }
				}
			}
		 }


?>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group text-center">
                                        
                                            </div>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="text" name="mobile" class="form-control" required>
                                            
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <input type="text" name="subject"  class="form-control"  required>
                                                  
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
