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
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<br> Username : {$row['Username']}  <br> " . "--------------------------------<br>";
            $rowpassword = $row["Password"];
            
            if ($rowpassword == $password) {

                $_SESSION['loggedinuser'] = $row['UserID'];
                $_SESSION["username"] = $row["Forename"];
                    
            } else {
                echo "Incorect Password";
            }

        }
    } else {
        echo "0 results";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $dbh = null;
    if (array_key_exists("loggedinuser", $_SESSION)) {
        header("Location: index.php");
    }
}
?>
