<?php
include "conn.php";
$id=$_GET['id'];
$ex=mysqli_query($conn,"delete from project7 where person_name='$id'");
if($ex)
{
    ?>
    <script>alert('deleted successfully');
location.replace("index.php");</script>
   
    <?php
}
?>