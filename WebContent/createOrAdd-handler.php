<?php
//Start the session again
session_start();

$RecipeName = $_POST["recipeName"];
$ingredientName = $_POST["ingredientName"];
$quantity = $_POST["quantity"]; 
    
//Build the connection
$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["dbName"]);
// try and insert request
$queryString = "insert into Recipes values(\"$RecipeName\",\"$ingredientName\", $quantity)";

$status = mysqli_query($conn, $queryString);

if (!$status){
    //Alert the user of the query causing the error
    echo "Query: $queryString<br>";
    echo "Error performing insertion:". mysqli_error($conn);
    
    //Return to the previous page
    echo '<br><br> <a href="'.$_SERVER['HTTP_REFERER'].'">Try Again!</a>';
    //Kill the script
    die();
}
else{
    
// close the connection (to be safe)
mysqli_close($conn);
//If the connection succeeds, provide a link to return to main menu
echo " <br><br>Query Succeeded!<br>";
echo '<a href="'.$_SESSION['mainMenuAddress'].'">Return to Main Menu</a>';  
}
?>

        
