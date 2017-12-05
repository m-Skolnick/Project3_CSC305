<?php
//Start the session again
session_start();

//Get the ingredient name and quantity
$ingredientName = $_POST["ingredientName"];
$quantity = $_POST["quantity"]; 

    
//Build the connection
$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["dbName"]);

//assume the table exists (table was built when connectionw as built)

//Insert ingredient into the inventory table
$queryString = "insert into Inventory values(\"$ingredientName\", $quantity)";
$status = mysqli_query($conn, $queryString);

if (!$status){ //If the inventory item is already in the list, update the value instead        
    $queryString = "update Inventory set Quantity=Quantity+$quantity where Ingredient=\"$ingredientName\"";
    $status = mysqli_query($conn, $queryString);
    
    if (!$status){  //If the update value query failed, alert the user    
    echo "Query: $queryString<br>";
    echo "Error inserting Inventory:". mysqli_error($conn);
    
    //Return to the previous page
    echo '<br><br> <a href="'.$_SERVER['HTTP_REFERER'].'">Try Again!</a>';
    //Kill the script
    die();
    }
    else{ //Alert the user that the update value query succeeded
        // close the connection (to be safe)
        mysqli_close($conn);
        //If the connection succeeds, provide a link to return to main menu
        echo " <br><br>Query Succeeded!<br>";
        echo '<a href="'.$_SESSION['mainMenuAddress'].'">Return to Main Menu</a>';         
    }
}
else{    

    // close the connection (to be safe)
    mysqli_close($conn);
    //If the connection succeeds, provide a link to return to main menu
    echo " <br><br>Query Succeeded!<br>";
    echo '<a href="'.$_SESSION['mainMenuAddress'].'">Return to Main Menu</a>';

}
?>

        
