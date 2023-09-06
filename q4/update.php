<?php

include "conn.php";
$id=$_GET['id'];
$que="select book_code,book_name,author_name,cost,isbn_code from project4 where book_code='$id'";
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
                    <h1>BOOK ORDER</h1>
                    <tr>
                        <td><label for="">BOOK CODE</label></td>
                       <td> <input type="text"  value="<?php echo $resultme['book_code'];  ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">BOOK NAME :</label></td>
                       <td> <input type="text" name="name" value="<?php echo $resultme['book_name'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">AUTHOR NAME</label></td>
                       <td> <input type="text" name="aut" value="<?php echo $resultme['author_name'];?>"></td>
                    </tr>
                    
                    <tr>
                        <td><label for="">COST </label></td>
                        <td><input type="text" name="cost" value="<?php echo $resultme['cost'];  ?>"></td>

                    </tr>
                    <tr>
                        <td><label for="">ISBN CODE </label></td>
                        <td><input type="number" name="isbn_code" value="<?php echo $resultme['isbn_code'];  ?>"></td>

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
    $aut=$_POST['aut'];
    $cost=$_POST['cost'];
    $isbn_code=$_POST['isbn_code'];
    $que="update project4 set book_name='$name',author_name='$aut',cost='$cost',isbn_code='$isbn_code' where book_code='$id'";
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

$res="select * from project4";
$result=mysqli_query($conn,$res);
?>

<tr>
<th>BOOK CODE</TH>

        <th>BOOK NAME</TH>
        <th>AUTHOR NAME</TH>
        <th>COST</TH>
        <th>ISBN NUMBER</TH>
   
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
</tr>
<?php
}

?>

    

</table>
</center>

</body>
</html>