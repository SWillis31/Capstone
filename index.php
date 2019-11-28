<?php
include('header.php');
include('db_connect.php');
$conn = OpenDB();
?>
<div id="content">
    <?php
    if (isset($_SESSION["loggedin"])) {
        echo "<a href='logout.php'>Log Out</a>";
    } else {
        echo "<a href='login.php'>Log in</a><br><a href='register.php'>Register</a>";
    }

    ?>

    <div id='announcements'>
        <h2>Announcements</h2>
        <?php
        $sql = "SELECT * FROM announcements ORDER BY created DESC LIMIT 5";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<div class='announcement_item'>" . $row["content"] . "<br>Posted by: " . $row["posted_by"] . "<br>On " . $row["created"];
        }
        ?>
    </div>
</div>
<div id="newsFeed">
    <h2>News Feed</h2>
    <?php
    $sql = "SELECT * FROM articles ORDER BY created DESC LIMIT 5";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='news_article'><h3><a href='article.php?id=" . $row["post_id"] . "'>" . $row["title"] . "</a></h3><br>Posted by: " . $row["poster"] . "<br>On " . $row["created"];
        //Moved to news.php, titles will be links to individual news items
        // echo $row["content"];
        if (isAdmin()) {
            echo " <br><a href='edit_article.php?id=" . $row["post_id"] . "'>Edit Article</a>";
            echo "<br><a href='delete_article.php?id=" . $row["post_id"] . "'>Delete Article</a></div>";
        }
    }
    if (isAdmin()) {
        echo "<br><a href='add_article.php'>Add Article</a> ";
    }
    ?>
</div>
<script src="" async defer></script>
<?php
include('footer.php');
?>