<?php
include_once("connection.php"); // Include your connection settings

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO tblloans (UserID, ISBN, Date_Borrowed, Date_Returned) VALUES (:UserID, :ISBN, :Date_Borrowed, :Date_Returned)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':UserID', $_POST["UserID"]);
    $stmt->bindParam(':ISBN', $_POST["ISBN"]);
    $stmt->bindParam(':Date_Borrowed', $_POST["Date_Borrowed"]);
    $stmt->bindParam(':Date_Returned', $_POST["Date_Returned"]);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->errorInfo()[2]; // Display detailed error information
    }

    $stmt->closeCursor();
}
?>

