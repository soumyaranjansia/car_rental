<?php
require('connection.inc.php');
require('functions.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="test1.php" method="post">
    <input type="text" name="username">
    <input type="text" name="pass">
    <input  type="submit" name="submit">
    </form>
</body>
</html>
<?php
if (isset($_POST[submit])) 
{
     
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $query="select * from car_agency where username='$username' and agent_pass='$pass'";
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0){
        $_SESSION['user']=$username;
        echo "success";
        echo $_SESSION['user'];
        unset($_SESSION['user']);
        echo "UNSET SUCCESS";
        echo $_SESSION['user'];
    }
    else{
        echo "login unsuccessful";
    }
}
?>