<body>
<?php require 'navbar.php'; ?>
<div class="signupform">
</body>
<?php
include_once("connection.php");

try {
    // Define an SQL query to retrieve ratings, ISBNs, UserIDs, and reviews based on a specific UserID.
    $sql = "SELECT tblreviews.Rating as rate, tblbooks.ISBN as isbn, tblreviews.UserID as userid, tblreviews.reviews 
            FROM tblreviews INNER JOIN tblbooks ON tblbooks.ISBN = tblreviews.ISBN 
            WHERE UserID = :userID";

    $stmt = $conn->prepare($sql);

    // Retrieve the 'UserID' parameter from the POST data and bind it as an integer parameter in the query.
    $userID = $_POST['UserID'];
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <!-- Generate an HTML table to display the retrieved data. -->
            <table>
                <tr>
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
} catch (PDOException $e) {
    // Handle any exceptions that may occur during database operations and display an error message.
    echo "Error: " . $e->getMessage();
    echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';

}

$dbh = null;
?>
