<?php  
$result = "";
session_start();
include 'db.php';

if(isset($_POST['btnSubmit'])){
    $password = $_POST['password'];
    $cpassword =$_POST['cpassword'];
    if(!empty($password) and !empty($cpassword) ){
        if(strcmp($password,$cpassword) == 0){
            $_SESSION['password'] = $password;


        $stmt = $conn->prepare("INSERT INTO userInfo (username, name, email,cellno,password) VALUES (?, ?, ?,?,?)");
        $stmt->bind_param("sssis", $username ,$name, $email,$cellno,$password);
        
        // set parameters and execute
        $username = $_SESSION['username'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $cellno = $_SESSION['cellno'];
        $password =$_SESSION['password'];
        

        $stmt->execute();

        

        header('Location:index.php');
        }else{
          $result = "Please enter the same password";
        }
    }else{
        $result = "Please enter both passwords";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter your password here</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<div class="form text-center">

<form action="password.php" method="post">
<h3>Enter your password</h3>
    <label for="lblpassword">Password</label> <br>
    <input class="form-control" type="password" name="password" id="password"> <br>
    <label  for="lblcpassword">Confirm password</label><br>
    <input class="form-control" type="password" name="cpassword" id="cpassword"> <br>
    
    <input type="submit" value="Submit" name="btnSubmit" id="btnSubmit" class="btn btn-outline-light"> <br>
    <label for="banner"><?=$result?></label>
    
    </form>

</div>
    
</body>
</html>