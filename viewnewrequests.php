<body>
<?php require 'navbar.php'; ?>
<div class="signupform">
</body>
<?php

if (!isset($_SESSION["loggedinuser"]) || $_SESSION["UserRole"] != 1) {
    echo "This page is only for Admins. Please return to the Homepage or Login as an Admin. Thank you";
    echo '<br><br><a href="index.php"><button>Return to Homepage</button></a>';
    exit();
}

        include_once("connection.php");

        try {
            // SQL to retrieve everything from the table.
            $sql = "SELECT * FROM tblrequests";
            $stmt = $conn->query($sql);
            // Check if there are any requests.
            if ($stmt->rowCount() > 0) {
                echo '<table border="1">';
                echo '<tr><th>Title</th><th>Author</th><th>User Email</th><th>Notes</th></tr>';
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $row['Title'] . '</td>';
                    echo '<td>' . $row['Author'] . '</td>';
                    echo '<td>' . $row['User_Email'] . '</td>';
                    echo '<td>' . $row['Notes'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo 'No requests found.';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
        ?>

        <br><br><a href="index.php"><button>Return to Homepage</button></a>
    </div>
</body>
</html>

