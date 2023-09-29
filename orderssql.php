<?php

// Include the 'connection.php' file, which contains the database connection settings.
include_once("connection.php");

try {
    
    $sql = "SELECT * FROM TblOrders 
            INNER JOIN TblBooks ON TblBooks.ISBN = TblOrders.ISBN WHERE TblBooks.Title = :title";
    
    $stmt = $conn->prepare($sql);
    
    $title = $_POST['Title'];
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    
    $stmt->execute();
// Check if there are any rows returned by the query.
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <form action='CancelOrder.php' method='POST'>
                <table>
                    <tr>
                        <th><td>Title: </td><td><?php echo $row["Title"] ?></td></th>
                        <th><td>Author: </td><td><?php echo $row["Author"] ?></td></th>
                        <th><td>UserID: </td><td><?php echo $row["UserID"] ?></td></th>
                        <th><td></td></th>
                        <th><td><input type="submit" value="Cancel Order"></td></th>
                    </tr>
                </table>
            </form>
            <?php
        }
    } else {
    // If no results were found, display "0 results."
        echo "0 results";
    }
} catch (PDOException $e) {
// Handle any exceptions that may occur during database operations and display an error message.
    echo "Error: " . $e->getMessage();
}

$dbh = null;

?>
