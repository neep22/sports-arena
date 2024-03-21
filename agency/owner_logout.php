<?php 
include 'lib/session.php' ;
Session::checkSession();

?>

<?php
	if(isset($_GET['action'])){
							
	Session::destroy();
	header("Location:owner-login.php");
	}
								
?>