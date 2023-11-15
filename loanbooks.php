<html>
<head>
    <title>View Loan History</title>
</head>
<body>

    <h1> Add New Loan</h1>

    <form action='loanbookssql.php' method="POST">
        UserID: <input type="number" name="UserID"><br>

        <!-- Dropdown list for books -->
        Book:
        <select name="ISBN">
            <?php
            include_once("connection.php");

            // Fetch books from TblBooks
            $query = "SELECT ISBN, Title FROM TblBooks";
            $result = $conn->query($query);

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".$row['ISBN']."'>".$row['Title']."</option>";
                }
            ?>
        </select><br>

        Date_Borrowed: <input type="date" name="date_borrowed"><br>
        Date_Returned: <input type="date" name="date_returned"><br>

        <input type="submit" value="Add new Book"><br>
    </form>
</body>
</html>
