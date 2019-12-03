<?php
include("header.php");
$title="News";
$extra_stylesheet="css/main_content.css";
include("db_connect.php");

echo "<div class='news-articles'>";
$sql = "SELECT * FROM articles ORDER BY created DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<div class='news_article'><h3><a href='article.php?id=" . $row["post_id"] . "'>" . $row["title"] . "</a></h3><br>Posted by: " . $row["poster"] . "<br>On " . $row["created"] . "<br>";
    //Moved to news.php, titles will be links to individual news items
    // echo $row["content"];
    if(isAdmin()){
        echo " <br><a href='edit_article.php?id=" . $row["post_id"] . "'>Edit Article</a>";
        echo "<br><a href='delete_article.php?id=" . $row["post_id"] . "'>Delete Article</a></div>";
    }
}
echo "<div>";
echo "<br><a href='add_article.php'>Add Article</a> ";

include("footer.php");
?>