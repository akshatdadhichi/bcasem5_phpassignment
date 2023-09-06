<?php

include "conn.php";
$id=$_GET['id'];
$que="select * from project6 where cust_id='$id'";
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
                        <td><label for="">CUSTOMER ID</label></td>
                       <td> <input type="text"  name="ids" value="<?php echo $resultme['cust_id'];  ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">CUSTOMER NAME :</label></td>
                       <td> <input type="text" name="name" value="<?php echo $resultme['cust_name'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">ITEM NAME : </label></td>
                       <td> <input type="text" name="i" value="<?php echo $resultme['item_name'];?>"></td>
                    </tr>
                    
                    <tr>
                        <td><label for="">ORDER DATE </label></td>
                        <td><input type="date" name="date" value="<?php echo $resultme['ord_date'];  ?>"></td>

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
$ids=$_POST['ids'];
    $name=$_POST['name'];
    $i=$_POST['i'];
    $date = $_POST["date"];
    $que="update project6 set cust_id='$ids',cust_name='$name',item_name='$i',ord_date='$date' where cust_id='$id'";
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

$res="select * from project6";
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

?>

    

</table>
</center>

</body>
</html>