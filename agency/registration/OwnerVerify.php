<?php

include('../database.php');

  $db=new database();
 
if (isset($_GET['code'])){

  $id = $_GET['code'];


 

$sql = "UPDATE owners  SET is_verified='1' WHERE code =$id ";

$result =$db->update($sql);

 

if ($result) {

    echo "<script>alert('Your Owner Account is Verified')</script>";

  }

}

else {

  echo "Wrong url";

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

  <title>Indoor Sports</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

 

<div class="container">



</div>


</body>

</html>