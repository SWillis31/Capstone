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

    <div>
        <?php
            $sql = "SELECT * FROM articles ORDER BY created DESC LIMIT 5";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<h3><a href='news.php?id=" . $row["post_id"] . "'>" . $row["title"] . "</a></h3><br>Posted by: " . $row["poster"] . "<br>On " . $row["created"] . "<br>";
                //Moved to news.php, titles will be links to individual news items
                // echo $row["content"];
                if(isAdmin()){
                    echo " <br><a href='edit_article.php?id=" . $row["post_id"] . "'>Edit Article</a>";
                }
            }
        ?>
    </div>
    <?php
        if(isAdmin()){
            echo "<a href='add_article.php'>Add Article</a> ";
        }
    ?>
</div>
<div id="newsFeed">
    <h2>News Feed</h2>
    <p>RSS Feed stuff</p>
</div>
<script src="" async defer></script>
<?php
include('footer.php');
?>