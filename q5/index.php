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
                    <h1>MOBILE REGISTRATION FORM</h1>
                    <tr>
                        <td><label for="">MOBILE ID:</label></td>
                       <td> <input type="text" name="ids"   ></td>
                    </tr>
                    <tr>
                        <td><label for="">COMPANY NAME:</label></td>
                        <td><input type="text" name="name" ></td>
                    </tr>
                    <tr>
                        <td><label for="">MOBILE NAME: </label></td>
                        <td><input type="text" name="m"></td>

                    </tr>
                    <tr>
                        <td><label for="">PRICE</label></td>
                        <td><input type="number" name="p"></td>

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
        $cname=$_POST['name'];
        $m=$_POST['m'];
      
        $p = $_POST["p"];
$q="insert into project5 (mo_id,c_name,m_name,price) values('$ids','$cname','$m','$p')";
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
                
            $res="select * from project5";
            $resu=mysqli_query($conn,$res);
              $count=mysqli_num_rows($resu);
              echo $count;

                ?>
                </h2>
            </center>
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
        <th>EDIT</th>
        <th>DELETE</th>
</tr>
<tr>


<?php
    while( $exec=mysqli_fetch_array($result)){
        ?>
      <td> <?php echo $exec['mo_id'];?></td>
 <td> <?php echo $exec['c_name'];?></td>
 <td>  <?php echo $exec['m_name'];?></td>
 <td> <?php  echo $exec['price'];?></td>
 
 <td > <a href="update.php?id=<?php echo $exec['mo_id'];?>" >  <i class="fa fa-edit" aria-hidden="true"  ></i></a></td>
 <td><a href="delete.php?id=<?php echo $exec['mo_id'];?>" > <i class="fa fa-trash" aria-hidden="true"></i></a></td>
 </tr>
<?php
    }

    ?>
    

</table>
</center>


</body>

</html>