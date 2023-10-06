<?php
session_start(); 
if (!isset($_SESSION['loggedinuser']))
{   
    header("Location:login.php");
}
?>
<html>
    <head>
        <title>My Profile Page</title>
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

<h1> My Profile </h1>
           
        <button class="profilebuttoncss" onclick="document.location.href='EditProfiles.php'">Edit Details</button>

        <button class="profilebuttoncss" onclick="document.location.href='LoanHistory.php'">Loan History</button>

        <button class="profilebuttoncss" onclick="document.location.href='viewreviews.php'">View Reviews</button>

        <button class="profilebuttoncss" onclick="document.location.href='Fines.php'">Fines</button>

        <button class="profilebuttoncss" onclick="document.location.href='Orders.php'">Orders</button>
    

    <h2>Recommend</h2>

</body>
</html>


