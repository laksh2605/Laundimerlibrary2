<html>
<head>
    <title>Loan Books</title>
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
<div class="signupform">

    <?php
    // Check if the user is not logged in, redirect to login page
    if (!isset($_SESSION['loggedinuser'])) {
        header("Location: login.php");
    }
    ?>

    <h1> Add New Loan</h1>

    <form action='loanbookssql.php' method="POST">
    <input type="hidden" name="UserID" value="<?php echo $_SESSION['loggedinuser']; ?>">

        Book:
        <select name="ISBN">
            <?php
            include_once("connection.php");

            $query = "SELECT ISBN, Title FROM TblBooks";
            $result = $conn->query($query);

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['ISBN'] . "'>" . $row['Title'] . "</option>";
            }
            ?>
        </select><br>

        Date_Borrowed: <input type="date" name="Date_Borrowed"><br>
        Date_Returned: <input type="date" name="Date_Returned"><br>

        <input type="submit" value="Add new Book"><br>
    </form>
</body>
</html>

