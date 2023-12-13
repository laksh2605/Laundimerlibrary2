<html>
    <head>
        <title>Laundimer Library</title>
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
                <form action="addadminsql.php" method="POST">
                    Forename: <input type="text" name="forename"/></br></br>
                    Surname: <input type="text" name="surname"/></br></br>
                    Username: <input type="text" name="username"/></br></br>
                    Password: <input type="password" name="password"/></br></br>
                    Email Address: <input type="text" name="Email_Address"/></br></br>
                    UserRole:                
                    <select name="UserRole">
                    <option value="0">Normal User</option>
                    <option value="1">Admin</option>
                    </select><br><br>
                    <input type="submit" value="Sign Up"/>
                </form>
            </div>
        </div>
    </body>
</html>

        