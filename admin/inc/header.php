<?php 
include 'lib/session.php' ;
Session::checkSession();

?>

<div id="right-panel" class="right-panel">
<header id="header" class="header">

            <div class="header-menu">

              <div class="col-sm-7 me-5">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    
                </div>
                
            <?php
				if(isset($_GET['action'])){
							
							Session::destroy();
							header("Location:../admin.php");
						}					
					

			?>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="?action=logout"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>


                </div>
            </div>

        </header>