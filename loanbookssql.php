<?php
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert a new record into tblloans
    $sql = "INSERT INTO tblloans (UserID, ISBN, Date_Borrowed, Date_Returned) VALUES (:UserID, :ISBN, :Date_Borrowed, :Date_Returned)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':UserID', $_POST["UserID"]);
    $stmt->bindParam(':ISBN', $_POST["ISBN"]);
    $stmt->bindParam(':Date_Borrowed', $_POST["Date_Borrowed"]);
    $stmt->bindParam(':Date_Returned', $_POST["Date_Returned"]);

    if ($stmt->execute()) {
        // Update In_Library field in TblBooks to 'N'
        $updateSQL = "UPDATE TblBooks SET In_Library = 'N' WHERE ISBN = :ISBN";
        $updateStmt = $conn->prepare($updateSQL);
        $updateStmt->bindParam(':ISBN', $_POST["ISBN"]);

        if ($updateStmt->execute()) {
            echo "New record created successfully.";
        } else {
            echo "Error updating book status: " . $updateStmt->errorInfo()[2];
        }

        $updateStmt->closeCursor();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }

    $stmt->closeCursor();
}
?>


