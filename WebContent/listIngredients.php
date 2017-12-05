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
<title>List Ingredients</title>
</head>
<body>
<a href="MainMenu.html">return to main menu</a>
<header> <h1>List a Recipe's Ingredients</h1></header>

<form action="listIngredients-handler.php" method="post">

Recipe Name: <input type=text name="recipeName"></input> <br>

<input type=submit value="GO"></input>

</form>

</body>
</html>

<?php 
     }
?>
    
        
