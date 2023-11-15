<html>
<head>
    <title>View Loan History</title>
</head>
<body>
    
    <h1> Add New Loan</h1>
<form action='viewloanhistorysql.php' method="POST">
    UserID:<input type="number" name="UserID"><br>
    ISBN:<input type="number" name="ISBN"><br>
    Date_Borrowed:<input type="date" name="date_borrowed"><br>
    Date_Returned:<input type="date" name="date_returned"><br>
    Review:<input type="text" name="review"><br>
    Rating:<input type="number" name="rating"><br>
    Late_Fines:<input type="number" name="late_fines"><br>
    <input type="submit" value="Add new Book"><br>
</form>
</body>
</html>


