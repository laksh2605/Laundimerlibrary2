<body>
<?php require 'navbar.php'; ?>
<div class="signupform">
</body>
<?php
include_once("connection.php");

try {
    // Check if 'title' is set in the POST data
    if (isset($_POST['title'])) {
        // Search by Title
        $sql = "SELECT tblreviews.Rating as rate, tblbooks.ISBN as isbn, tblreviews.UserID as userid, tblreviews.reviews, tblbooks.Title as title
                FROM tblreviews INNER JOIN tblbooks ON tblbooks.ISBN = tblreviews.ISBN 
                WHERE tblbooks.Title LIKE :bookTitle";

        $stmt = $conn->prepare($sql);

        // Retrieve title from the POST data and bind it as a string in the query.
        $bookTitle = '%' . $_POST['title'] . '%';
        $stmt->bindParam(':bookTitle', $bookTitle, PDO::PARAM_STR);
        
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Display results in a table
                ?>
                <table>
                    <tr>
                        <th><td>Title: </td><td><?php echo $row["title"]?></td></th>
                        <th><td>ISBN: </td><td><?php echo $row["isbn"]?></td></th>
                        <th><td>User Id: </td><td><?php echo $row["userid"]?></td></th>
                        <th><td>Rating: </td><td><?php echo $row["rate"]?></td></th>
                        <th><td>Reviews: </td><td><?php echo $row["reviews"]?></td></th>
                    </tr>
                </table>
                <br><br><a href="index.php"><button>Return to Homepage</button></a>
                <?php
            }
        } else {
            // If no results were found, display "0 results."
            echo "0 results";
            echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
        }
    } else {
        // Handle the case where 'title' is not set in the POST data.
        echo "Please provide a Book Title to search.";
    }
} catch (PDOException $e) {
    // Handle any exceptions that may occur during database operations and display an error message.
    echo "Error: " . $e->getMessage();
    echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
} finally {
    // Close the database connection.
    $conn = null;
}
?>
