<body>
<?php require 'navbar.php'; ?>
<div class="signupform">
</body>
<?php
include_once("connection.php");
print_r($_POST);
try {
    // Define an SQL query to insert a new record into the 'tblrequests' table.
    $sql = "INSERT INTO tblrequests (RequestID, title, author, User_Email, Notes)
            VALUES (NULL, :title, :author, :user_email, :notes)";

    $stmt = $conn->prepare($sql);

    $title = $_POST["title"];
    $author = $_POST["author"];
    $user_email = $_POST["User_Email"];
    $notes = $_POST["Notes"];
    
    // Bind the variables to placeholders in the SQL query.
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':author', $author, PDO::PARAM_STR);
    $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
    $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        echo "Your Request has been successfully entered.";
        echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$dbh = null;
?>

