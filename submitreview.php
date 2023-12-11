<?php

include_once("connection.php");

try {
    // Retrieve data from the form
    $ISBN = htmlspecialchars($_POST['ISBN']);
    $UserID = htmlspecialchars($_POST['UserID']);
    $Rating = htmlspecialchars($_POST['Rating']);
    $Reviews = htmlspecialchars($_POST['Reviews']);

    // Insert the review into tblreviews
    $sql = "INSERT INTO tblreviews (UserID, ISBN, Rating, Reviews) VALUES (:UserID, :ISBN, :Rating, :Reviews)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':UserID', $UserID, PDO::PARAM_INT);
    $stmt->bindParam(':ISBN', $isbn, PDO::PARAM_STR);
    $stmt->bindParam(':Rating', $Rating, PDO::PARAM_INT);
    $stmt->bindParam(':Reviews', $Reviews, PDO::PARAM_STR);
    $stmt->execute();

    echo "Review submitted successfully";
} catch (PDOException $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
} finally {
    $conn = null;
}
?>
