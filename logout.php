<?php
session_start();
print_r($_SESSION);
if(isset($_SESSION['loggedinuser']))
{
    unset($_SESSION['loggedinuser']);
}
header("Location: login.php");
?>

