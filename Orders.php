<?php
session_start();

if (!isset($_SESSION["loggedinuser"]) || $_SESSION["UserRole"] != 1) {
    echo "This page is only for Admins. Please return to the Homepage or Login as an Admin. Thank you";
    echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
    exit();
}
?>

<html>
<head>
    <title>View Orders</title>
    <link rel="stylesheet" href="header.css">
        <style>
            .signupform{
                text-align:center;
                font-size:18px;
                margin-top: 40;
            }
        </style>
    </head>
    <body>
      <?php require 'navbar.php'; ?>
        <div>
            <div class="signupform">
</head>
<body>
<form action="orderssql.php" method="POST">
<h1>View Orders</h1>
Title: <input type="text" name="Title"/></br></br>
<input type="submit" value="Orders"/>

</form>
</body>
</html>
