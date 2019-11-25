<?php
include("header.php");
include("db_connect.php");


$sql = "SELECT * FROM articles ORDER BY created DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<h3><a href='article.php?id=" . $row["post_id"] . "'>" . $row["title"] . "</a></h3><br>Posted by: " . $row["poster"] . "<br>On " . $row["created"] . "<br>";
    //Moved to news.php, titles will be links to individual news items
    // echo $row["content"];
    if(isAdmin()){
        echo " <br><a href='edit_article.php?id=" . $row["post_id"] . "'>Edit Article</a>";
    }
}


include("footer.php");
?>