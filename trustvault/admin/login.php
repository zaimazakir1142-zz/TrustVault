<?php
session_start();
include "../config.php";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $conn->query("SELECT * FROM users 
    WHERE email='$email' AND password='$password' AND role='admin'");

    $admin = $res->fetch_assoc();

    if($admin){
        $_SESSION['admin'] = $admin;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login - TrustVault</title>

<style>
body{
    margin:0;
    font-family:Arial;
    background:linear-gradient(135deg,#111827,#2563eb);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.box{
    background:white;
    padding:40px;
    width:320px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    text-align:center;
}

h2{
    color:#2563eb;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ddd;
    border-radius:10px;
}

button{
    width:100%;
    padding:12px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:10px;
    cursor:pointer;
}

button:hover{
    background:#1d4ed8;
}

.error{
    color:red;
}
</style>

</head>
<body>

<div class="box">

    <h2>👨‍💼 Admin Login</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">

        <input type="email" name="email" placeholder="Email">

        <input type="password" name="password" placeholder="Password">

        <button name="login">Login</button>

    </form>

</div>

</body>
</html>