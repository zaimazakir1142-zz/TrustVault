<?php
session_start();
include "config.php";

if(isset($_POST['login'])){
    $e = $_POST['email'];
    $p = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE email='$e'");
    $user = $res->fetch_assoc();

    if($user && password_verify($p, $user['password'])){
        $_SESSION['user']=$user;
        header("Location: dashboard.php");
    } else {
        echo "Login Failed";
    }
}
?>

<form method="POST">
<h2>Login</h2>
<input name="email"><br>
<input type="password" name="password"><br>
<button name="login">Login</button>
</form>