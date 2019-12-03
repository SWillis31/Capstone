<?php

$title="About";
$extra_stylesheet="css/news.css";
include("header.php");
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "<div class='wrapper'>";
    $sql = "SELECT * FROM about_info WHERE title='" . $_GET["title"] . "'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        echo "<div class='news-articles'>";
    echo "<h1 class='page_heading'>" . $row["title"] . "</h1>";
    echo $row["content"];
    

    if (isAdmin()) {
        echo "<br><a href='edit_article.php?about_id=" . $row['id'] . "'>Edit About Page</a>";
    }
    echo "</div>";
}
}
echo "<div class='quick_links'>";
    echo "<h2>Quick Links</h2>";
    echo "<ul><li><a href='index.php'>Home</a></li>";
    echo "<li><a href='News'>News</a></li>";
    echo "<li><a href='announcements.php'>Announcements</a></li>";
    echo "<li><a href='forum.php'>Forum</a></li>";
    echo "<li><a href='contact.php'>Contact</a></li>";
    echo "<li><a href='opportunities.php'>Opportunities</a></li>";
    echo "</div></div>";
include("footer.php");
?>