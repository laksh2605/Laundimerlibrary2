<?php
session_start();
include_once("connection.php");

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $sql = "SELECT * FROM tblusers WHERE Username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $storedPassword = $row["Password"];

        if ($storedPassword == $password) {
            $_SESSION['loggedinuser'] = $row['UserID'];
            $_SESSION["username"] = $row["Forename"];
            $_SESSION["UserRole"] = $row["UserRole"];

            header("Location: index.php");
            exit();
        } else {
            echo "Incorrect Password";
        }
    } else {
        echo "User not found";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn = null;
}
?>
