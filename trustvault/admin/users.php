<?php
include "../config.php";

$res=$conn->query("SELECT * FROM users");

while($u=$res->fetch_assoc()){
    echo $u['username']." | ".$u['email']." | ".$u['balance']."<br>";
}
?>