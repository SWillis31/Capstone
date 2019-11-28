<?php
include("db_connect.php");
session_start();

if ($_SESSION["role"] !== 'admin') {
    header("location: access_denied.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "UPDATE articles SET content = '" . $_POST["article_content"] . "', title = '" . $_POST["article_title"] . "' WHERE post_id = " . $_POST["post_id"];
        if ($conn->query($sql) === TRUE) {
            echo "Updated article";
        } else {
            echo "Failed to update article" . $conn->error;
        }
    }
}

header("location: index.php");

?>