<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="header.css">
    <style>
        .signupform {
            text-align: center;
            font-size: 18px;
            margin-top: 40;
        }
    </style>
</head>
<body>
<?php require 'navbar.php'; ?>
<h1 style="text-align: center;">Sign Up</h1>
<div>
    <div class="signupform">
        <form action="signupsql.php" method="POST">
            Forename: <input type="text" name="forename"/></br></br>
            Surname: <input type="text" name="surname"/></br></br>
            Username: <input type="text" name="username"/></br></br>
            Password: <input type="password" name="password"/></br></br>
            Email Address: <input type="text" name="Email_Address"/></br></br>
            <!-- UserRole is set to 0 (Normal User) by default -->
            <input type="hidden" name="UserRole" value="0" />
            <input type="submit" value="Sign Up"/>
        </form>
    </div>
</div>
</body>
</html>


