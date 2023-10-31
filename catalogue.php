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
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    </table>
</body>
</html>

