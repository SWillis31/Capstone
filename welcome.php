<?php 

session_start();
echo "Welcome " . $_SESSION["username"] . ",<br>" . "You are logged in as an " . $_SESSION["role"];
echo "<br><a href='index.php'>Home</a>";
?>