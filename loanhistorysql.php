<body>
    <?php require 'navbar.php'; ?>
    <div class="signupform">

    <?php
    include_once("connection.php");

    try {
        // Sanitize user input (you can use htmlspecialchars for display purposes)
        $searchfor = htmlspecialchars($_POST['searchfor']);

        $searchType = is_numeric($searchfor) ? 'UserID' : 'Username';
        
        $sql = "SELECT TblLoans.ISBN, TblLoans.Date_Borrowed as db, TblLoans.Date_Returned as dr, TblBooks.Title as title, TblBooks.Image, TblUsers.Surname, TblUsers.Forename, TblUsers.Username, TblUsers.UserID 
                FROM TblLoans 
                INNER JOIN TblBooks ON TblLoans.ISBN = TblBooks.ISBN
                INNER JOIN TblUsers ON TblUsers.UserID = TblLoans.UserID 
                WHERE TblUsers.$searchType = :searchfor";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':searchfor', $searchfor, is_numeric($searchfor) ? PDO::PARAM_INT : PDO::PARAM_STR);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "<ol>"; 
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . htmlspecialchars($row['title']) . " 
                    <form action='return_book.php' method='POST'>
                        <input type='hidden' name='isbn' value='" . $row['ISBN'] . "'>
                        <input type='submit' value='Return Book'>
                    </form>

                    <!-- Review Form -->
                    <form action='submitreview.php' method='POST'>
                    <input type='hidden' name='isbn' value='" . $row['ISBN'] . "'> 
                    <input type='hidden' name='UserID' value='" . $row['UserID'] . "'>
                    Rating: <input type='number' name='Rating' min='1' max='5' required> 
                    Review: <textarea name='Reviews' required></textarea> 
                    <input type='submit' value='Submit Review'>
                </form>
                </li>";
            }
            echo "</ol>";
        } else {
            echo "No results were found for the provided User ID.";
            echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
    } finally {
        $conn = null;
    }

    ?>
</body>

