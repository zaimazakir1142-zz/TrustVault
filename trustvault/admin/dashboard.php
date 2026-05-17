<?php
session_start();
include "../config.php";

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

$totalUsers = $conn->query("SELECT * FROM users")->num_rows;
$totalTransactions = $conn->query("SELECT * FROM transactions")->num_rows;
$totalBalance = $conn->query("SELECT SUM(balance) as total FROM users")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f4f7fb;
}

.sidebar{
    width:220px;
    height:100vh;
    background:#111827;
    position:fixed;
    color:white;
    padding:20px;
}

.sidebar h2{
    color:#2563eb;
}

.sidebar a{
    display:block;
    color:white;
    padding:10px;
    text-decoration:none;
    margin-top:10px;
}

.sidebar a:hover{
    background:#2563eb;
    border-radius:8px;
}

.main{
    margin-left:240px;
    padding:20px;
}

.cards{
    display:flex;
    gap:20px;
}

.card{
    flex:1;
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.card h1{
    color:#2563eb;
}

table{
    width:100%;
    margin-top:20px;
    background:white;
    border-radius:15px;
    overflow:hidden;
}

th{
    background:#2563eb;
    color:white;
    padding:10px;
}

td{
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

</style>

</head>
<body>

<div class="sidebar">

<h2>🏦 TrustVault</h2>

<a href="dashboard.php">Dashboard</a>
<a href="users.php">Users</a>
<a href="transactions.php">Transactions</a>
<a href="../logout.php">Logout</a>

</div>

<div class="main">

<h1>👨‍💼 Admin Dashboard</h1>

<div class="cards">

<div class="card">
<h3>Total Users</h3>
<h1><?php echo $totalUsers; ?></h1>
</div>

<div class="card">
<h3>Total Transactions</h3>
<h1><?php echo $totalTransactions; ?></h1>
</div>

<div class="card">
<h3>Total Money</h3>
<h1><?php echo $totalBalance['total']; ?> BDT</h1>
</div>

</div>

</div>

</body>
</html>