
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
                        <td><label for="">USER NAME:</label></td>
                       <td> <input type="text" name="name" placeholder="enter your name"  ></td>
                    </tr>
                    <tr>
                        <td><label for="">PASSWORD:</label></td>
                        <td><input type="text" name="pass"  placeholder="enter your city"></td>
                    </tr>
                  
                    <table>
                        <tr>
                            <td><input type="submit" value="submit" name="submit" style="font-size: 20px; width:150px; border-radius:20%"></td>
                        </tr>
                       
                    </table>
                </form>

            </table>
        </center>
<?php
include "conn.php"; 
if(isset($_POST['submit']))
{
    $user=$_POST['name'];
    $pass=$_POST['pass'];
    $q="select * from project7 where person_name='$user'";
    $e=mysqli_query($conn,$q);
    $res=mysqli_num_rows($e);
    if ($res==true)
    {
        $_SESSION['usern']=$user;
        header('location:index.php');
    }
    else{
        header('location:log.php');
    }
}

?>


</body>

</html>