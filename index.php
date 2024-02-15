<?php
    include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <h2>Welcome to Gaslandie</h2>
        username: <br>
        <input type="text" name="username" value="username"> <br>
        password: <br>
        <input type="password" name="password" value="password"><br>
        <input type="submit" name="submit" value="register">
    </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] = "POST"){
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(empty($username)){
        echo "enter your username";
    }elseif(empty($password)){
        echo "enter your password";
    }else{
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "insert into users(username,password) values ('$username', '$hash')";
        try{
            mysqli_query($conn,$sql);
            echo "you are now registered";
        }catch(mysqli_sql_exception){
            echo "this username already exist";
        }
        
    }
    mysqli_close($conn);
?>


