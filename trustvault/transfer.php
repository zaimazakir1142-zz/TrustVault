<?php
session_start();
include "config.php";

$id = $_SESSION['user']['id'];

if(isset($_POST['transfer'])){
    $email = $_POST['email'];
    $amount = $_POST['amount'];

    $r = $conn->query("SELECT * FROM users WHERE email='$email'");
    $receiver = $r->fetch_assoc();

    if($receiver){
        $conn->query("UPDATE users SET balance=balance-$amount WHERE id=$id");
        $conn->query("UPDATE users SET balance=balance+$amount WHERE id={$receiver['id']}");

        $conn->query("INSERT INTO transactions(sender_id,receiver_id,type,amount)
        VALUES($id,{$receiver['id']},'transfer',$amount)");

        echo "Transfer Success";
    }
}
?>

<form method="POST">
<input name="email" placeholder="Receiver Email">
<input name="amount" placeholder="Amount">
<button name="transfer">Send</button>
</form>