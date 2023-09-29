<?php
include_once("connection.php");

try {
    // Define an SQL query to insert a new record into the 'tblusers' table.
    $sql = "INSERT INTO tblusers (surname, forename, username, password, Email_Address, UserRole)
            VALUES (:surname, :forename, :username, :password, :email, :userRole)";

    $stmt = $conn->prepare($sql);
    $surname = $_POST["surname"];
    $forename = $_POST["forename"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["Email_Address"];
    $userRole = $_POST["UserRole"];
    
    // Bind the variables to placeholders in the SQL query.
    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':forename', $forename, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':userRole', $userRole, PDO::PARAM_STR);
    
    // Execute the prepared SQL query and check if it was successful.
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        // If an error occurs during execution, display the error message.
        echo "Error: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$dbh = null;
?>
