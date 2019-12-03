<?php

$title="Article";
$extra_stylesheet="css/news.css";
include("header.php");

if($_SERVER["REQUEST_METHOD"] == "GET"){
    echo "<div class='wrapper'>";
    $sql = "SELECT * FROM articles WHERE post_id = " . $_GET["id"];
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='query_contents news-articles'>";
        echo "<h1 class='page_heading'>" . $row["title"] . "</a></h1>";	
        echo $row["content"];
        echo "<br>Posted by: " . $row["poster"] . "
        <br>On " . $row["created"] . "
        <br>";
        if(isAdmin()){
            echo "<div class='admin_control'>";
            echo "<br><a href='edit_article.php?id=" . $row["post_id"] . "'>Edit Article</a>";
            echo "<br><a href='delete_article.php?id=" . $row["post_id"] . "'>Delete Article</a>";
            echo "</div>";
        }
        echo "</div>";
    }
    echo "<div class='quick_links'>";
    echo "<h2>Quick Links</h2>";
    echo "<ul><li><a href='index.php'>Home</a></li>";
    echo "<li><a href='News'>News</a></li>";
    echo "<li><a href='announcements.php'>Announcements</a></li>";
    echo "<li><a href='forum.php'>Forum</a></li>";
    echo "<li><a href='contact.php'>Contact</a></li>";
    echo "<li><a href='opportunities.php'>Opportunities</a></li>";
    echo "</div>";

}
?>