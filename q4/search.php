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
$res="select book_code,book_name,author_name,cost,isbn_code from project4 where book_name='$n' OR author_name='$n'";
$result=mysqli_query($conn,$res);
?>

<tr>
<th>BOOK CODE</TH>

        <th>BOOK NAME</TH>
        <th>AUTHOR NAME</TH>
        <th>COST</TH>
        <th>ISBN NUMBER</TH>
   
</tr>
<tr>


<?php
while( $exec=mysqli_fetch_array($result)){
    ?>
     <td> <?php echo $exec['book_code'];?></td>
<td> <?php echo $exec['book_name'];?></td>
<td>  <?php echo $exec['author_name'];?></td>
<td> <?php  echo $exec['cost'];?></td>
<td> <?php  echo $exec['isbn_code'];?></td>
<?php
}
  }
?>


</table>
</center>
</body>
</html>


