<?php
session_start();
include "config.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$id = $_SESSION['user']['id'];

$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - TrustVault</title>

    <style>

        body{
            margin:0;
            padding:0;
            font-family:Arial;
            background:#f4f7fb;
        }

        .container{
            width:90%;
            margin:auto;
            padding-top:40px;
        }

        .top-box{
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
            margin-bottom:30px;
        }

        h1{
            color:#2563eb;
        }

        .balance{
            font-size:25px;
            margin-top:10px;
            color:#111827;
        }

        .btns{
            margin-top:20px;
        }

        .btns a{
            text-decoration:none;
            background:#2563eb;
            color:white;
            padding:12px 20px;
            border-radius:10px;
            margin-right:10px;
        }

        .logout{
            background:#dc2626 !important;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        table th{
            background:#2563eb;
            color:white;
            padding:15px;
        }

        table td{
            padding:15px;
            border-bottom:1px solid #ddd;
            text-align:center;
        }

        tr:hover{
            background:#f1f5f9;
        }

    </style>
</head>
<body>

<div class="container">

    <div class="top-box">

        <h1>🏦 TrustVault Dashboard</h1>

        <h2>
            Welcome,
            <?php echo $user['username']; ?>
        </h2>

        <div class="balance">
            Balance:
            <?php echo $user['balance']; ?> BDT
        </div>

        <div class="btns">
            <a href="deposit.php">Deposit</a>

            <a href="withdraw.php">Withdraw</a>

            <a href="transfer.php">Transfer</a>

            <a href="logout.php" class="logout">
                Logout
            </a>
        </div>

    </div>

    <table>

        <tr>
            <th>Transaction Type</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>

        <?php

        $tr = $conn->query("
        SELECT * FROM transactions
        WHERE sender_id=$id OR receiver_id=$id
        ORDER BY id DESC
        ");

        while($t = $tr->fetch_assoc()){

        ?>

        <tr>

            <td>
                <?php echo $t['type']; ?>
            </td>

            <td>
                <?php echo $t['amount']; ?> BDT
            </td>

            <td>
                <?php echo $t['date']; ?>
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>