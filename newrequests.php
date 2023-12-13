<html>
<head>
    <title>Request New Book</title>
    <link rel="stylesheet" href="header.css">
        <style>
            .signupform{
                text-align:center;
                font-size:18px;
                margin-top: 40;
            }
            form {
                display: flex;
                justify-content: center;
            }
        </style>
</head>
<body>
<?php require 'navbar.php'; ?>
        <div>
            <div class="signupform">
    <h1>Request New Book</h1>
<form action='newrequestsql.php' method="POST">
    <table>
    <tr><td>Title:</td><td><input type="text" name="title"></td></tr>
    <tr><td>Author:</td><td><input type="text" name="author"></td></tr>
    <tr><td>Email Address for book availability:</td><td><input type="text" name="User_Email"></td></tr>
    <tr><td>Notes:</td><td><input type="text" name="Notes"></td></tr>
    <tr><td></td><td><input type="submit" value="Request New Books"></td></tr>
    </table>    
</form>
</body>
</html>

