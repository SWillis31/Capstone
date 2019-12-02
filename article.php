<?php
include("header.php");
$title="Article";
$extra_stylesheet="";
include("db_connect.php");

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $sql = "SELECT * FROM articles WHERE post_id = " . $_GET["id"];
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . $row["title"] . "</a></h3><br>Posted by: " . $row["poster"] . "<br>On " . $row["created"] . "<br>";
        echo $row["content"];
        if(isAdmin()){
            echo "<br><a href='edit_article.php?id=" . $row["post_id"] . "'>Edit Article</a>";
            echo "<br><a href='delete_article.php?id=" . $row["post_id"] . "'>Delete Article</a>";
        }
    }
}
?>