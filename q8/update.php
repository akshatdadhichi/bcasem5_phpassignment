<?php

include "conn.php";
$id=$_GET['id'];
$que="select * from project8 where cust_name='$id'";
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
        #yt{
            margin-top: 100px;
        }
        </style>
</head>
    <body>
        <div>
<center>
 <table>
    
                <form action="#" method="post">
                    <h1>HOTEL BOOKING</h1>
                   
                    <tr>
                        <td><label for="">CUSTOMER NAME :</label></td>
                       <td> <input type="text" name="name" value="<?php echo $resultme['cust_name'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">ROOM NUMBER : </label></td>
                       <td> <input type="text" name="i" value="<?php echo $resultme['room_no'];?>"></td>
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
    $i=$_POST['i'];
  
    $que="update project8 set cust_name='$name',room_no='$i' where cust_name='$id'";
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
<table border="3" cellspacing="10px" cellpadding="10px" id="yt">

<?php

$res="select * from project8";
$result=mysqli_query($conn,$res);
?>

<tr>

        <th>CUSTOMER NAME</TH>
       <th>ROOM NUMBER</th>
   
</tr>
<tr>


<?php
while( $exec=mysqli_fetch_array($result)){
    ?>
<td> <?php echo $exec['cust_name'];?></td>
<td> <?php  echo $exec['room_no'];?></td>

</tr>
<?php
}

?>

    

</table>
</center>

</body>
</html>