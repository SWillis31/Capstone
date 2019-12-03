<?php
$title="Announcement";
$extra_stylesheet="css/news.css";
include("header.php");

echo "<div class='wrapper'><div class='news-articles'>";
$sql = "SELECT * FROM announcements ORDER BY created DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<div class='announcement_item'><h1>" . $row["announcement_title"] . "</h1>";
    echo $row["content"];
    echo "<br>Posted by: " . $row["posted_by"] . "<br>On " . $row["created"] . "<br>";
    if(isAdmin()){
        echo " <div class='admin_control'><br><a href='edit_announcement.php?id=" . $row["announcement_id"] . "'>Edit Announcement</a>";
        echo "<br><a href='delete_announcement.php?id=" . $row["announcement_id"] . "'>Delete Announcement</a></div>";
    }
	echo "</div>";
}

if(isAdmin()){
    echo "<div class='admin_control'>";
    echo "<br><a href='create_announcement.php'>Add Article</a> ";
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
include("footer.php");
?>