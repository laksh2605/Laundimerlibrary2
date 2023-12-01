<?php
// Include the 'connection.php' file, which contains the database connection settings.
include_once("connection.php");

try {
    // Define an SQL query to insert a new record into the 'tblbooks' table.
    $sql = "INSERT INTO tblbooks (ISBN, Title, Author, Genre, Description, Length, Rating, In_Library) 
            VALUES (:isbn, :title, :author, :genre, :description, :length, :rating, :in_library)";

$stmt = $conn->prepare($sql);

    $isbn = $_POST["ISBN"];
    $title = $_POST["Title"];
    $author = $_POST["Author"];
    $genre = $_POST["Genre"];
    $description = $_POST["Description"];
    $length = $_POST["Length"];
    $rating = $_POST["Rating"];
    $in_library = $_POST["In_Library"];
    
    // Bind the variables to placeholders in the SQL query.
    $stmt->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':author', $author, PDO::PARAM_STR);
    $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':length', $length, PDO::PARAM_INT);
    $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
    $stmt->bindParam(':in_library', $in_library, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo "Successful insertion";
        echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
    }
} catch (PDOException $e) {
    // Handle any exceptions that may occur during database operations and display an error message.
    echo "Error: " . $e->getMessage();
    echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';

}

// Close the database connection.
$dbh = null;
?>


