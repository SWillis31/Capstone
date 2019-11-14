<?php
include("header.php");
include("db_connect.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    
    function loadReplies(parent_id) {
        $("#child_reply_parent" + parent_id).load("load_replies.php?parent_id=" + parent_id, parent_id, function(responseText, status) {});
    };

</script>

<?php
$thread_id = $_GET["id"];
$isAdmin = isAdmin();
//Fetch thread content/message
$sql = "SELECT * FROM threads WHERE thread_id = " . $thread_id;
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<div class='thread_content'>";
    echo "<h3>" . $row["subject"] . "</h3><br>";
    echo "<p class='thread_description'>" . $row["description"] . "<br>";
    echo "Posted By: " . $row["posted_by"] . "<br>On " . $row["created"];
}

//Fetch all comments that are not a direct reply to another response
$sql = "SELECT * FROM forum_posts WHERE thread_id = " . $thread_id . " AND parent_id IS NULL";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<div class='forum_post'>";
    echo "Posted By: " . $row["reply_user"] . "<br><p>" . $row["reply_content"] . "</p><br>";
    echo "<a href='#' onclick='loadReplies(\"" . $row["reply_id"] . "\")'>Load Replies</a>";
    if(isset($_SESSION["loggedin"])){
        if($_SESSION["loggedin"] == true){
            echo "<div id='forum_form'>
            <form action='post_reply.php' method='POST'>
                <textarea placeholder='Reply here' name='reply_content'></textarea><br>
                <input type='submit' name='submit' value='Post Reply'/>
                <input class='hidden_id' name='parent_id' type='number' value='" . $row["reply_id"] . "' />
                <input class='hidden_id' name='thread_id' type='number' value='" . $row["thread_id"] . "' />
            </form>
            </div>";
    }}
    else{
        echo "Not logged in";
    }
    echo "<div class='forum_reply' id='child_reply_parent" . $row["reply_id"] . "'></div>";
    if($isAdmin){
        echo "<div class='admin_controls'>";
        echo "<a href='delete_post.php?post_id=" . $row["reply_id"] . "'>Delete Post</a>";
        echo "</div>";
    }
    echo "</div>";

}
CloseConnection($conn);
?>

<?php
//Forum reply form
echo "<div id='forum_form'>
<form action='post_reply.php' method='POST'>
    <textarea placeholder='Reply here' name='reply_content'></textarea><br>
    <input type='submit' name='submit' value='Post Reply'/>
    <input class='hidden_id' name='parent_id' type='text' value='' />
    <input class='hidden_id' name='thread_id' type='number' value='" . $_GET["id"] . "' />
</form>
</div>";

?>


<?php
include("footer.php");
?>