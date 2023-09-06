<?php

include "conn.php";
$id=$_GET['id'];
$que="select * from project3 where roll_no='$id'";
$ex=mysqli_query($conn,$que);
$resultme=mysqli_fetch_array($ex);


?>
<html>
    <head>
        <style>
    table {
            font-size: 25px;
        }
        
        h1 {
            font-size: 40px;
            text-decoration: underline;
            text-decoration-style: dashed;
        }
        
        input,
        select,
        option {
            width: 270px;
            height: 45px;
            font-size: 20px;
            border-radius: 20%
        }
        div {
            background-color: rgba(0, 0, 0, 0.4);
            margin: auto;
            width: 50%;
        }
        </style>
</head>
    <body>
        <div>
<center>
 <table>
    
                <form action="#" method="post">
                    <h1>ORDER FORM</h1>
                    <tr>
                        <td><label for="">ROLL NO:</label></td>
                       <td> <input type="number" value="<?php echo $resultme['roll_no'];  ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">STUDENT NAME :</label></td>
                       <td> <input type="text" name="name" value="<?php echo $resultme['s_name'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">AGE :</label></td>
                       <td> <input type="text" name="age" value="<?php echo $resultme['s_age'];?>"></td>
                    </tr>
                    
                    <tr>
                        <td><label for="">CITY </label></td>
                        <td><input type="text" name="city" value="<?php echo $resultme['city'];  ?>"></td>

                    </tr>
                    <tr>
                        <td><label for="">PHONE NUMBER </label></td>
                        <td><input type="number" name="ph_no" value="<?php echo $resultme['ph_no'];  ?>"></td>

                    </tr>
                    <table>
                        <tr>
                            <td><input type="submit" value="Update" name="Update" style="font-size: 20px; width:150px; border-radius:20%"></td>
                        </tr>
                    </table>
                </form>

            </table>
</center>
    </div>

<?php

if(isset($_POST['Update']))
{
    $id=$_GET['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $city=$_POST['city'];
    $ph_no=$_POST['ph_no'];
    $que="update project3 set s_name='$name',s_age='$age',city='$city',ph_no='$ph_no' where roll_no='$id'";
    $res=mysqli_query($conn,$que);
    if($res){
        ?>
        <script>alert('updated successfully');
    location.replace("index.php");</script>
       
        <?php
        
    }

}

?>

<center>
<table border="3" cellspacing="10px" cellpadding="10px">

<?php

$res="select * from project3";
$result=mysqli_query($conn,$res);
?>

<tr>
    <th>ROLL NO</TH>
    <th>STUDENT NAME</TH>
    <th>STUDENT AGE</TH>
    <th>CITY</TH>
    <th>PHONE NUMBER</TH>
   
</tr>
<tr>


<?php
while( $exec=mysqli_fetch_array($result)){
    ?>
  <td> <?php echo $exec['roll_no'];?></td>
<td> <?php echo $exec['s_name'];?></td>
<td>  <?php echo $exec['s_age'];?></td>
<td> <?php  echo $exec['city'];?></td>
<td> <?php  echo $exec['ph_no'];?></td>
</tr>
<?php
}

?>

    

</table>
</center>

</body>
</html>