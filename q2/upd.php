<?php

include "conn.php";
$id=$_GET['id'];
$que="select client_name,source,destination,address,no_pass,tra_date,train_no  from project1 where id='$id'";
$ex=mysqli_query($conn,$que);
$exec=mysqli_fetch_array($ex);


?>
<html>
    <head>
      
</head>
    <body>
        <div>
        <center>
        <table>
            <form action="#" method="post">
                <h1>TICKET BOOKING</h1>
                <tr>
                    <td><label for="">client Name :</label></td>
                   <td> <input type="text" name="name" value="<?php echo $exec['client_name'];?>" ></td>
                </tr>
              
                <tr>
                    <td><label for="">Source </label></td>
                    <td><input type="text" name="source" value="<?php echo $exec['source'];?>"></td>

                </tr>
                <tr>
                    <td><label for="">Destination </label></td>
                    <td><input type="text" name="desti" value="<?php echo $exec['destination'];?>"></td>

                </tr>
                <tr>
                    <td><label for="">Address </label></td>
                    <td><input type="text" name="add" value="<?php  echo $exec['address'];?>"></td>

                </tr>
                <tr>
                    <td><label for="">No. of Passenger </label></td>
                    <td><input type="number" name="num"  value="<?php  echo $exec['no_pass'];?>"></td>

                </tr>
                <tr>
                    <td><label for="">Travelling Date </label></td>
                    <td><input type="date" name="dat" value="<?php  echo $exec['tra_date'];?>"></td>

                </tr>
                <tr>
                    <td><label for="">Train No. </label></td>
                    <td><input type="number" name="num1" value="<?php  echo $exec['train_no'];?>"></td>

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
    $sour=$_POST['source'];
    $desti=$_POST['desti'] ;
    $add=$_POST['add'] ;
    $num=$_POST['num'] ;
    $dat=$_POST['dat'];
    $num1=$_POST['num1'];
    $que="update project1 set client_name='$name',source='$sour',destination='$desti',address='$add',no_pass='$num',tra_date='$dat',train_no='$num1' where id='$id'";
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


            


</center>

</body>
</html>

