<?php
include("db_connect.php");
session_start();

if (!isAdmin()) {
    header("location: access_denied.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["post_id"])) {
            $sql = "UPDATE articles SET content = '" . $_POST["article_content"] . "', title = '" . $_POST["article_title"] . "' WHERE post_id = " . $_POST["post_id"];
            if ($conn->query($sql) === TRUE) {
                echo "Updated article";
            } else {
                echo "Failed to update article" . $conn->error;
            }
        }
        elseif (isset($_POST["id"])){
            $sql = "UPDATE about_info SET content = '" . $_POST["about_content"] . "', title = '" . $_POST["about_title"] . "' WHERE id = " . $_POST["id"];
            if ($conn->query($sql) === TRUE) {
                echo "Updated article";
            } else {
                echo "Failed to update article" . $conn->error;
            }
        }
    }
}

header("location: index.php");
?>
