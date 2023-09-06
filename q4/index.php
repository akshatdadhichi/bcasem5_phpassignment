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
                    <h1>BOOK DETAILS</h1>
                    <tr>
                        <td><label for="">BOOK CODE:</label></td>
                       <td> <input type="text" name="code" ></td>
                    </tr>
                    <tr>
                        <td><label for="">BOOK NAME</label></td>
                        <td><input type="text" name="name" ></td>
                    </tr>
                    <tr>
                        <td><label for="">AUTHOR NAME </label></td>
                        <td><input type="text" name="aut"></td>

                    </tr>
                    <tr>
                        <td><label for="">COST</label></td>
                        <td><input type="number" name="cost"></td>

                    </tr>
                    <tr>
                        <td><label for="">ISBN NUMBER</label></td>
                        <td><input type="number" name="isbn"></td>

                    </tr>
                    <table>
                        <tr>
                            <td><input type="submit" value="submit" name="submit" style="font-size: 20px; width:150px; border-radius:20%"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Search" name="Search" style="font-size: 20px; width:150px; border-radius:20%"></td>
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
        $code=$_POST['code'];
        $name=$_POST['name'];
        $aut=$_POST['aut'];
        $cost = $_POST["cost"];
        $num = $_POST["isbn"];
     
$q="insert into project4 (book_code,book_name,author_name,cost,isbn_code) values('$code','$name','$aut','$cost','$num')";
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
                
            $res="select * from project4";
            $resu=mysqli_query($conn,$res);
              $count=mysqli_num_rows($resu);
              echo $count;

                ?>
                </h2>
            </center>
            <center>
<table border="3" cellspacing="10px" cellpadding="10px">

            <?php

    $res="select * from project4";
    $result=mysqli_query($conn,$res);
   ?>

    <tr>
        <th>BOOK CODE</TH>
        <th>BOOK NAME</TH>
        <th>AUTHOR NAME</TH>
        <th>COST</TH>
        <th>ISBN NUMBER</TH>
        <th>EDIT</th>
        <th>DELETE</th>
</tr>
<tr>


<?php
    while( $exec=mysqli_fetch_array($result)){
        ?>
      <td> <?php echo $exec['book_code'];?></td>
 <td> <?php echo $exec['book_name'];?></td>
 <td>  <?php echo $exec['author_name'];?></td>
 <td> <?php  echo $exec['cost'];?></td>
 <td> <?php  echo $exec['isbn_code'];?></td>
 <td > <a href="update.php?id=<?php echo $exec['book_code'];?>" >  <i class="fa fa-edit" aria-hidden="true"  ></i></a></td>
 <td><a href="delete.php?id=<?php echo $exec['book_code'];?>" > <i class="fa fa-trash" aria-hidden="true"></i></a></td>
 </tr>
<?php
    }

    ?>
    

</table>
</center>
<?php
if(isset($_POST['Search']))
{
    header('location:search.php');
}

?>

</body>

</html>