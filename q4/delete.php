<?php
include "conn.php";
$id=$_GET['id'];
$ex=mysqli_query($conn,"delete from project4 where book_code='$id'");
if($ex)
{
    ?>
    <script>alert('deleted successfully');
location.replace("index.php");</script>
   
    <?php
}
?>