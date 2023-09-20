<?php

include_once("connection.php");

try {
    // $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "INSERT INTO tblusers (surname, forename, username, password, Email_Address, UserRole)
            VALUES (:surname, :forename, :username, :password, :email, :userRole)";
    
    $stmt = $conn->prepare($sql);
    
    $surname = $_POST["surname"];
    $forename = $_POST["forename"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["Email_Address"];
    $userRole = $_POST["UserRole"];
    
    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':forename', $forename, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':userRole', $userRole, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$dbh = null;

?>

