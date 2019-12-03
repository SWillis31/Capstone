<?php
$title="Forum";
$extra_stylesheet="css/news.css";

include('header.php');

$conn = OpenDB();

?>

<h1>Forums</h1><br>
<div id="forum-container" class='wrapper'>
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
    echo "<div class='news-articles'>";
    $sql = "SELECT * FROM threads";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='forum_post'>";
        echo "<h2>" . $row["subject"] . "</h2>" . $row["description"] . "<br>Posted by: " . $row["posted_by"] . "<br>";
        echo "Posted on: " . $row["created"] . "<br>";
        echo "<a href=forum_thread.php?id=" . $row["thread_id"] . ">View thread</a>";
        echo "</div>";
    }
    
?>



<?php
echo "</div>";
echo "<div class='quick_links'>";
    echo "<h2>Quick Links</h2>";
    echo "<ul><li><a href='index.php'>Home</a></li>";
    echo "<li><a href='News'>News</a></li>";
    echo "<li><a href='announcements.php'>Announcements</a></li>";
    echo "<li><a href='forum.php'>Forum</a></li>";
    echo "<li><a href='contact.php'>Contact</a></li>";
    echo "<li><a href='opportunities.php'>Opportunities</a></li>";
    if(isset($_SESSION["loggedin"])){
        if($_SESSION["loggedin"] == true){
    echo "
    <div id='forum_form'>
        <form action='forum.php' method='post'>
            <input type='text' name='post_title' placeholder='title'/><br><br>
            <textarea placeholder='Reply here' name='post_content'></textarea><br>
            <input type='submit' name='submit' value='Create Thread'/>
        </form>
    </div>";
        }}
        echo "</div>";
    echo "</div></div>";
include('footer.php');
?>