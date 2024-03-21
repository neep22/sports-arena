<?php 
include 'Session.php' ;
Session::checkSession();

?>

<?php
	if(isset($_GET['action'])){
							
	Session::destroy();
	header("Location:index.php");
	}
								
?>
