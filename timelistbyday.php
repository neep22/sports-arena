<!DOCTYPE html>
<?php include 'database.php';?>
<?php $db = new database;?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <?php
                if(isset($_GET['dayid'])){
                    $dayid=$_GET['dayid'];
                   
                }
               
              ?>

             <?php
                if(isset($_GET['ownerbyid'])){
                    $ownerbyid=$_GET['ownerbyid'];
                  
                }    
              ?>


              
              <form action="" method="post">
              <?php
                        $query="Select  slot.*,days.day,owners.id
                        from slot
                        inner join days on slot.dayID =days.id 
                        inner join owners on slot.ownerID =owners.id 
                        where slot.dayID=$dayid and slot.ownerID=$ownerbyid";
                        $read=$db->select($query);
                        if($read){
                          while($result=$read->fetch_assoc()){
                      
                  ?>

                <input type="time" name="start_from" value="<?php echo $result['start_from']; ?>" id="">
                <input type="time" name="end_to" value="<?php echo $result['end_to']; ?>" id="">
              <?php }}else{
                  header("Location:not_available.php");
              }?>
              </form>
    
</body>
</html>