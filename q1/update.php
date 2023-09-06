<?php

include "conn.php";
$id=$_GET['id'];
$que="select order_no,item_name,item_type,qty from project where order_no='$id'";
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
                        <td><label for="">Order id :</label></td>
                       <td> <input type="text" value="<?php echo $resultme['order_no'];  ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">Item Name :</label></td>
                       <td> <input type="text" name="item" value="<?php echo $resultme['item_name'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">Item Type :</label></td>
                        <td><select name="select" >
                        <option  value="<?php echo $resultme['item_type'];?>"> <?php echo $resultme['item_type'];?></option>
                        <option value="Dairy">Dairy</option>
                        <option value="Grocery">Grocery</option>
                        <option value="Cosmetic">Cosmetic</option>
                        <option value="Grooming">Grooming</option>
                        <option value="Electronics">Electronics</option>
                    </select></td>

                    </tr>
                    <tr>
                        <td><label for="">Quantity : </label></td>
                        <td><input type="number" name="qty" value="<?php echo $resultme['qty'];  ?>"></td>

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
    $name=$_POST['item'];
    $opt=$_POST['select'];
    $qty=$_POST['qty'];
    $que="update project set item_name='$name',item_type='$opt',qty='$qty' where order_no='$id'";
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

    $res="select * from project";
    $result=mysqli_query($conn,$res);
   ?>

    <tr>
        <th>ORDER ID</TH>
        <th>ITEM NAME</TH>
        <th>ITEM TYPE</TH>
        <th>QUANTITY</TH>
       
</tr>
<tr>


<?php
    while( $exec=mysqli_fetch_array($result)){
        ?>
      <td> <?php echo $exec['order_no'];?></td>
 <td> <?php echo $exec['item_name'];?></td>
 <td>  <?php echo $exec['item_type'];?></td>
 <td> <?php  echo $exec['qty'];?></td>
 </tr>
<?php
    }

    ?>
    

</table>
</center>

</body>
</html>