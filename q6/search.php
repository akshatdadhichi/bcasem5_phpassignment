<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            width: 300px;
            height: 60px;
            font-size: 40px;
        }
        #T{
            margin-bottom: 30px;
        }
        #tt{
            font-size: 50px;
        }
        .uu{
            margin-top: 50px;
        }
        span{
           
            margin-left: 50%;
        }
    .sp{
            margin-left: 50%;
        }
        </style>
</head>
<body>
    <center>
        <h1>SEARCH</h1>
    <table id="T" border="10px" cellpadding="5px" cellspacing="20px">
    <form action="" method="post">
    <tr>
       
         
    <tr>
        <td><label for="" style="font-size:30px">enter date:</label></td>
       
            <td><input type="date" placeholder="" name="s"></td>
            </tr> 
          
          
<center>
<table>
<tr>
            <td> <input id="tt" type="submit" value="search" name="search" ></td>
            </tr>
            </table>
    </center>
    </form>
    </table>
    </center>




      

   
<center>
<table border="3" cellspacing="10px" cellpadding="10px" class="uu">

        <?php
  include "conn.php";
  if(isset($_POST['search']))
  {
     
      $nr=$_POST['s'];
  
  
      
$res="select * from project6 where ord_date='$nr'  ";
$result=mysqli_query($conn,$res);
?>

<tr>
<th>CUSTOMER ID</TH>
        <th>CUSTOMER NAME</TH>
        <th>ITEM NAME</TH>
       
        <th>ORDER DATE</TH>
   
</tr>
<tr>


<?php
while( $exec=mysqli_fetch_array($result)){
    ?>
        <td> <?php echo $exec['cust_id'];?></td>
 <td> <?php echo $exec['cust_name'];?></td>
 <td>  <?php echo $exec['item_name'];?></td>
 <td> <?php  echo $exec['ord_date'];?></td>
</tr>
<?php
}
  }
?>


</table>
</center>
</body>
</html>


