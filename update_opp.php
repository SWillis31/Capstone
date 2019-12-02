<?php
include("db_connect.php");
session_start();

if(!isAdmin()){
    header("location: access_denied.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "UPDATE opportunities SET opp_description = '" . $_POST["opp_description"] . "', opp_title = '" . $_POST["opp_title"] . "' WHERE opp_id= " . $_POST["opp_id"];
        if ($conn->query($sql) === TRUE) {
            echo "Updated article";
        } else {
            echo "Failed to update article" . $conn->error;
        }
    }
}

header("location: index.php");

?>