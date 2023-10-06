<html>
<div class="topMenu">
    <?php
    session_start();
    if (isset($_SESSION["loggedinuser"])){
        echo ("Hi ".$_SESSION["username"]);
    }
    //echo $_SESSION["loggedinuser"];
    ?>
            <button class="menubutton" onclick="document.location.href='index.php'">Homepage</button>
            <button class="menubutton" onclick="document.location.href='profile.php'">My Profile</button>
            <button class="menubutton" onclick="document.location.href='Addadmins.php'">Sign Up</button>
            <?php
            if (isset($_SESSION["loggedinuser"])){
                $inout='<button class="menubutton" onclick="document.location.href=';
                $inoutend='">logout</button>';
                
                echo($inout."'logout.php'".$inoutend);
            }else{
                    $inout='<button class="menubutton" onclick="document.location.href=';
                    $inoutend='">Login</button>';
                    
                    echo($inout."'login.php'".$inoutend);
                }
            ?>
            
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