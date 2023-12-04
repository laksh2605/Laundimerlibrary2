<?php

include_once("connection.php");

try {
    
    // Sanitize user input (you can use htmlspecialchars for display purposes)
    $searchfor = htmlspecialchars($_POST['searchfor']);
    
    $sql = "SELECT TblLoans.Date_Borrowed as db, TblLoans.Date_Returned as dr, TblBooks.Title as title, TblBooks.Image, TblUsers.Surname, TblUsers.Forename, TblUsers.Username 
            FROM TblLoans 
            INNER JOIN TblBooks ON TblLoans.ISBN = TblBooks.ISBN
            INNER JOIN TblUsers ON TblUsers.UserID = TblLoans.UserID 
            WHERE TblLoans.UserID = :searchfor";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':searchfor', $searchfor, PDO::PARAM_INT);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo htmlspecialchars($row['title']); // Use htmlspecialchars for display
        }
    } else {
        echo "0 results";
        echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';

    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';

}

$dbh = null;

?>


   