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
                        <td><label for="">CUSTOMER ID:</label></td>
                       <td> <input type="text" name="ids"  ></td>
                    </tr>
                    <tr>
                        <td><label for="">CUSTOMER NAME:</label></td>
                        <td><input type="text" name="name" ></td>
                    </tr>
                    <tr>
                        <td><label for="">ITEM NAME </label></td>
                        <td><input type="text" name="i"></td>

                    </tr>
                    <tr>
                        <td><label for="">ORDER DATE</label></td>
                        <td><input type="date" name="date"></td>

                    </tr>
                    <table>
                        <tr>
                            <td><input type="submit" value="submit" name="submit" style="font-size: 20px; width:150px; border-radius:20%"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="search" name="search" style="font-size: 20px; width:150px; border-radius:20%"></td>
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
        $ids=$_POST['ids'];
        $name=$_POST['name'];
        $i=$_POST['i'];
        $date = $_POST["date"];
$q="insert into project6 (cust_id,cust_name,item_name,ord_date) values('$ids','$name','$i','$date')";
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
                
            $res="select * from project6";
            $resu=mysqli_query($conn,$res);
              $count=mysqli_num_rows($resu);
              echo $count;

                ?>
                </h2>
            </center>
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
        <th>EDIT</th>
        <th>DELETE</th>
</tr>
<tr>


<?php
    while( $exec=mysqli_fetch_array($result)){
        ?>
      <td> <?php echo $exec['cust_id'];?></td>
 <td> <?php echo $exec['cust_name'];?></td>
 <td>  <?php echo $exec['item_name'];?></td>
 <td> <?php  echo $exec['ord_date'];?></td>
  <td > <a href="update.php?id=<?php echo $exec['cust_id'];?>" >  <i class="fa fa-edit" aria-hidden="true"  ></i></a></td>
 <td><a href="delete.php?id=<?php echo $exec['cust_id'];?>" > <i class="fa fa-trash" aria-hidden="true"></i></a></td>
 </tr>
<?php
    }

    ?>
    

</table>
</center>


</body>

</html>