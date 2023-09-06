<?php

include "conn.php";
$id=$_GET['id'];
$que="select mo_id,c_name,m_name,price from project5 where mo_id='$id'";
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
                    <h1>MOBILE REGISTRATION FORM</h1>
                    <tr>
                        <td><label for="">MOBILE ID</label></td>
                       <td> <input type="text" name="ids" value="<?php echo $resultme['mo_id'];  ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">COMPANY NAME :</label></td>
                       <td> <input type="text" name="cn" value="<?php echo $resultme['c_name'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">MOBILE NAME</label></td>
                       <td> <input type="text" name="mn" value="<?php echo $resultme['m_name'];?>"></td>
                    </tr>
                    
                    <tr>
                        <td><label for="">PRICE </label></td>
                        <td><input type="text" name="p" value="<?php echo $resultme['price'];  ?>"></td>

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
    $cn=$_POST['cn'];
    $mn=$_POST['mn'];
    $p=$_POST['p'];
    $que="update project5 set mo_id='$ids',c_name='$cn',m_name='$mn',price='$p' where mo_id='$id'";
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

$res="select * from project5";
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

</tr>
<?php
}

?>

    

</table>
</center>

</body>
</html>