<?php include 'Session.php';
 Session:: init();
 ?>
<?php include 'lib/database.php';?>
<?php $db = new database;?>

<?php
                $db=new database();

                if(isset($_GET['deleteTimeid'] )){
                $deleteTimeid=$_GET['deleteTimeid'];

                }
                $delete_row="delete from slot where id=$deleteTimeid";
                $delete_time=$db->delete($delete_row);
                if($delete_time){
                    echo "<script>alert('delete success!')</script>";
                }else{
                    echo "<script>alert('something went wrong!')</script>";
                }

?>