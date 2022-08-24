<?php 
    include 'db.php';

    session_start();
    
    $result = "";

   if(isset($_POST['btnRegister'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cellno = $_POST['cellno'];

    if(!empty($username) and !empty($name) and !empty($email) and !empty($cellno)){
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['cellno'] = $cellno;
        header('Location:password.php');
    }else{
        $result = "Please enter valid data";
    }
   }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>


<div class="form text-center">

<form action="registration.php" method="post">
<h3>Enter your details to register</h3>
    <label for="lblusername">Username</label> <br>
    <input class="form-control" type="text" name="username" id="username"> <br>
    <label  for="lblname">Enter Name</label><br>
    <input class="form-control" type="text" name="name" id="name"> <br>
    <label for="lblemail">Email</label>
    <input class="form-control" type="email" name="email" id="email"> <br>
    <label for="lblcell">Cell No</label>
    <input class="form-control" type="number" name="cellno" id="cellno">
    <input type="submit" value="Register" name="btnRegister" id="btnRegister" class="btn btn-outline-light"> <br>
    <label for="banner"><?=$result ?></label>
    
    </form>

</div>
    
    
</body>
</html>