<?php
include "../config.php";

$res=$conn->query("SELECT * FROM transactions ORDER BY id DESC");

while($t=$res->fetch_assoc()){
    echo $t['type']." - ".$t['amount']." BDT<br>";
}
?>