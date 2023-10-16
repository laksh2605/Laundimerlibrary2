<?php

include_once("connection.php");

try {
    // Start a session
    session_start();
    
    print_r($_POST);
    
    if (!empty($_POST)) {
        // Prepare an SQL statement to update user information
        $stmt = $conn->prepare("UPDATE tblusers SET Forename=:forename, Surname=:surname, Username=:username, Password=:password, Email_Address=:emailaddress, UserRole=:userrole WHERE UserID=:userid");
        
        // Bind parameters to the placeholders
        $stmt->bindParam(':forename', $_POST['forename'], PDO::PARAM_STR);
        $stmt->bindParam(':surname', $_POST['surname'], PDO::PARAM_STR);
        $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
        $stmt->bindParam(':emailaddress', $_POST['Email_Address'], PDO::PARAM_STR);
        $stmt->bindParam(':userrole', $_POST['UserRole'], PDO::PARAM_STR);
        $stmt->bindParam(':userid',  $_SESSION['loggedinuser'], PDO::PARAM_INT);
        
        // Execute the SQL statement
        if ($stmt->execute()) {
            echo "User information updated successfully";
        } else {
            echo "Error updating user information";
        } 
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$dbh = null;
?>


