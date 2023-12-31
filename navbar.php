<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="header.css">
        <style>
            .middlebar{
                background-color: #7A3E31;
                text-align: left;
                color: white;
                height:80px;
            }
        </style>
    </head>
<body>
    <div class="topMenu">
        <?php
        session_start();
        if (isset($_SESSION["loggedinuser"])){
            echo ("Hi ".$_SESSION["username"]);
        }
        
        ?>
        <button class="menubutton" onclick="document.location.href='index.php'">Homepage</button>
        <button class="menubutton" onclick="document.location.href='profile.php'">My Profile</button>

        <?php
        // Check if a user is logged in and has the Admin role
        if (isset($_SESSION["loggedinuser"]) && $_SESSION["UserRole"] == 1) {
            echo '<button class="menubutton" onclick="document.location.href=\'Addadmins.php\'">Add Admins</button>';
        } else {
            echo '<button class="menubutton" onclick="document.location.href=\'signup.php\'">Sign Up</button>';
        }
        ?>
        
        <?php
        if (isset($_SESSION["loggedinuser"])){
            $inout='<button class="menubutton" onclick="document.location.href=';
            $inoutend='">Logout</button>';
            
            echo($inout."'logout.php'".$inoutend);
        }else{
            $inout='<button class="menubutton" onclick="document.location.href=';
            $inoutend='">Login</button>';
            
            echo($inout."'login.php'".$inoutend);
        }
        ?>
    </div>
    
    <div class="middlebar">
        <div style="display: flex; gap: 5px; align-items: center;">
            <img src="Laundimer-Logo.png" style="width: 5em; height: 5em;">
            <h1>Laundimer Library</h1>
        </div>    
    </div>
    
    <div class="lowerMenu">
        <button class="menubutton" onclick="document.location.href='About.php'" >About</button>
        <button class="menubutton" onclick="document.location.href='catalogue.php'" >Browse Catalogue</button>
        <button class="menubutton" onclick="document.location.href='newrequests.php'">New Requests</button>
    </div>
</body>
</html>


