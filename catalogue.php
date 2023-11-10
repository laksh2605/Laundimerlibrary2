<!DOCTYPE html>
<html>
<head>
    <title>Library Catalogue</title>
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
    <h1>Library Catalogue</h1>

    <!-- Search Form -->
    <h2>Search Books</h2>
    <form method="POST">
        <label for="searchTitle">Title: </label>
        <input type="text" name="searchTitle" id="searchTitle" placeholder="Enter Book Title">

        <label for="searchAuthor">Author: </label>
        <input type="text" name="searchAuthor" id="searchAuthor" placeholder="Enter Author Name">

        <input type="submit" value="Search">
    </form>

    <?php
    // Include the database connection file
    include 'connection.php';

    try {
        // Build the SQL query based on user input
        $query = "SELECT * FROM TblBooks WHERE 1";

        // Check if title is provided for search
        if (isset($_POST['searchTitle']) && !empty($_POST['searchTitle'])) {
            $searchTitle = $_POST['searchTitle'];
            $query .= " AND Title LIKE :searchTitle";
        }

        // Check if author is provided for search
        if (isset($_POST['searchAuthor']) && !empty($_POST['searchAuthor'])) {
            $searchAuthor = $_POST['searchAuthor'];
            $query .= " AND Author LIKE :searchAuthor";
        }

        // Prepare and execute the SQL query
        $searchQuery = $conn->prepare($query);

        if (isset($searchTitle)) {
            $searchTitleValue = '%' . $searchTitle . '%';
            $searchQuery->bindParam(':searchTitle', $searchTitleValue, PDO::PARAM_STR);
        }

        if (isset($searchAuthor)) {
            $searchAuthorValue = '%' . $searchAuthor . '%';
            $searchQuery->bindParam(':searchAuthor', $searchAuthorValue, PDO::PARAM_STR);
        }

        $searchQuery->execute();

        echo '<h2>Search Results</h2>';
        echo '<table>';
        echo '<tr>
                <th>Book Title: </th>
                <th>Author: </th>
                <th>ISBN: </th>
                <th>Genre: </th>
                <th>In Library: </th>
              </tr>';

        while ($row = $searchQuery->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['Title'] . '</td>';
            echo '<td>' . $row['Author'] . '</td>';
            echo '<td>' . $row['ISBN'] . '</td>';
            echo '<td>' . $row['Genre'] . '</td>';
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
