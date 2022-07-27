<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
    
</head>
<body>
    <?php 
    include 'db.php';

    session_reset();

    session_start();
     $result = "";
    

    if(isset($_POST['signIn'])){
        $username =$_POST['username'] ;
        $password = $_POST['password'];

        if(empty($username) and empty($password)){
            header("Location:registration.php");
        }else if(!empty($username) and !empty($password)){
            $stmt = $conn -> prepare("SELECT username,password FROM userinfo WHERE username= ? AND password=?");

            $stmt -> bind_param("ss", $username,$password);
            $stmt -> execute();
            $stmt -> store_result();



            $stmt -> fetch();
            $numberofrows = $stmt->num_rows;


            $stmt -> close();

            if($numberofrows >0){
                header('Location:home.php');
            }else{
                $result = "Wrong password or username";
            }
        }
    }
    ?>
<form action="index.php" method="post" class="container">

<div class="form text-center">
<h3 class="text-center">Login Here</h3>
<label for="lblusername">Enter Username</label> <br>
<input class="form-control" type="text" name="username" id="username"> <br>
<label for="lblpassword">Enter password</label>
<input class="form-control" type="password" name="password" id="password"> <br>
<input type="submit" value="Sign in / Register" name="signIn" class="btn btn-outline-light"> <br>

<a href="">Forgot username or password ?</a> <br>
<label for="result" class="result"><?=$result ?></label>

</div>


</form>
    
</body>
</html>