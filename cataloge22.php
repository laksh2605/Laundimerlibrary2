<!DOCTYPE html>
<html>
<head>
    <title>Library Catalogue</title>
</head>
<body>
    <h1>Library Catalogue</h1>

    <table>
        <tr>
            <th>Book Title: </th>
            <th>Author: </th>
            <th>ISBN: </th>
            <th>In Library: </th>
        </tr>

        <?php
        // Include the database connection file
        include 'connection.php';

        // Display all books
        $query = "SELECT * FROM TblBooks";
        $result = $conn->query($query);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Title'] . "</td>";
            echo "<td>" . $row['Author'] . "</td>";
            echo "<td>" . $row['ISBN'] . "</td>";
            echo "<td>" . $row['In_Library'] . "</td>";
            echo "</tr>";
        }

        // Search by Author
        if (isset($_POST['searchAuthor'])) {
            $searchAuthor = $_POST['searchAuthor'];

            // Prepare a SQL query to search for books by author
            $searchAuthorQuery = $conn->prepare("SELECT * FROM TblBooks WHERE Author LIKE :searchAuthor");
            $searchAuthorQuery->bindParam(':searchAuthor', '%' . $searchAuthor . '%', PDO::PARAM_STR);
            $searchAuthorQuery->execute();

            while ($row = $searchAuthorQuery->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['Title'] . "</td>";
                echo "<td>" . $row['Author'] . "</td>";
                echo "<td>" . $row['ISBN'] . "</td>";
                echo "<td>" . $row['In_Library'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <h2>Search by Author</h2>
    <form method="POST">
        <label for="searchAuthor">Author: </label>
        <input type="text" name="searchAuthor" id="searchAuthor" placeholder="Enter Author Name">
        <input type="submit" value="Search">
    </form>
</body>
</html>
