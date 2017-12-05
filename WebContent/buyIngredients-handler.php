<?php
//Start the session again
session_start();

//Get the recipe name
$RecipeName = $_POST["recipeName"];

    
//Build the connection
$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["dbName"]);

// assume the table exists (might not be a good idea, depending on context

// find all matching recipe data
$queryString = "select RecipeName, Ingredient, Quantity from Recipes ".
    " where RecipeName=\"$RecipeName\"";

$status = mysqli_query($conn, $queryString);

if (!$status){
    //Alert the user of the query causing the error
    echo "Query: $queryString<br>";
    echo "Error retrieving data:". mysqli_error($conn);
    
    //Return to the previous page
    echo '<br><br> <a href="'.$_SERVER['HTTP_REFERER'].'">Try Again!</a>';
    //Kill the script
    die();
}
else{    

//If the connection succeeds, provide a link to return to main menu
echo '<a href="'.$_SESSION['mainMenuAddress'].'">Return to Main Menu</a>';

//Create a table to hold the data
echo "<h1>Ingredients for Recipe: ". $RecipeName ."</h1>";
echo "<table border=1>";
echo "<tr> <th>Ingredient</th> <th>Quantity</th> </tr>";

//Retrieve the data
while($row = mysqli_fetch_assoc($status))
{
    echo "<tr> <td>".$row["Ingredient"]."</td>".
        "<td>".$row["Quantity"]."</td> </tr>";
}

echo "</table>";


// close the connection (to be safe)
mysqli_close($conn);

}
?>

        
