<html>
<head>
    <title>Edit Details</title>
</head>
<body>
<h1>Edit Details</h1>

<?php
session_start();
include_once("connection.php");
$_SESSION["userid"]=1;
if (isset($_SESSION['userid'])) {
    $stmt = $conn->prepare("SELECT * FROM tblusers WHERE UserID = :userid");
    $stmt->bindParam(':userid', $_SESSION['userid'], PDO::PARAM_INT);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
        $forename = $row["Forename"];
        $surname = $row["Surname"];
        $username = $row["Username"];
        $password = $row["Password"];
        $emailaddress = $row["Email_Address"];
        $userRole = $row["UserRole"];
    }
}

?>

<form action="editprofilessql.php" method="POST">
    Forename: <input type="text" name="forename" value="<?= htmlspecialchars($forename) ?>"><br>
    Surname: <input type="text" name="surname" value="<?= htmlspecialchars($surname) ?>"><br>
    Username: <input type="text" name="username" value="<?= htmlspecialchars($username) ?>"><br>
    Password: <input type="password" name="password" value="<?= htmlspecialchars($password) ?>"><br>
    Email Address: <input type="text" name="Email_Address" value="<?= htmlspecialchars($emailaddress) ?>"><br>
    UserRole: <input type="text" name="UserRole" value="<?= htmlspecialchars($userRole) ?>"><br>
    <input type="submit" value="Change Details"><br>
</form>

</body>
</html>
