<?php
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO tblloans (UserID, ISBN, Date_Borrowed, Date_Returned, Review, Rating, Late_Fines) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Assuming $_POST["UserID"], $_POST["ISBN"], $_POST["Date_Borrowed"], $_POST["Date_Returned"], $_POST["Review"], $_POST["Rating"], $_POST["Late_Fines"] are the form input values.

    $stmt->bind_param('sssssss', $_POST["UserID"], $_POST["ISBN"], $_POST["Date_Borrowed"], $_POST["Date_Returned"], $_POST["Review"], $_POST["Rating"], $_POST["Late_Fines"]);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
