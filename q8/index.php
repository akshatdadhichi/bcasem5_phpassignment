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
                    <h1>HOTEL BOOKING</h1>
                 
                    <tr>
                        <td><label for="">CUSTOMER NAME:</label></td>
                        <td><input type="text" name="name" ></td>
                    </tr>
                    <tr>
                        <td><label for="">ROOM NUMBER</label></td>
                        <td><input type="text" name="t"></td>

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
       
        $name=$_POST['name'];
       $T=$_POST['t'];
       $check="select * from project8";
       $re=mysqli_query($conn,$check);
       $result=mysqli_fetch_array($re);

       while($result)
       {
        $a=$result['room_no'];
        if($a==$T)
        {
            $u=1;
         
        }
        else{
            $u=0;
            break;
        }
       }
       if($u==1)
       {
       ?>
       <script>alert("already allocated");
       break;
     
    location.assign('index.php');
    </script>
    <?php
       }
else{
    $q="insert into project8 (cust_name,room_no) values('$name','$T')";
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
   
    }    
    ?>

      


            <center>
                <h2>Rooms allocated :
                    <?php 
                
            $res="select * from project8";
            $resu=mysqli_query($conn,$res);
              $count=mysqli_num_rows($resu);
              echo $count;

                ?>
                </h2>
                <h3>Rooms Available:
                    <?php
                    $ava=15;
                    echo ($ava-$count);
                    
                    
                    
                    ?>
                </h3>
            </center>
            <center>
<table border="3" cellspacing="10px" cellpadding="10px">

            <?php

    $res="select * from project8";
    $result=mysqli_query($conn,$res);
   ?>

    <tr>
         <th>CUSTOMER NAME</TH>
        <th>ROOM NUMBER</TH>
     
        <th>EDIT</th>
        <th>DELETE</th>
</tr>
<tr>


<?php
    while( $exec=mysqli_fetch_array($result)){
        ?>
     
 <td> <?php echo $exec['cust_name'];?></td>
 <td>  <?php echo $exec['room_no'];?></td>
 
  <td > <a href="update.php?id=<?php echo $exec['cust_name'];?>" >  <i class="fa fa-edit" aria-hidden="true"  ></i></a></td>
 <td><a href="delete.php?id=<?php echo $exec['cust_name'];?>" > <i class="fa fa-trash" aria-hidden="true"></i></a></td>
 </tr>
<?php
    }

    ?>
    

</table>
</center>


</body>

</html>