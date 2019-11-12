<?php
include('db_connect.php');
$conn = OpenDB();

echo "<br>" . "Session ID: " . session_id();
if (isset($_SESSION["loggedin"])) {
    echo "<br>" . "Username: " . $_SESSION["username"];
}
include('header.php');
?>
<div id="content">
    <p>Admin only link should appear after this if logged in as an administrator</p>
    <?php
    if (isset($_SESSION["role"])) {
        if ($_SESSION["role"] == "admin") {
            echo "<a href='https://www.google.com'>Admin only link</a><br>";
        } else {
            echo "General user text<br>";
        }
        echo "<a href='logout.php'>Log Out</a>";
    } else {
        echo "<a href='login.php'>Log in</a><br><a href='register.php'>Register</a>";
    }

    ?>

    <div>
                <?php
                    $sql = "SELECT poster, date, content, title FROM articles LIMIT 5";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<h3>" . $row["title"] . "</h3><br>Posted by: " . $row["poster"] . "<br>On " . $row["date"] . "<br>";
                        echo $row["content"];
                    }
                ?>
    </div>
    <?php
        if(isset($_SESSION["role"])){
            if($_SESSION["role"] == "admin"){
                echo "<a href='add_article.php'>Add Article</a>";
            }
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