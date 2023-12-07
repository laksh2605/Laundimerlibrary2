<body>
<?php require 'navbar.php'; ?>
<div class="signupform">
</body>
<?php
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO tblloans (UserID, ISBN, Date_Borrowed, Date_Returned) VALUES (:UserID, :ISBN, :Date_Borrowed, :Date_Returned)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':UserID', $_POST["UserID"]);
    $stmt->bindParam(':ISBN', $_POST["ISBN"]);
    $stmt->bindParam(':Date_Borrowed', $_POST["Date_Borrowed"]);
    $stmt->bindParam(':Date_Returned', $_POST["Date_Returned"]);

    if ($stmt->execute()) {
        // Get the borrowed and return dates
        $dateborrowed = $_POST["Date_Borrowed"];
        $datereturned = $_POST["Date_Returned"];

        // Update In_Library field in TblBooks to 'N'
        $updateSQL = "UPDATE TblBooks SET In_Library = 'N' WHERE ISBN = :ISBN";
        $updateStmt = $conn->prepare($updateSQL);
        $updateStmt->bindParam(':ISBN', $_POST["ISBN"]);

        if ($updateStmt->execute()) {
            echo "Your book has been loaned successfully! Here are some important dates to keep in mind:";
            echo "<br>Date Borrowed: $dateborrowed";
            echo "<br>Date Returned: $datereturned";
            echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
        } else {
            echo "Error updating book status: " . $updateStmt->errorInfo()[2];
            echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
        }

        $updateStmt->closeCursor();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
        echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
    }

    $stmt->closeCursor();
}
?>



