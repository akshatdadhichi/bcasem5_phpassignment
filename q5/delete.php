<?php
include "conn.php";
$id=$_GET['id'];
$ex=mysqli_query($conn,"delete from project5 where mo_id='$id'");
if($ex)
{
    ?>
    <script>alert('deleted successfully');
location.replace("index.php");</script>
   
    <?php
}
?>