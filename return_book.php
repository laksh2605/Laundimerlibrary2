<?php

include_once("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $isbn = htmlspecialchars($_POST['isbn']);

        // Update Database
        $deletesql = "DELETE FROM TblLoans WHERE ISBN = :isbn";
        $updatesql = "UPDATE TblBooks SET In_Library = 'Y' WHERE ISBN = :isbn";

        $returnBookStmt = $conn->prepare($deletesql);
        $returnBookStmt->bindParam(':isbn', $isbn);
        $returnBookStmt->execute();

        $updateBookStatusStmt = $conn->prepare($updatesql);
        $updateBookStatusStmt->bindParam(':isbn', $isbn);
        $updateBookStatusStmt->execute();

        echo "Book returned successfully!";
        echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
    }
} else {
    header("Location: index.php");
    exit();
}

$conn = null;

?>
