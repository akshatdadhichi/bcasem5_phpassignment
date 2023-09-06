<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
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
                        <td><label for="">Item Name :</label></td>
                       <td> <input type="text" name="name" placeholder="enter item name"  ></td>
                    </tr>
                    <tr>
                        <td><label for="">Item Type :</label></td>
                        <td><select name="select" >
                        <option style="background-color: rgb(219, 210, 210);" >Choose from the following</option>
                        <option value="Dairy">Dairy</option>
                        <option value="Grocery">Grocery</option>
                        <option value="Cosmetic">Cosmetic</option>
                        <option value="Grooming">Grooming</option>
                        <option value="Electronics">Electronics</option>
                    </select></td>

                    </tr>
                    <tr>
                        <td><label for="">Quantity : </label></td>
                        <td><input type="number" name="nu"></td>

                    </tr>
                    <table>
                        <tr>
                            <td><input type="submit" value="submit" name="submit" style="font-size: 20px; width:150px; border-radius:20%"></td>
                        </tr>
                    </table>
                </form>

            </table>
        </center>
    </div>


    <?php
    include "conn.php";
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $val=$_POST['select'];
        $qty=$_POST['nu'] ;
$q="insert into project (item_name,item_type,qty) values('$name','$val','$qty')";
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
                
            $res="select * from project";
            $resu=mysqli_query($conn,$res);
              $count=mysqli_num_rows($resu);
              echo $count;

                ?>
                </h2>
            </center>
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
        <th>EDIT</th>
        <th>DELETE</th>
</tr>
<tr>


<?php
    while( $exec=mysqli_fetch_array($result)){
        ?>
      <td> <?php echo $exec['order_no'];?></td>
 <td> <?php echo $exec['item_name'];?></td>
 <td>  <?php echo $exec['item_type'];?></td>
 <td> <?php  echo $exec['qty'];?></td>
 <td > <a href="update.php?id=<?php echo $exec['order_no'];?>" >  <i class="fa fa-edit" aria-hidden="true"  ></i></a></td>
 <td><a href="delete.php?id=<?php echo $exec['order_no'];?>" > <i class="fa fa-trash" aria-hidden="true"></i></a></td>
 </tr>
<?php
    }

    ?>
    

</table>
</center>


</body>

</html>