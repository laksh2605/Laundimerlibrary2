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
UserID: <input type="text" name="UserID"/></br></br>
<input type="submit" value="View Reviews"/>
</form>
</body>
</html>

