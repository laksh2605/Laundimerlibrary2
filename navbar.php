<html>
<div class="topMenu">
    <?php
    session_start();
    echo $_SESSION["loggedinuser"];
    ?>
            <button class="menubutton" onclick="document.location.href='index.php'">Homepage</button>
            <button class="menubutton" onclick="document.location.href='profile.php'">My Profile</button>
            <button class="menubutton" onclick="document.location.href='Addadmins.php'">Sign Up</button>
            <button class="menubutton" onclick="document.location.href='login.php'">Login</button>
        </div>
        <div class="middlebar">
        <h1>Laundimer Library</h1>
        </div>
        <div class="lowerMenu">
            <button class="menubutton" type="button">About</button>
            <button class="menubutton" type="button">Browse Catalogue</button>
            <button class="menubutton" onclick="document.location.href='newrequests.php'">New Requests</button>
        </div>
</html>