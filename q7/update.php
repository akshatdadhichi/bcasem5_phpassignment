<?php

session_start();

?>


<?php

include "conn.php";
$id=$_GET['id'];
$que="select * from project7 where person_name='$id'";
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
                    <h1>MATRIMONY FORM</h1>
                    <tr>
                        <td><label for="">PERSON NAME:</label></td>
                       <td> <input type="text" name="p" value="<?php echo $resultme['person_name'];  ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">CITY :</label></td>
                       <td> <input type="text" name="c" value="<?php echo $resultme['city'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">MOBILE NUMBER</label></td>
                       <td> <input type="number" name="m" value="<?php echo $resultme['mo_no'];?>"></td>
                    </tr>
                    
                    <tr>
                        <td><label for="">CAST </label></td>
                        <td><input type="text" name="ca" value="<?php echo $resultme['cast'];  ?>"></td>

                    </tr>
                    <tr>
                        <td><label for=""> SUBCAST NAME </label></td>
                        <td><input type="text" name="cn" value="<?php echo $resultme['subcast'];  ?>"></td>

                    </tr>
                    <tr>
                        <td><label for="">GENDER</label></td>
                        <td><input type="radio" name="r1" value="MALE" id="m" style="width:20px; height:20px" <?php
                        if($resultme['gender']=="MALE")
                        {
                            echo "checked";
                        }
                        
                        
                        ?>>
                        
                        <label for="m" id="m" value="MALE">MALE</label>
                       <input type="radio" name="r1" value="FEMALE"  id="fe" style="width:20px; height:20px" <?php
                        if($resultme['gender']=="FEMALE")
                        {
                            echo "checked";
                        }
                        
                        
                        ?>>
                       
                        <label for="fe" id="fe" value="FEMALE">FEMALE</label></td>


                    </tr>
                    <tr>
                        <td><label for=""> QUALIFICATION : </label></td>
                        <td><input type="text" name="q" value="<?php echo $resultme['qualification'];  ?>"></td>

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
if($_SESSION==true)
{

?>
<?php

if(isset($_POST['Update']))
{
    $id=$_GET['id'];
    $name=$_POST['p'];
    $city=$_POST['c'];
    $m=$_POST['m'];
    $ca=$_POST['ca'];
    $cn=$_POST['cn'];
    $r1=$_POST['r1'];
    $q=$_POST['q'];
    $que="update project7 set person_name='$name',city='$city',mo_no='$m',cast='$ca',subcast='$cn', gender='$r1',qualification='$q' where person_name='$id'";
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

$res="select * from project7";
$result=mysqli_query($conn,$res);
?>

<tr>
<th>PERSON NAME</TH>
        <th>CITY</TH>
        <th>MOBILE NUMBER</TH>
        <th>CAST</TH>
        <th>SUB CAST</th>
        <th>GENDER</th>
        <th>QUALIFICATION</th>
   
</tr>
<tr>


<?php
while( $exec=mysqli_fetch_array($result)){
    ?>
  <td> <?php echo $exec['person_name'];?></td>
<td> <?php echo $exec['city'];?></td>
<td>  <?php echo $exec['mo_no'];?></td>
<td> <?php  echo $exec['cast'];?></td>
<td> <?php  echo $exec['subcast'];?></td>
<td> <?php  echo $exec['gender'];?></td>
<td> <?php  echo $exec['qualification'];?></td>
</tr>
<?php
}
}
?>

    

</table>
</center>

</body>
</html>