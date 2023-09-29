<html>
    <head>
        <title>Laundimer Library</title>
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
      <?php require 'navbar.php'; ?>
        <div>
            <div class="signupform">
                <form action="addbookssql.php" method="POST">
                    Title: <input type="text" name="Title"/></br></br>
                    Author: <input type="text" name="Author"/></br></br>
                    Genre: <input type="text" name="Genre"/></br></br>
                    Page Length: <input type="number" name="Length"/></br></br>
                    Publish Date: <input type="date" name="Publish Date"/></br></br>
                    ISBN: <input type="number"  name="ISBN"/></br></br>
                    Publisher: <input type="text"  name="Publisher"/></br></br>
                    <!-- Image: <input type="image"  name="Image"/></br></br> --> 
                    Description: <input type="text"  name="Description"/></br></br>
                    Rating: <input type="text"  name="Rating"/></br></br>
                    In Library: <input type="text"  name="In_Library"/></br></br>

                    <input type="submit" value="Add Book"/>
                </form>
            </div>
        </div>
    </body>
        </html>

        