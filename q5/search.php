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
$res="select mo_id,c_name,m_name,price from project5 where price='$n'";
$result=mysqli_query($conn,$res);
?>

<tr>
<th>MOBILE ID</TH>
        <th>COMPANY NAME</TH>
        <th>MOBILE NAME</TH>
       
        <th>PRICE</TH>
   
</tr>
<tr>


<?php
while( $exec=mysqli_fetch_array($result)){
    ?>
        <td> <?php echo $exec['mo_id'];?></td>
 <td> <?php echo $exec['c_name'];?></td>
 <td>  <?php echo $exec['m_name'];?></td>
 <td> <?php  echo $exec['price'];?></td>
<?php
}
  }
?>


</table>
</center>
</body>
</html>


