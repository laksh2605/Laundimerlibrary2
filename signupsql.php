<body>
<?php require 'navbar.php'; ?>
<div class="signupform">
</body>
<?php
include_once("connection.php");

try {
    $sql = "INSERT INTO tblusers (surname, forename, username, password, Email_Address, UserRole)
            VALUES (:surname, :forename, :username, :password, :email, :userRole)";

    $stmt = $conn->prepare($sql);
    $surname = $_POST["surname"];
    $forename = $_POST["forename"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["Email_Address"];
    
    // Set the default value of $userRole to 0 (Normal User)
    $userRole = 0;

    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':forename', $forename, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':userRole', $userRole, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "New record created successfully";
        echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';

    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>


