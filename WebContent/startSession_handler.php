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
$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["dbName"]);

if (!$conn){
    // die is a php function that terminates execution.
    //   the . means string concatenation in php.
   
    echo "Could not connect:".mysqli_connect_error();
    echo "<br>";
    echo '<br> <a href="'.$_SERVER['HTTP_REFERER'].'">Try Again!</a>';
    
    die();
}
else{   
  // Create the tables to be used for the store
    // try and create the table (if it does not exist) ...
    $queryString = "create table if not exists Recipes(RecipeName char(100), Ingredient char(200), Quantity integer, primary key(RecipeName,Ingredient))";
    $status = mysqli_query($conn, $queryString);
    
    if (!$status){
        //Alert the user of the query causing the error
        echo "Query: $queryString<br>";
        echo "Error creating table:". mysqli_error($conn);
        
        //Return to the previous page
        echo '<br><br> <a href="'.$_SERVER['HTTP_REFERER'].'">Try Again!</a>';
        //Kill the script
        die();
    }    
    // try and create the table (if it does not exist) ...
    $queryString = "create table if not exists Inventory(Ingredient char(200), Quantity integer, primary key(Ingredient))";
    $status = mysqli_query($conn, $queryString);
    
    if (!$status){
        //Alert the user of the query causing the error
        echo "Query: $queryString<br>";
        echo "Error creating table:". mysqli_error($conn);
        
        //Return to the previous page
        echo '<br><br> <a href="'.$_SERVER['HTTP_REFERER'].'">Try Again!</a>';
        //Kill the script
        die();
    }  
    
    mysqli_close($conn);     
    echo " <br><br>Thank you, you are now connected!<br>";
    echo '<a href="'.$_SESSION['mainMenuAddress'].'">Return to Main Menu</a>';      
    
}
        
 ?>
