<?php
include_once("connection.php");

try {
    // Check if ISBN is set in $_POST
    if (isset($_POST['isbn'])) {
        // Retrieve the ISBN from the form
        $isbn = htmlspecialchars($_POST['isbn']);

        // Retrieve other data from the form
        $UserID = htmlspecialchars($_POST['UserID']);
        $Rating = htmlspecialchars($_POST['Rating']);
        $Reviews = htmlspecialchars($_POST['Reviews']);

        // Insert the review into tblreviews
        $sql = "INSERT INTO tblreviews (ISBN, UserID, Rating, Reviews) VALUES (:ISBN, :UserID, :Rating, :Reviews)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':UserID', $UserID, PDO::PARAM_INT);
        $stmt->bindParam(':ISBN', $isbn, PDO::PARAM_STR);
        $stmt->bindParam(':Rating', $Rating, PDO::PARAM_INT);
        $stmt->bindParam(':Reviews', $Reviews, PDO::PARAM_STR);
        $stmt->execute();

        echo "Review submitted successfully";
        echo '<br><br><a href="loanhistory.php"><button>Return to Loan History</button></a>';


    } else {
        // Handle the case where 'ISBN' is not set
        echo "Error: ISBN is not set in the form.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn = null;
}
?>

