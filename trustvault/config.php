<?php
$conn = new mysqli("localhost", "root", "", "secure_bank");

if ($conn->connect_error) {
    die("Database Connection Failed");
}
?>