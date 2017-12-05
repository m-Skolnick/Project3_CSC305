<?php

//Start the session to remember that logged into MYSQL
session_start();

$_SESSION["host"] = $_POST["host"];
$_SESSION["user"] = $_POST["user"];
$_SESSION["passw"] = $_POST["password"];
$_SESSION["mainMenuAddress"] = "MainMenu.html";

//remember, for our purposes the DB is the same as the username ...
$_SESSION["dbName"] = $_SESSION["user"];


// build the connection ...
echo "Attempting to connect to DB server:". $_SESSION["host"]. "...";
$_SESSION["conn"] = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["dbName"]);

if (!$_SESSION["conn"]){
    // die is a php function that terminates execution.
    //   the . means string concatenation in php.
   
    echo "Could not connect:".mysqli_connect_error();
    echo "<br>";
    echo '<br> <a href="'.$_SERVER['HTTP_REFERER'].'">Try Again!</a>';
    
    die();
}
else{
    echo " <br><br>Thank you, you are now connected!<br>";
      
    mysqli_close($_SESSION["conn"]);      
    echo '<a href="'.$_SESSION['mainMenuAddress'].'">Return to Main Menu</a>';  
    
}
        
 ?>
