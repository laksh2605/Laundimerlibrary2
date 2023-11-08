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

            try {
                // Retrieve books from the TblBooks table
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
        
                // Search by Title
                if (isset($_POST['searchTitle'])) {
                    $searchTitle = $_POST['searchTitle'];
        
                    // Prepare a SQL query to search for books by title
                    $searchTitleQuery = $conn->prepare("SELECT * FROM TblBooks WHERE Title LIKE :searchTitle");
                    $searchTitleQuery->bindParam(':searchTitle', '%' . $searchTitle . '%', PDO::PARAM_STR);
                    $searchTitleQuery->execute();
        
                    while ($row = $searchTitleQuery->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['Title'] . "</td>";
                        echo "<td>" . $row['Author'] . "</td>";
                        echo "<td>" . $row['ISBN'] . "</td>";
                        echo "<td>" . $row['In_Library'] . "</td>";
                        echo "</tr>";
                    }
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    </table>

    <h2>Search by Title</h2>
    <form method="POST">
        <label for="searchTitle">Title: </label>
        <input type="text" name="searchTitle" id="searchTitle" placeholder="Enter Book Title">
        <input type="submit" value="Search">
    </form>
</body>
</html>

