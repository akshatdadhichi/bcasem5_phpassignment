<?php
session_start();
?>


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
            width: 250px;
            height: 35px;
            font-size: 20px;
            border-radius: 20%
        }
        
        div {
            background-color: rgba(0, 0, 0, 0.4);
            margin: auto;
            
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
                       <td> <input type="text" name="name" placeholder="enter your name"  ></td>
                    </tr>
                    <tr>
                        <td><label for="">CITY:</label></td>
                        <td><input type="text" name="city"  placeholder="enter your city"></td>
                    </tr>
                    <tr>
                        <td><label for="">MOBILE NUMBER </label></td>
                        <td><input type="number" name="num" placeholder="enter your mobile_num"></td>

                    </tr>
                    <tr>
                        <td><label for="">CAST</label></td>
                        <td><input type="text" name="cast"  placeholder="enter your  cast"></td>

                    </tr>
                    <tr>
                        <td><label for="">SUB CAST</label></td>
                        <td><input type="text" name="scast" placeholder="enter your sub cast"></td>

                    </tr>
                    <tr>
                        <td><label for="">GENDER</label></td>
                        <td><input type="radio" name="r1" value="MALE" id="m" style="width:20px; height:20px">
                        <label for="m" id="m" value="MALE">MALE</label>
                       <input type="radio" name="r1" value="FEMALE" id="fe" style="width:20px; height:20px">
                        <label for="fe" id="fe" value="FEMALE">FEMALE</label></td>


                    </tr>
                    <tr>
                        <td><label for="">QUALIFICATION</label></td>
                        <td><input type="text" placeholder="enter your qualificaiton" name="q"></td>
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
    if($_SESSION['usern']==true){
    include "conn.php";
    if(isset($_POST['submit']))
    {
       
        $name=$_POST['name'];
        $city=$_POST['city'];
        $num = $_POST["num"];
        $cast = $_POST["cast"];
        $scast = $_POST["scast"];
        $radio = $_POST["r1"];
        $q = $_POST["q"];

$q="insert into project7 (person_name,city,mo_no,cast,subcast,gender,qualification) values('$name','$city','$num','$cast','$scast','$radio','$q')";
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
    else{
        header('location:log.php');
    }
    
    
    ?>
            <center>
                <h2>Records :
                    <?php 
                
            $res="select * from project7";
            $resu=mysqli_query($conn,$res);
              $count=mysqli_num_rows($resu);
              echo $count;

                ?>
                </h2>
            </center>
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
        <th>EDIT</th>
        <th>DELETE</th>
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
  <td > <a href="update.php?id=<?php echo $exec['person_name'];?>" >  <i class="fa fa-edit" aria-hidden="true"  ></i></a></td>
 <td><a href="delete.php?id=<?php echo $exec['person_name'];?>" > <i class="fa fa-trash" aria-hidden="true"></i></a></td>
 </tr>
<?php
    }

    ?>
    
   
</table>
</center>


</body>

</html>