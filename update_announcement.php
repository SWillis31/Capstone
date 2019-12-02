<?php
include("db_connect.php");
session_start();

if(!isAdmin()){
    header("location: access_denied.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "UPDATE announcements SET content = '" . $_POST["content"] . "', announcement_title = '" . $_POST["announcement_title"] . "' WHERE announcement_id= " . $_POST["announcement_id"];
        if ($conn->query($sql) === TRUE) {
            echo "Updated article";
        } else {
            echo "Failed to update article" . $conn->error;
        }
    }
}

header("location: index.php");

?>