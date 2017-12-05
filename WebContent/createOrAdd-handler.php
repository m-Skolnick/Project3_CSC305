<?php
//Start the session again
session_start();

$RecipeName = $_POST["recipeName"];
$ingredientName = $_POST["ingredientName"];
$quantity = $_POST["quantity"];


$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["dbName"]);
// try and create the table (if it does not exist) ...
$queryString = "create table if not exists ".$RecipeName."(ingredientName char(200), quantity integer)";
$status = mysqli_query($conn, $queryString);

if (!$status){
    echo "query: $queryString<br>";
    die("Error creating table: " . mysqli_error($conn));
}
    
    
// try and insert request
$queryString = "insert into ".$RecipeName." values (\"$ingredientName\", $quantity)";
echo "query: $queryString<br>";
$status = mysqli_query($conn, $queryString);

if (!$status)
    die("Error performing insertion: " . mysqli_error($conn));
    
    
// close the connection (to be safe)
mysqli_close($conn);
?>

        
