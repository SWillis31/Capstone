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
            $sql = "SELECT * FROM articles LIMIT 5";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<h3>" . $row["title"] . "</h3><br>Posted by: " . $row["poster"] . "<br>On " . $row["date"] . "<br>";
                echo $row["content"];
                echo " <br><a href='edit_article.php?id=" . $row["post_id"] . "'>Edit Article</a>";
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