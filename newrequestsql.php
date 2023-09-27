<?php

include_once("connection.php");

try {
    // $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "INSERT INTO tblrequests (ISBN, title, author, User_Email, Notes)
            VALUES (:isbn, :title, :author, :user_email, :notes)";
    
    $stmt = $conn->prepare($sql);
    
    $isbn = $_POST["ISBN"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $user_email = $_POST["User_Email"];
    $notes = $_POST["Notes"];
    
    $stmt->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':author', $author, PDO::PARAM_STR);
    $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
    $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        echo "Successful insertion";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$dbh = null;

?>
