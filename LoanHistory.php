<head>
    <title>Loan History</title>
    <link rel="stylesheet" href="header.css">
        <style>
            .signupform{
                text-align:center;
                font-size:18px;
                margin-top: 40;
            }
        </style>
</head>
<body>
    <?php require 'navbar.php' ?>
    <h1>Loan History</h1>
    <!-- this is the search bar - admins input the desired characterstics to be searched for-->
<form action = 'loanhistorysql.php' method = "POST">
    <table>
        <tr>Search User ID, Username or Surname:<td><input type="text" name="searchfor"></tr>
        <input type ="submit" value = "Search"><br>
    </table>
</form>
<!-- this conditional was introduced after the first time I reloaded the page and it printed out an error. -->
<?php
    if(isset($_POST['searchfor'])){
?>
<table>
    <tr>
        <th>Image</th>
        <th>Forename</th>
        <th>Surname</th>
        <th>Title</th>
        <th>Date_Borrowed</th>
        <th>Date_Returned</th>
     </tr>  
<?php }
    ?>
<?php ?>
</table>
</body>
</html>

