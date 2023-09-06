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
                    <h1>STUDENT INFORMATION</h1>
                    <tr>
                        <td><label for="">Student Name :</label></td>
                       <td> <input type="text" name="name"   ></td>
                    </tr>
                    <tr>
                        <td><label for="">Age:</label></td>
                        <td><input type="number" name="age" maxlength="110"></td>
                    </tr>
                    <tr>
                        <td><label for="">City </label></td>
                        <td><input type="text" name="city"></td>

                    </tr>
                    <tr>
                        <td><label for="">Phone Number</label></td>
                        <td><input type="number" name="ph"></td>

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
        $age=$_POST['age'];
        $city=$_POST['city'];
        $phone_no = $_POST["ph"];
$q="insert into project3 (s_name,s_age,city,ph_no) values('$name','$age','$city','$phone_no')";
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
                
            $res="select * from project3";
            $resu=mysqli_query($conn,$res);
              $count=mysqli_num_rows($resu);
              echo $count;

                ?>
                </h2>
            </center>
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
        <th>EDIT</th>
        <th>DELETE</th>
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
 <td > <a href="update.php?id=<?php echo $exec['roll_no'];?>" >  <i class="fa fa-edit" aria-hidden="true"  ></i></a></td>
 <td><a href="delete.php?id=<?php echo $exec['roll_no'];?>" > <i class="fa fa-trash" aria-hidden="true"></i></a></td>
 </tr>
<?php
    }

    ?>
    

</table>
</center>


</body>

</html>