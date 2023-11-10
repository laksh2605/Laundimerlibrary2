<!DOCTYPE html>
<html>
<head>
    <title>Library Catalogue</title>
</head>
<body>
    <h1>Library Catalogue</h1>

    <!-- Search by Title Form -->
    <h2>Search by Title</h2>
    <form method="POST">
        <label for="searchTitle">Title: </label>
        <input type="text" name="searchTitle" id="searchTitle" placeholder="Enter Book Title">
        <input type="submit" value="Search">
    </form>

    <?php
    // Include the database connection file
    include 'connection.php';

    try {
        // Display the search results or all books based on the condition
        if (isset($_POST['searchTitle'])) {
            $searchTitle = $_POST['searchTitle'];

            // Prepare a SQL query to search for books by title
            $searchTitleValue = '%' . $searchTitle . '%';
            $searchTitleQuery = $conn->prepare("SELECT * FROM TblBooks WHERE Title LIKE :searchTitle");
            $searchTitleQuery->bindParam(':searchTitle', $searchTitleValue, PDO::PARAM_STR);
            $searchTitleQuery->execute();

            echo '<h2>Search Results</h2>';
        } else {
            // Retrieve all books from the TblBooks table
            $query = "SELECT * FROM TblBooks";
            $searchTitleQuery = $conn->query($query);

            echo '<h2>All Books</h2>';
        }

        // Display the table header
        echo '<table>';
        echo '<tr>
                <th>Book Title: </th>
                <th>Author: </th>
                <th>ISBN: </th>
                <th>In Library: </th>
              </tr>';

        // Display the books in the table
        while ($row = $searchTitleQuery->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['Title'] . '</td>';
            echo '<td>' . $row['Author'] . '</td>';
            echo '<td>' . $row['ISBN'] . '</td>';
            echo '<td>' . $row['In_Library'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
    ?>
</body>
</html>
