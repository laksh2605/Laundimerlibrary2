<body>
<?php require 'navbar.php'; ?>
<div class="signupform">
</body>
<?php

include_once("connection.php");

try {
    
    // Sanitize user input (you can use htmlspecialchars for display purposes)
    $searchfor = htmlspecialchars($_POST['searchfor']);
    
    $sql = "SELECT TblLoans.ISBN, TblLoans.Date_Borrowed as db, TblLoans.Date_Returned as dr, TblBooks.Title as title, TblBooks.Image, TblUsers.Surname, TblUsers.Forename, TblUsers.Username 
            FROM TblLoans 
            INNER JOIN TblBooks ON TblLoans.ISBN = TblBooks.ISBN
            INNER JOIN TblUsers ON TblUsers.UserID = TblLoans.UserID 
            WHERE TblLoans.UserID = :searchfor";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':searchfor', $searchfor, PDO::PARAM_INT);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        echo "<ol>"; // Ordered List
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . htmlspecialchars($row['title']) . " <form action='return_book.php' method='POST'><input type='hidden' name='isbn' value='" . $row['ISBN'] . "'><input type='submit' value='Return Book'></form></li>";
        }
        echo "</ol>";
    } else {
        echo "0 results";
        echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
}

$dbh = null;

?>


