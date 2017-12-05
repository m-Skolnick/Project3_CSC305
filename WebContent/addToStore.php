<?php
//Start the session again
session_start();

$_SESSION["currentPage"] = "MainMenu.html";
// Try to build the connection ...
$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["dbName"]);

if (!$conn){  
    //If the connection fails, redirect to the connection page
    echo "<meta http-equiv='refresh' content='0;url=startSession.html'>";
}
    else{
        // close the connection (to be safe)
        mysqli_close($conn);
?>

<html>
<head>

<meta charset="ISO-8859-1">
<title>Add Ingredient</title>
</head>
<body>
<a href="MainMenu.html">return to main menu</a>
<header> <h1>Add an Ingredient to the Store</h1></header>

<form action="addToStore-handler.php" method="post">

Ingredient Name: <input type=text name="ingredientName"></input> <br>
Quantity to add: <input type=number name="quantity"></input> <br>

<input type=submit value="GO"></input>

</form>

</body>
</html>

<?php 
     }
?>
    
        
