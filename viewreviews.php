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
        <title>View Reviews</title>
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
<h1>View Reviews</h1>
<form action="viewreviewssql.php" method="POST">
Book Title: <input type="text" name="title"/><br/><br/>
<input type="submit" value="View Reviews"/>
</form>
</body>
</html>

