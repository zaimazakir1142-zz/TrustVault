<?php
session_start();
include "config.php";

$id = $_SESSION['user']['id'];

if(isset($_POST['withdraw'])){
    $a = $_POST['amount'];

    $conn->query("UPDATE users SET balance=balance-$a WHERE id=$id");
    $conn->query("INSERT INTO transactions(sender_id,type,amount) VALUES($id,'withdraw',$a)");

    echo "Withdraw Done!";
}
?>

<form method="POST">
<input name="amount">
<button name="withdraw">Withdraw</button>
</form>