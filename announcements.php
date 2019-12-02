<?php
include("header.php");
include("db_connect.php");

echo "<div class='announcements'>";
$sql = "SELECT * FROM announcements ORDER BY created DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<div class='announcement_item'><h3></h3><br>Posted by: " . $row["posted_by"] . "<br>On " . $row["created"] . "<br>";
    echo $row["content"];
    //Moved to news.php, titles will be links to individual news items
    // echo $row["content"];
    if(isAdmin()){
        echo " <br><a href='edit_announcement.php?id=" . $row["announcement_id"] . "'>Edit Announcement</a>";
        echo "<br><a href='delete_announcement.php?id=" . $row["announcement_id"] . "'>Delete Announcement</a></div>";
    }
}
echo "<div>";
echo "<br><a href='create_announcement.php'>Add Article</a> ";

include("footer.php");
?>