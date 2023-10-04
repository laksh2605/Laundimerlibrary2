<html>
    <head>
        <title>Login</title>
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
            <h1>Login</h1>

</head>
<body>

    <form action="loginsql.php" method= "POST">
<br>
Username:<input type="text" name="username"><br>
Password:<input type="password" name="password"><br>
<input type="submit" value="Login">
</form>
</body>

