<?php
session_start();
include "config.php";

$id = $_SESSION['user']['id'];

if(isset($_POST['deposit'])){
    $a = $_POST['amount'];

    $conn->query("UPDATE users SET balance=balance+$a WHERE id=$id");
    $conn->query("INSERT INTO transactions(sender_id,type,amount) VALUES($id,'deposit',$a)");

    echo "Deposited!";
}
?>

<form method="POST">
<input name="amount">
<button name="deposit">Deposit</button>
</form>