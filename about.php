<?php
include("db_connect.php");
$title="About";
$extra_stylesheet="css/main_content.css";
include("header.php");
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM about_info WHERE title='" . $_GET["title"] . "'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
    echo "<h1>" . $row["title"] . "</h1>";
    echo $row["content"];
    

    if (isAdmin()) {
        echo "<br><a href='edit_article.php?about_id=" . $row['id'] . "'>Edit About Page</a>";
    }
}
}
include("footer.php");
?>