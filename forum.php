<?php

include("db_connect.php");
$conn = OpenDB();
$title="Forum";
$extra_stylesheet="";

include('header.php');
?>

<h1>Forums</h1><br>
<div id="forum-container">
<?php
if (isset($_SESSION["loggedin"])) {
    if ($_SESSION["loggedin"] === false) {
        echo "<a href='login.php'>Log in here</a>";
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "INSERT INTO threads (subject, description, post_date, post_user) VALUES (?, ?, NOW(), ?)";

            if($statement = $conn->prepare($sql)){
             $statement->bind_param("sss", $param_title, $param_content, $param_user);
             $param_title = $_POST["post_title"];
             $param_content = $_POST["post_content"];
             $param_user = $_SESSION["username"];
             
             if($statement->execute()){
                 header("location: index.php");
             }
             $conn->query($sql);
             $statement->close();
            }
        }
        
    }
} else {
    echo "<a href='login.php'>Log in here</a>";
}
?>

<?php
    $sql = "SELECT * FROM threads";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='forum_post'>";
        echo "Posted by: " . $row["posted_by"] . "<p>" . $row["subject"] . "</p>" . $row["description"] . "<br>";
        echo "Posted on: " . $row["created"] . "<br>";
        echo "<a href=forum_thread.php?id=" . $row["thread_id"] . ">View thread</a>";
        echo "</div>";
    }
?>

<?php
if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true){
?>
<div id="forum_form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="text" name="post_title" placeholder="title"/><br><br>
        <textarea placeholder="Reply here" name="post_content"></textarea><br>
        <input type="submit" name="submit" value="Create Thread"/>
    </form>
</div>

<?php }}?>

</div><!--forum-container-->
<?php
include('footer.php');
?>