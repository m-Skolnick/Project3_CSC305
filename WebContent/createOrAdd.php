<?php
//Start the session again
session_start();

$_SESSION["currentPage"] = "MainMenu.html";
// Try to build the connection ...
$_SESSION["conn"] = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["dbName"]);

if (!$_SESSION["conn"]){  
    //If the connection fails, redirect to the connection page
    echo "<meta http-equiv='refresh' content='0;url=startSession.html'>";
}
    else{
?>

<html>
<head>

<meta charset="ISO-8859-1">
<title>Create Recipe or Add Ingredient</title>
</head>
<body>
<a href="MainMenu.html">return to main menu</a>
<header> <h1>Create Recipe or Add Ingredient</h1></header>

<form action="createOrAdd-handler.php" method="post">

Recipe Name: <input type=text name="recipeName"></input> <br>
New Ingredient Name: <input type=text name="ingredientName"></input> <br>
Quantity required in recipe: <input type=number name="quantity"></input> <br>


<input type=submit value="GO"></input>

</form>

</body>
</html>

<?php 
     }
?>
    
        
