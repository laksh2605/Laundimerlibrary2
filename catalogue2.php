<!DOCTYPE html>
<html>
<head>
    <title>Library Catalogue</title>
</head>
<body>
    <h1>Library Catalogue</h1>

    <h2>Search by Title</h2>
    <form method="POST">
        <label for="searchTitle">Title: </label>
        <input type="text" name="searchTitle" id="searchTitle" placeholder="Enter Book Title">
        <input type="submit" value="Search">
    </form>

    <?php
    // Include the database connection file
    include 'connection.php';

    if (isset($_POST['searchTitle'])) {
        $searchTitle = $_POST['searchTitle'];

        $searchTitleValue = '%' . $searchTitle . '%';

        $searchTitleQuery = $conn->prepare("SELECT * FROM TblBooks WHERE Title LIKE :searchTitle");
        $searchTitleQuery->bindParam(':searchTitle', $searchTitleValue, PDO::PARAM_STR);
        $searchTitleQuery->execute();

        echo '<h2>Search Results</h2>';
        echo '<table>';
        echo '<tr><th>Book Title:</th><th>Author:</th><th>ISBN:</th><th>In Library:</th></tr>';

        while ($row = $searchTitleQuery->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['Title'] . '</td>';
            echo '<td>' . $row['Author'] . '</td>';
            echo '<td>' . $row['ISBN'] . '</td>';
            echo '<td>' . $row['In_Library'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        // Display all books by title
        $query = "SELECT * FROM TblBooks";
        $result = $conn->query($query);

        echo '<h2>All Books</h2>';
        echo '<table>';
        echo '<tr><th>Book Title:</th><th>Author:</th><th>ISBN:</th><th>In Library:</th></tr>';

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['Title'] . '</td>';
            echo '<td>' . $row['Author'] . '</td>';
            echo '<td>' . $row['ISBN'] . '</td>';
            echo '<td>' . $row['In_Library'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    ?>
</body>
</html>
