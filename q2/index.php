<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
    <style>
      
    </style>
</head>

<body>

    <center>
        <table>
            <form action="#" method="post">
                <h1>TICKET BOOKING</h1>
                <tr>
                    <td><label for="">client Name :</label></td>
                   <td> <input type="text" name="name"   required></td>
                </tr>
              
                <tr>
                    <td><label for="">Source </label></td>
                    <td><input type="text" name="source"></td>

                </tr>
                <tr>
                    <td><label for="">Destination </label></td>
                    <td><input type="text" name="desti" required></td>

                </tr>
                <tr>
                    <td><label for="">Address </label></td>
                    <td><input type="text" name="add" required></td>

                </tr>
                <tr>
                    <td><label for="">No. of Passenger </label></td>
                    <td><input type="number" name="num" required></td>

                </tr>
                <tr>
                    <td><label for="">Travelling Date </label></td>
                    <td><input type="date" name="dat" required></td>

                </tr>
                <tr>
                    <td><label for="">Train No. </label></td>
                    <td><input type="number" name="num1" required></td>

                </tr>
                <table>
                    <tr>
                        <td><input type="submit" value="submit" name="submit" style="font-size: 20px; width:150px; border-radius:20%"></td>
                    </tr>
                    <tr>
                        <td><a href=""><input type="submit" value="search" name="search" style="font-size: 20px; width:150px; border-radius:20%"></a></td>
                    </tr>
                </table>
            </form>

        </table>
    </center>
</div>
<?php
if(isset($_POST['search']))
{
    header('location:search.php');
}
?>

<?php
include "conn.php";
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $sour=$_POST['source'];
    $desti=$_POST['desti'] ;
    $add=$_POST['add'] ;
    $num=$_POST['num'] ;
    $dat=$_POST['dat'];
    $num1=$_POST['num1'];
$q="insert into project1 (client_name,source,destination,address,no_pass,tra_date,train_no) values('$name','$sour','$desti','$add','$num','$dat','$num1')";
$ex=mysqli_query($conn,$q);
if(($ex))
{
?>
    <script>
        alert("data inserted successfully")
    </script>
    <?php
}
}


?>
        <center>
            <h2>Records :
                <?php 
            
        $res="select * from project1";
        $resu=mysqli_query($conn,$res);
          $count=mysqli_num_rows($resu);
          echo $count;

            ?>
            </h2>
        </center>
        <center>
<table border="3" cellspacing="10px" cellpadding="10px">

        <?php

$res="select * from project1";
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
    <th>EDIT</th>
    <th>DELETE</th>
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
<td > <a href="upd.php?id=<?php echo $exec['id'];?>"" >  <i class="fa fa-edit" aria-hidden="true"></i></a></td>
<td><a href="del.php?id=<?php echo $exec['id'];?>"" > <i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>
<?php
}

?>


</table>
</center>
</body>

</html>