<?php
$title="News";
$extra_stylesheet="css/news.css";
include("header.php");


echo "<h1 class='page_heading'>Department News</h1>";
echo "<div class='wrapper'>";
echo "<div class='news-articles'>";
$sql = "SELECT * FROM articles WHERE post_id != 13 ORDER BY created DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<div class='news_article'><h3><a href='article.php?id=" . $row["post_id"] . "'>" . $row["title"] . "</a></h3><br>Posted by: " . $row["poster"] . "<br>On " . $row["created"] . "<br>";
    //Moved to news.php, titles will be links to individual news items
    // echo $row["content"];
    if(isAdmin()){
        echo "<div class='admin_control'>";
        echo " <br><a href='edit_article.php?id=" . $row["post_id"] . "'>Edit Article</a>";
        echo "<br><a href='delete_article.php?id=" . $row["post_id"] . "'>Delete Article</a></div>";
    }
    echo "</div>";
}


if(isAdmin()){
    echo "<div class='admin_control'>";
    echo "<br><a href='add_article.php'>Add Article</a> ";
    echo "</div>";
}
echo "</div>";
echo "<div class='quick_links'>";
    echo "<h2>Quick Links</h2>";
    echo "<ul><li><a href='index.php'>Home</a></li>";
    echo "<li><a href='News'>News</a></li>";
    echo "<li><a href='announcements.php'>Announcements</a></li>";
    echo "<li><a href='forum.php'>Forum</a></li>";
    echo "<li><a href='contact.php'>Contact</a></li>";
    echo "<li><a href='opportunities.php'>Opportunities</a></li>";
    echo "</div>";
    echo "</div>";
include("footer.php");
?>