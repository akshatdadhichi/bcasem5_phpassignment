<?php
session_start();
?>

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
        </style>
</head>
<body>
    <center>
        <h1>SEARCH</h1>
    <table id="T" border="10px" cellpadding="5px" cellspacing="20px">
    <form action="" method="post">
    <tr>
       
       <td><input type="text" placeholder="enter city or cast" name="s1"></td>
       </tr> 
        


<tr>
            <td> <input id="tt" type="submit" value="search" name="search" ></td>
            </tr>
    </form>
    </table>
    </center>




      

   
<center>
    <?php
    
    if($_SESSION['usern']==true){
    ?>
<table border="3" cellspacing="10px" cellpadding="10px">

        <?php
  include "conn.php";
  if(isset($_POST['search']))
  {
  
      $nr=$_POST['s1'];
  
      
$res="select * from project7 where city='$nr' OR cast='$nr'";
$result=mysqli_query($conn,$res);
?>

<tr>
<th>PERSON NAME</TH>
        <th>CITY</TH>
        <th>MOBILE NUMBER</TH>
        <th>CAST</TH>
        <th>SUB CAST</th>
        <th>GENDER</th>
        <th>QUALIFICATION</th>
   
</tr>
<tr>


<?php
while( $exec=mysqli_fetch_array($result)){
    ?>
         <td> <?php echo $exec['person_name'];?></td>
<td> <?php echo $exec['city'];?></td>
<td>  <?php echo $exec['mo_no'];?></td>
<td> <?php  echo $exec['cast'];?></td>
<td> <?php  echo $exec['subcast'];?></td>
<td> <?php  echo $exec['gender'];?></td>
<td> <?php  echo $exec['qualification'];?></td>
</tr>
<?php
}
  }
}
?>


</table>
</center>
</body>
</html>


