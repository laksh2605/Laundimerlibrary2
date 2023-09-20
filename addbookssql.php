<?php

include_once("connection.php");

try {
   // $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
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
    
    $stmt->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':author', $author, PDO::PARAM_STR);
    $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':length', $length, PDO::PARAM_INT);s
    $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
    $stmt->bindParam(':in_library', $in_library, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo "Successful insertion";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$dbh = null;

?>

