<?php  
session_start();
include 'db.php';
$result = "";

if(isset($_POST['btnSubmit'])){
    $userVerCode = $_POST['vercode'];

    if($userVerCode == $_SESSION['vercode']){
        $stmt = $conn->prepare("INSERT INTO userInfo (username, name, email,cellno,password,code) VALUES (?, ?, ?,?,?,?)");
        $stmt->bind_param("sssisi", $username ,$name, $email,$cellno,$password,$code);
        
        // set parameters and execute
        $username = $_SESSION['username'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $cellno = $_SESSION['cellno'];
        $password =$_SESSION['password'];
        $code = $userVerCode;

        $stmt->execute();

        header('Location:index.php');
    }else{
        $result = "Wrong code";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<div class="form text-center">

<form action="verification.php" method="post">
    
<h3>Enter the code sent to your email here </h3>
    <label for="lblcode">Code</label> <br>
    <input class="form-control" type="text" name="vercode" id="vercode"> <br>
    
    
    <input type="submit" value="Submit" name="btnSubmit" id="btnSubmit" class="btn btn-outline-light"> <br>
    <label for="banner"><?=$result?></label>
    
    </form>


    
</div>

</div>
</body>
</html>