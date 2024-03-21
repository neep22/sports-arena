<html>  
<head>  
    <title>Password Reset</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
</head>
<style>
 .box
 {
  width:100%;
  max-width:600px;
  background-color:#f9f9f9;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }
 input.parsley-success,
 select.parsley-success,
 textarea.parsley-success {
   color: #468847;
   background-color: #DFF0D8;
   border: 1px solid #D6E9C6;
 }

 input.parsley-error,
 select.parsley-error,
 textarea.parsley-error {
   color: #B94A48;
   background-color: #F2DEDE;
   border: 1px solid #EED3D7;
 }

 .parsley-errors-list {
   margin: 2px 0 3px;
   padding: 0;
   list-style-type: none;
   font-size: 0.9em;
   line-height: 0.9em;
   opacity: 0;

   transition: all .3s ease-in;
   -o-transition: all .3s ease-in;
   -moz-transition: all .3s ease-in;
   -webkit-transition: all .3s ease-in;
 }

 .parsley-errors-list.filled {
   opacity: 1;
 }
 
 .parsley-type, .parsley-required, .parsley-equalto{
  color:#ff0000;
 }
.error
{
  color: red;
  font-weight: 700;
} 
</style>
<?php

include_once('database.php');
$db=new database();
if(isset($_POST['PasswordReset']))
{
  $OwnerEmail = $_POST['OwnerEmail'];
  $OwnerPassword=$_POST['OwnerPassword'];
  $OwnerCon_password = $_POST['OwnerCon_password'];
  if(strlen ($OwnerPassword) < 8){
    echo "<script>alert('password should be at least 8 digit')</script>";
  }else
  if($OwnerPassword == $OwnerCon_password)
  {
    $reset_password = "update owners set OwnerPassword='$OwnerPassword' where OwnerEmail='$OwnerEmail'";
    $mainreset=$db->update($reset_password);
    if($mainreset)
    {
      $msg = 'Your password updated successfully <a href="owner-login.php">Click here</a> to login';
    }
    else
    {
      $msg = "Error while updating password.";
    }
  }
  else
  {
    $msg = "Password and Confirm Password do not match";
  }
}

if($_GET['secret'])
{
  $OwnerEmail = base64_decode($_GET['secret']);
  $check_details = "select OwnerEmail from owners where OwnerEmail='$OwnerEmail'";

  $res = $db->select($check_details);
  if($res !=false) 
    { ?>
<body>
<div class="container">  
    <div class="table-responsive">  
    <h3 align="centre">Reset  Your Password</h3><br/>
    <div class="box">
     <form id="validate_form" method="post" >  
      <input type="hidden" name="OwnerEmail" value="<?php echo $OwnerEmail; ?>"/>
      <div class="form-group">
       <label for="passowrd">Password</label>
       <input type="password" name="OwnerPassword" id="password" placeholder="Enter Password" required 
       data-parsley-type="password" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>
      <div class="form-group">
       <label for="cpwd">Confirm Password</label>
       <input type="password" name="OwnerCon_password" id="cpwd" placeholder="Enter Confirm Password" required data-parsley-type="cpwd" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>
      <div class="form-group">
       <input type="submit" id="login" name="PasswordReset" value="Reset Password" class="btn btn-success" />
       </div>
       
       <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
     </form>
     </div>
   </div>  
  </div>
<?php } } ?>
</body>
</html>