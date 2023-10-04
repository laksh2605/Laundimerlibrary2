<?php
session_start();
include_once("connection.php");

$username = $_POST['username'];

try {

    $sql = "SELECT * FROM tblusers WHERE Username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<br> Username : {$row['Username']}  <br> " . "--------------------------------<br>";
            $_SESSION['loggedinuser'] = $row['UserID'];
        }
    } else {
        echo "0 results";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$dbh = null;
?>
