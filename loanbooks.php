<?php
include_once("connection.php");

// Fetch available books from TblBooks
try {
    $stmt = $conn->query("SELECT DISTINCT title,ISBN FROM TblBooks");

    if (!$stmt) {
        die("Error fetching books: " . $conn->errorInfo()[2]);
    }

    $titles = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<html>
<head>

    <title>Book Loan</title>
</head>
<body>
    <h1>Book Loan</h1>

    <form method="POST" action="loanbookssql.php">
        <label for="book_title">Select Book Title:</label>
        <select name="book_title" required>
            <?php foreach ($titles as $title): ?>
                <option value="<?php echo $ISBN; ?>"><?php echo $title; ?></option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" name="submit" value="Loan Book">
    </form>
</body>
</html>
