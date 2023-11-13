<?php
include_once("connection.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["submit"])) {
        $bookTitle = $_POST["book_title"];

        // Insert loan information into TblLoans
        $stmt = $conn->prepare("INSERT INTO TblLoans (UserID, ISBN, date_borrowed)
                                SELECT 1, ISBN, NOW()
                                FROM TblBooks
                                WHERE title = :title");

        $stmt->bindParam(':title', $bookTitle, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Book '$bookTitle' loaned successfully!";
        } else {
            echo "Error loaning out the book.";
        }
    }
}
?>
