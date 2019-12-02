<?php
include("db_connect.php");

session_start();

if (!isAdmin()) {
    header("location: access_denied.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $article_id = $_GET["id"];
        $sql = "DELETE FROM articles WHERE post_id = " . $article_id;

        if ($conn->query($sql) === TRUE) {
            echo "Successfully deleted";
        } else {
            echo "Error deleting resource: " . $conn->error;
        }

        header("location:news.php");
    }
}

?>