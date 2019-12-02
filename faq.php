<?php
include("db_connect.php");
$title="FAQs";
$extra_stylesheet="";
include("header.php");

$sql = "SELECT * FROM about_info WHERE title='faq'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
    echo "<h1>" . $row["title"] . "</h1>";
    echo $row["content"];


if(isAdmin()){
    echo "<br><a href='edit_article.php?about_id=" . $row['id'] . "'>Edit About Page</a>";
}
include("footer.php");
?>