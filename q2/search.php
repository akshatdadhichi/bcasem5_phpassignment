<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            width: 200px;
            height: 60px;
            font-size: 40px;
        }
        #T{
            margin-bottom: 30px;
        }
        #tt{
            font-size: 50px;
        }
        </style>
</head>
<body>
    <center>
        <h1>SEARCH</h1>
    <table id="T" border="10px" cellpadding="5px" cellspacing="20px">
    <form action="" method="post">
        <tr>
            <td><input type="text" placeholder="enter some name" name="s"></td>
            <td> <input id="tt" type="submit" value="search" name="search" ></td>
        </tr>
    </form>
    </table>
    </center>




      

   
<center>
<table border="3" cellspacing="10px" cellpadding="10px">

        <?php
  include "conn.php";
  if(isset($_POST['search']))
  {
      $n=$_POST['s'];
$res="select id,client_name,source,destination,address,no_pass,tra_date,train_no from project1 where id='$n' OR client_name='$n' OR source='$n' OR destination='$n' OR address='$n' OR no_pass='$n' OR tra_date='$n' OR train_no='$n' ";
$result=mysqli_query($conn,$res);
?>

<tr>
<th>ID</TH>
    <th>CLIENT NAME</TH>
    <th>SOURCE</TH>
    <th>DESTINATION</TH>
    <th>ADDRESS</TH>
    <th>NO. OF PASSENGER</th>
    <th>TRAVELLING DATE</th>
    <th>TRAIN NUMBER</th>
   
</tr>
<tr>


<?php
while( $exec=mysqli_fetch_array($result)){
    ?>
      <td> <?php echo $exec['id'];?></td>
  <td> <?php echo $exec['client_name'];?></td>
<td> <?php echo $exec['source'];?></td>
<td>  <?php echo $exec['destination'];?></td>
<td> <?php  echo $exec['address'];?></td>
<td> <?php  echo $exec['no_pass'];?></td>
<td> <?php  echo $exec['tra_date'];?></td>
<td> <?php  echo $exec['train_no'];?></td>
</tr>
<?php
}
  }
?>


</table>
</center>
</body>
</html>


