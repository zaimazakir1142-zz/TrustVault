<?php
include "config.php";

if(isset($_POST['register'])){
    $u = $_POST['username'];
    $e = $_POST['email'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("INSERT INTO users(username,email,password) VALUES('$u','$e','$p')");
    echo "Registration Success";
}
?>

<form method="POST">
<h2>Register</h2>
<input name="username" placeholder="Username"><br>
<input name="email" placeholder="Email"><br>
<input type="password" name="password"><br>
<button name="register">Create</button>
</form>